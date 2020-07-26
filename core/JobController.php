<?php

use Carbon\Carbon;

class JobController extends Controller
{
    private $table = 'jobs';

    public function __construct()
    {
    }

    public function edit($id)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'id' => $this->sanitize($id),
        ];

        $query = "SELECT * FROM jobs WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
        $job = $stmt->fetch(PDO::FETCH_ASSOC);

        return view('job/edit', ['job' => $job]);
    }

    public function update()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'id' => $this->sanitize($_POST['id']),
            'title' => $this->sanitize($_POST['title']),
            'description' => $this->sanitize($_POST['description']),
            'tags' => $this->sanitize($_POST['tags']),
            'date' => $this->sanitize($_POST['closing-date']),
        ];

        $query = "UPDATE jobs SET job_title = :title, description = :description, tags = :tags, expired_at = :date WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        return redirect('manage-jobs');
    }

    public function filled()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'filled' => Carbon::now()->toDateString(),
            'id' => $this->sanitize($_POST['filled']),
        ];

        $query = "UPDATE jobs SET filled_at = :filled WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        array_push($_SESSION['success'], ['success' => 'Job has been filled!']);
    }

    public function filter($category, $city, $type)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'category' => $this->sanitize($category),
            'city' => "%" . $this->sanitize($city) . "%",
            'type' => $this->sanitize($type)
        ];

        $query = "SELECT jobs.*, employment_type.name AS etype, locations.island_name AS lname, employers.name AS employer, employers.logo AS logo, categories.name AS cat FROM jobs 
        INNER JOIN employment_type ON jobs.employment_type = employment_type.id 
        INNER JOIN locations ON jobs.location = locations.id 
        INNER JOIN employers ON jobs.user_id = employers.user_id 
        INNER JOIN categories ON jobs.category = categories.id 
        WHERE jobs.category = :category AND locations.island_name LIKE :city AND jobs.employment_type = :type";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('job/browse', ['jobs' => $jobs]);
    }

    public function categorySearch($category)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'category' => $this->sanitize($category)
        ];

        $query = "SELECT jobs.*, employment_type.name AS etype, locations.island_name AS lname, employers.name AS employer, employers.logo AS logo, categories.name AS cat FROM jobs INNER JOIN employment_type ON jobs.employment_type = employment_type.id INNER JOIN locations ON jobs.location = locations.id INNER JOIN employers ON jobs.user_id = employers.user_id INNER JOIN categories ON jobs.category = categories.id WHERE jobs.category = :category";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('job/browse', ['jobs' => $jobs]);
    }

    public function locationSearch($location)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'location' => $this->sanitize($location)
        ];

        $query = "SELECT jobs.*, employment_type.name AS etype, locations.island_name AS lname, employers.name AS employer, employers.logo AS logo FROM jobs INNER JOIN employment_type ON jobs.employment_type = employment_type.id INNER JOIN locations ON jobs.location = locations.id INNER JOIN employers ON jobs.user_id = employers.user_id WHERE locations.id = :location";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('job/browse', ['jobs' => $jobs]);
    }

    public function indexSearch($keywords, $location)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'keywords' => "%" . $this->sanitize($keywords) . "%",
            'location' => $this->sanitize($location)
        ];

        $query = "SELECT jobs.*, employment_type.name AS etype, locations.island_name AS lname, employers.name AS employer, employers.logo AS logo FROM jobs INNER JOIN employment_type ON jobs.employment_type = employment_type.id INNER JOIN locations ON jobs.location = locations.id INNER JOIN employers ON jobs.user_id = employers.user_id WHERE employers.name OR jobs.job_title LIKE :keywords AND locations.island_name = :location";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('job/browse', ['jobs' => $jobs]);
    }

    public function browse()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT jobs.*, employment_type.name AS etype, locations.island_name AS lname, employers.name AS employer, employers.logo AS logo FROM jobs INNER JOIN employment_type ON jobs.employment_type = employment_type.id INNER JOIN locations ON jobs.location = locations.id INNER JOIN employers ON jobs.user_id = employers.user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $cat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('job/browse', ['jobs' => $jobs, 'categories' => $cat]);
    }

    public function categories()
    {
        return view('job/categories');
    }

    public function locations()
    {
        return view('job/locations');
    }

    public function single($id)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT jobs.user_id, jobs.email, jobs.job_title, jobs.description, jobs.tags, employers.name, employers.verified_at, employers.address, employers.logo, employers.website, employers.linkedin, employers.twitter, employers.description AS employerDescription, employment_type.name AS type, categories.name AS category, categories.id AS cid, job_level.name AS level FROM jobs INNER JOIN employers ON jobs.user_id = employers.user_id INNER JOIN employment_type ON jobs.employment_type = employment_type.id INNER JOIN categories ON jobs.category = categories.id INNER JOIN job_level ON jobs.level = job_level.id WHERE jobs.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        $job = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($_SESSION['uid'])) {
            $query = "SELECT * FROM applications WHERE user_id=:uid";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['uid' => $_SESSION['uid']]);
            $app = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if (empty($job)) {
            http_response_code(404);
            die();
        } else {
            if (isset($_SESSION['uid'])) {
                $query = "SELECT * FROM resume WHERE user_id=:uid";
                $stmt = $this->conn->prepare($query);
                $stmt->execute(['uid' => $_SESSION['uid']]);
                $resume = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return view('job/single', ['job' => $job, 'resume' => $resume, 'app' => $app]);
            } else {
                return view('job/single', ['job' => $job]);
            }
        }
    }

    public function add()
    {
        $this->middleware(['auth', 'verified', 'employer']);

        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT * FROM employers WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $type = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($type)) {
            return redirect('profile');
        }

        $user = new User();
        $currentUser = $user->get($_SESSION['uid']);

        $query = "SELECT * FROM employment_type";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $type = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM locations";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM job_level";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $levels = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return view('dashboard/add-job', [
            'user'       => $currentUser,
            'type'       => $type,
            'categories' => $categories,
            'locations'  => $locations,
            'levels'      => $levels
        ]);
    }

    public function insert()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'user_id' => $_SESSION['uid'],
            'email' => $_POST['email'],
            'type' => $_POST['type'],
            'title' => $_POST['title'],
            'category' => $_POST['category'],
            'location' => $_POST['location'],
            'level' => $_POST['level'],
            'description' => $_POST['description'],
            'tags' => $_POST['tags'],
            'expired_at' => $_POST['closing-date'],
            'created_at' => Carbon::now()->toDateString(),
            'approved_at' => null,
            'filled_at' => null,
            'subscription' => null,
        ];

        if (empty($_POST['email'])) {
            array_push($_SESSION['message'], ['error' => 'Email field is required!']);
        }

        if (empty($_POST['title'])) {
            array_push($_SESSION['message'], ['error' => 'Job Title field is required!']);
        }

        if (empty($_POST['description'])) {
            array_push($_SESSION['message'], ['error' => 'Description field is required!']);
        }

        if (empty($_POST['tags'])) {
            array_push($_SESSION['message'], ['error' => 'Tags field is required!']);
        }

        if (!empty($_POST['email']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tags'])) {
            $query = "INSERT INTO " . $this->table . "(user_id, email, employment_type, job_title, category, location, level, description, tags, expired_at, created_at, approved_at, filled_at, subscription) VALUES (:user_id, :email, :type, :title, :category, :location, :level, :description, :tags, :expired_at, :created_at, :approved_at, :filled_at, :subscription)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute($data);

            array_push($_SESSION['success'], ['success' => 'Job has been created successfully!']);
            return redirect('manage-jobs');
        }
    }

    public function apply()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'message'    => $_POST['message'],
            'job_id'     => $_GET['id'],
            'resume_id'  => $_POST['resume'],
            'user_id'    => $_SESSION['uid'],
            'applied_at' => Carbon::now()->toDateString(),
            'status'     => 'new',
            'rating'     => 'no-stars',
            'notes'      => null,
        ];

        try {
            $query = "INSERT INTO applications (message, job_id, resume_id, user_id, applied_at, status, rating, employer_notes) VALUES (:message, :job_id, :resume_id, :user_id, :applied_at, :status, :rating, :notes)";
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute($data);
            array_push($_SESSION['success'], ['success' => 'You have applied to this job! Expect a response soon.']);

            $msg = 'Hello, this is an automated response to inform you that we have received your resume for the job ' . $_POST['title'] . '. Received at ' . Carbon::now('Asia/Manila')->toDayDateTimeString()
                . '. Expect a response from one of our representatives soon! Thank you.';
            $message = new MessageController();
            $message->create($_POST['employer'], $_POST['employer'], $_SESSION['uid'], $msg);

            $query = "SELECT * FROM jobs WHERE id = :job_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['job_id' => $_GET['id']]);
            $job = $stmt->fetch(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM applicants WHERE id = :user_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['user_id' => $_SESSION['uid']]);
            $app = $stmt->fetch(PDO::FETCH_ASSOC);

            $email = $job['email'];
            $theJob = $job['job_title'];
            $applicant = $app['name'];
            $theMessage = $_POST['message'];
            $resume = $_POST['resume'];
            $application = $_GET['id'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $this->sendNewApplicationEmail($email, $theJob, $applicant, $theMessage, $resume, $application);
    }

    public function manage()
    {
        $this->middleware(['auth', 'verified', 'employer']);

        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT J.*, count(A.id) AS applications FROM jobs J LEFT JOIN applications A ON (J.id=A.job_id) WHERE J.user_id = :user_id GROUP BY J.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('dashboard/manage-jobs', ['jobs' => $jobs]);
    }

    public function applications()
    {
        $this->middleware(['auth', 'verified', 'employer']);

        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT applications.*, resume.name AS name, resume.email AS email, applicants.phone AS phone , applicants.photo AS photo FROM applications
        INNER JOIN `resume` ON resume_id = resume.id
        INNER JOIN `applicants` ON applicants.user_id = resume.user_id
        WHERE job_id = :id
        ORDER BY applied_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => isset($_GET['job']) ? $this->sanitize($_GET['job']) : null]);
        $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $jobquery = "SELECT id, job_title FROM jobs WHERE id = :id";
        $jobstmt = $this->conn->prepare($jobquery);
        $jobstmt->execute(['id' => isset($_GET['job']) ? $this->sanitize($_GET['job']) : null]);
        $job = $jobstmt->fetch(PDO::FETCH_ASSOC);

        return view('dashboard/manage-applications', ['applications' => $applications, 'job' => $job]);
    }

    public function employerNotes()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $applicant = $_POST['applicant'];

        $data = [
            'notes' => $this->sanitize($_POST['notes']),
            'id' => $this->sanitize($_POST['app_id']),
        ];

        $query = "UPDATE applications SET employer_notes = :notes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        array_push($_SESSION['success'], ['success' => 'Employer note for <strong>' . $applicant . '</strong> has been updated!']);
    }

    public function setStatusRating()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $applicant = $_POST['applicant'];
        $rating = null;

        switch ($_POST['rating']) {
            case 1:
                $rating = 'one-stars';
                break;

            case 2:
                $rating = 'two-stars';
                break;

            case 3:
                $rating = 'three-stars';
                break;

            case 4:
                $rating = 'four-stars';
                break;

            case 5:
                $rating = 'five-stars';
                break;

            default:
                $rating = 'no-stars';
        }

        $data = [
            'status' => $this->sanitize($_POST['status']),
            'rating' => $rating,
            'id'     => $this->sanitize($_POST['app_id']),
        ];

        $query = "UPDATE applications SET status = :status, rating = :rating WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        if ($_POST['status'] === 'checking') {
            $msg = "Hello, this is an automated response to inform you that our Recruitment Specialist is now working
            on your application. Make you sure you entered an updated phone number so we will able to contact you.
            Thank you. Generated on " . Carbon::now('Asia/Manila')->toDayDateTimeString();

            $message = new MessageController();
            $message->create($_SESSION['uid'], $_SESSION['uid'], $this->sanitize($_POST['applicantID']), $msg);
        }

        array_push($_SESSION['success'], ['success' => 'Status and rating for <strong>' . $applicant . '</strong> has been updated!']);
    }

    public function sendNewApplicationEmail($email, $job, $applicant, $message, $resume, $application)
    {
        $host = config('mail', 'host');
        $user = config('mail', 'username');
        $pass = config('mail', 'password');
        $port = config('mail', 'port');
        $encryption = config('mail', 'encryption');
        $fromName = config('mail', 'name');
        $fromEmail = config('mail', 'email');

        $home = 'http://' . $_SERVER['SERVER_NAME'] . '/';
        $logo = 'http://' . $_SERVER['SERVER_NAME'] . '/public/images/logo.png';
        $resumeLink = 'http://' . $_SERVER['SERVER_NAME'] . '/resume?id=' . $resume;
        $applicantLink = 'http://' . $_SERVER['SERVER_NAME'] . '/manage-applications?id=' . $application;

        $html = file_get_contents(__DIR__ . '/../resources/views/mails/email-activation.html');
        $html = preg_replace('/{home}/', $home, $html);
        $html = preg_replace('/{logo}/', $logo, $html);
        $html = preg_replace('/{job}/', $job, $html);
        $html = preg_replace('/{applicant}/', $applicant, $html);
        $html = preg_replace('/{resume}/', $resumeLink, $html);
        $html = preg_replace('/{application}/', $applicantLink, $html);

        try {
            $message = (new Swift_Message())
                ->setSubject('You\'ve got applications! - Jobs4You')
                ->setFrom([$fromEmail => $fromName])
                ->setTo($email)
                ->setBody($html, 'text/html');

            $transport = (new Swift_SmtpTransport($host, $port, $encryption))
                ->setUsername($user)
                ->setPassword($pass);

            $mailer = new Swift_Mailer($transport);
            $mailer->send($message);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
