<?php

use Carbon\Carbon;

class ResumeController extends Controller
{
    private $table = "resume";
    private $educTable = "education";
    private $expTable = "experience";
    private $skillsTbl = "skills";

    public function __construct()
    {
    }

    public function bookmark()
    {

        if (isset($_SESSION['uid'])) {
            $db = new Database();
            $cdb = $db->connect();
            $this->conn = $cdb;

            $data = [
                'id' => $this->sanitize($_POST['bookmark']),
                'uid' => $_SESSION['uid'],
            ];

            $query = "INSERT INTO bookmarks (bookmark_user, bookmark_content) VALUES (:uid, :id)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute($data);

            echo '<script>alert("Resume has been bookmarked!")</script>';
            return redirect('main');
        } else {
            return redirect('login');
        }
    }

    public function filter($location, $title)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'location' => $this->sanitize($location),
            'title' => "%" . $this->sanitize($title) . "%",
        ];

        $query = "SELECT resume.*, locations.island_name AS lname FROM resume INNER JOIN locations ON locations.id = resume.location WHERE locations.id = :location AND resume.title LIKE :title";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
        $resume = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM locations";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $location = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('browse-resume', ['resume' => $resume, 'location' => $location]);
    }

    public function index()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT resume.*, locations.island_name AS lname FROM resume INNER JOIN locations ON locations.id = resume.location";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $resume = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM locations";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $location = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('browse-resume', ['resume' => $resume, 'location' => $location]);
    }

    public function show($id)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT * FROM resume WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        $resume = $stmt->fetch(PDO::FETCH_ASSOC);


        if (empty($resume)) {
            http_response_code(404);
            die();
        } else {
            $query = "SELECT resume.*, locations.island_name AS location_name, applicants.photo AS latestPhoto, applicants.twitter AS twitter, applicants.linkedin FROM resume INNER JOIN locations ON resume.location = locations.id INNER JOIN applicants ON applicants.user_id = resume.user_id WHERE resume.id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['id' => $_GET['id']]);
            $resume = $stmt->fetch(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM experience WHERE resume_id=:uid";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['uid' => $id]);
            $exp = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM education WHERE resume_id=:uid";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['uid' => $id]);
            $educ = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM skills WHERE resume_id=:uid";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['uid' => $id]);
            $skills = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM bookmarks WHERE bookmark_user = :uid AND bookmark_content = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['id' => $id, 'uid' => isset($_SESSION['uid']) ? $_SESSION['uid'] : null]);
            $bookmark = $stmt->fetch(PDO::FETCH_ASSOC);

            return view('resume', ['resume' => $resume, 'experience' => $exp, 'educ' => $educ, 'skills' => $skills, 'bookmark' => $bookmark]);
        }
    }

    public function messageFromResume()
    {
        $message = new MessageController();
        $message->create($_SESSION['uid'], $_SESSION['uid'], $_POST['userID'], $_POST['msgContent']);

        array_push($_SESSION['success'], ['success' => 'A message has been sent!']);
    }

    public function add_resume_view()
    {
        $this->middleware(['auth', 'verified', 'seeker']);

        $user = new User();

        if ($_SESSION['rid'] == 1) {
            $type = $user->user_applicants($_SESSION['uid']);
        } else {
            $type = $user->user_employees($_SESSION['uid']);
        }

        return view('dashboard/add-resume', ['user' => $type]);
    }

    public function manage_resume_view()
    {
        $this->middleware(['auth', 'verified', 'seeker']);

        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT r.id, r.name, r.email, r.title, r.photo, r.description, r.salary, r.created_at, l.island_name AS location FROM resume r INNER JOIN locations l ON l.ID = r.location WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $resume = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('dashboard/manage-resumes', ['resume' => $resume]);
    }

    public function handleResumeUpload()
    {
        $currentDir = getcwd();
        $uploadDirectory = "/public/uploads/resumes/";

        $fileExtensions = ['doc', 'docx', 'pdf']; // Get all the file extensions

        $fileName = $_FILES['resume']['name'];
        $fileSize = $_FILES['resume']['size'];
        $fileTmpName  = $_FILES['resume']['tmp_name'];
        $fileType = $_FILES['resume']['type'];
        $tmp = explode('.', $fileName);
        $str = end($tmp);
        $fileExtension = strtolower($str);

        $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

        if (!in_array($fileExtension, $fileExtensions)) {
            array_push($_SESSION['message'], ['error' => 'This file extension is not allowed. Please upload a document file']);
        }

        if ($fileSize > 5000000) {
            array_push($_SESSION['message'], ['error' => 'This file is more than 5MB. Sorry, it has to be less than or equal to 2MB']);
        }

        if (empty($_POST['message']) && $_FILES['resume']['size'] != 0) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                return $fileName;
            }
        }
    }

    public function save()
    {
        $user = new User();

        if ($_SESSION['rid'] == 1) {
            $result = array('user' => $user->user_applicants($_SESSION['uid']));
        } else {
            $result = array('user' => $user->user_employees($_SESSION['uid']));
        }

        $resume = $this->handleResumeUpload();

        $userLocation = $result['user']['location'];
        $userPhoto = $result['user']['photo'];

        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        // Resume Details
        $data = [
            'name' => $this->sanitize(ucwords($_POST['name'])),
            'email' => $this->sanitize($_POST['email']),
            'title' => $this->sanitize(ucwords($_POST['title'])),
            'location' => $this->sanitize($userLocation),
            'photo' => $this->sanitize($userPhoto),
            'description' => $this->sanitize($_POST['desc']),
            'salary' => $this->sanitize($_POST['salary']),
            'created' => Carbon::now()->toFormattedDateString(),
            'user_id' => $_SESSION['uid'],
            'resume' => $resume,
        ];

        // Educational Background Information
        // $school = $_POST['school'];
        // $type = $_POST['type'];
        // $course = $_POST['course'];
        // $major = $_POST['major'];
        // $start = $_POST['start'];
        // $end = $_POST['end'];
        // $description = $_POST['description'];

        // Job Experience Information
        // $employer = $_POST['employer'];
        // $position = $_POST['position'];
        // $level = $_POST['level'];
        // $start_date = $_POST['start_date'];
        // $end_date = $_POST['end_date'];
        // $summary = $_POST['summary'];

        // Skills Information
        // $skill = $_POST['skill'];
        // $difficulty = $_POST['skillLevel'];

        try {

            // $start_dates = $_POST['start_date'];

            // $filtered_date = array_filter($start_dates);

            // foreach ($filtered_date as $date) {
            //     if (!$this->validateDate($date)) {
            //         array_push($_SESSION['message'], ['error' => 'Error creating resume. Check correct date format!']);
            //         throw new Exception("Date format error!");
            //     }
            // }

            $query = "INSERT INTO " . $this->table . "(name, email, title, location, photo, description, salary, created_at, user_id, resume_link) VALUES (:name, :email, :title, :location, :photo, :description, :salary, :created, :user_id, :resume)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute($data);
            $lastId = $this->conn->lastInsertId();

            // $filtered = array_filter($school);

            // Education Query
            // foreach ($filtered as $index => $value) {
            //     $schoolQuery = "INSERT INTO " . $this->educTable . " (resume_id, school_name, type, course, major, start_year, end_year, description) VALUES (:resume_id, :school_name, :type, :course, :major, :start_year, :end_year, :description)";
            //     $stmt = $this->conn->prepare($schoolQuery);
            //     $stmt->execute([
            //         'resume_id'     => $this->sanitize($lastId),
            //         'school_name' => $this->sanitize($school[$index]),
            //         'type'        => $this->sanitize($type[$index]),
            //         'course'      => $this->sanitize($course[$index]),
            //         'major'       => $this->sanitize($major[$index]),
            //         'start_year'  => $this->sanitize($start[$index]),
            //         'end_year'    => $this->sanitize($end[$index]),
            //         'description' => $this->sanitize($description[$index]),
            //     ]);
            // }

            // Experience Query
            // $filtered = array_filter($employer);

            // foreach ($filtered as $index => $value) {

            //     $employerQuery = "INSERT INTO " . $this->expTable . " (resume_id, employer_name, position, employment_type_id, start_date, end_date, summary) VALUES (:resume_id, :employer, :position, :level, :start, :end, :summary)";
            //     $stmt = $this->conn->prepare($employerQuery);
            //     $stmt->execute([
            //         'resume_id'  => $this->sanitize($lastId),
            //         'employer' => $this->sanitize($employer[$index]),
            //         'position' => $this->sanitize($position[$index]),
            //         'level'    => $this->sanitize($level[$index]),
            //         'start'    => $this->sanitize($start_date[$index]),
            //         'end'      => $this->sanitize($end_date[$index]),
            //         'summary'  => $this->sanitize($summary[$index]),
            //     ]);
            // }

            // Skills Query
            // $filtered = array_filter($skill);

            // foreach ($filtered as $index => $value) {

            //     $skillsQuery = "INSERT INTO " . $this->skillsTbl . " (resume_id, name, difficulty) VALUES (:resume_id, :name, :difficulty)";
            //     $stmt = $this->conn->prepare($skillsQuery);
            //     $stmt->execute([
            //         'resume_id'  => $this->sanitize($lastId),
            //         'name' => $this->sanitize($skill[$index]),
            //         'difficulty' => $this->sanitize($difficulty[$index]),
            //     ]);
            // }

            return redirect('manage-resume');
        } catch (Exception $e) {
            array_push($_SESSION['message'], ['error' => 'Error creating resume. Check your data!']);
            echo $e->getMessage();
        }
    }
}
