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

    public function index()
    {
        return view('browse-resume');
    }

    public function show($id)
    {
        return view('resume');
    }

    public function add_resume_view()
    {
        $user = new User();
        
        if ($_SESSION['rid'] == 1)
        {
            $type = $user->user_applicants($_SESSION['uid']);
        }
        else
        {
            $type = $user->user_employees($_SESSION['uid']);
        }

        return view('dashboard/add-resume', ['user' => $type]);
    }

    public function manage_resume_view()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT r.id, r.name, r.email, r.title, r.photo, r.description, r.salary, r.created_at, l.island_name AS location FROM resume r INNER JOIN locations l ON l.ID = r.location WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $resume = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return view('dashboard/manage-resumes', ['resume' => $resume]);
    }

    public function save()
    {
        $user = new User();
        
        if ($_SESSION['rid'] == 1)
        {
            $result = array('user' => $user->user_applicants($_SESSION['uid']));
        }
        else
        {
            $result = array('user' => $user->user_employees($_SESSION['uid']));
        }

        $userLocation = $result['user']['location'];
        $userPhoto = $result['user']['photo'];

        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        // Resume Details
        $data = [
            'name' => $this->sanitize($_POST['name']),
            'email' => $this->sanitize($_POST['email']),
            'title' => $this->sanitize($_POST['title']),
            'location' => $this->sanitize($userLocation),
            'photo' => $this->sanitize($userPhoto),
            'description' => $this->sanitize($_POST['desc']),
            'salary' => $this->sanitize($_POST['salary']),
            'created' => Carbon::now()->toFormattedDateString(),
            'user_id' => $_SESSION['uid'],
        ];

        try
        {
            $query = "INSERT INTO " . $this->table . "(name, email, title, location, photo, description, salary, created_at, user_id) VALUES (:name, :email, :title, :location, :photo, :description, :salary, :created, :user_id)";
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute($data);

            array_push($_SESSION['success'], ['success' => 'Resume has been created successfully!']);
        }
        catch (PDOException $e)
        {   
            array_push($_SESSION['message'], ['error' => 'Error creating resume. Check your data!']);
            echo $e->getMessage();
        }
       
        // Educational Background Information
        $school = $_POST['school'];
        $type = $_POST['type'];
        $course = $_POST['course'];
        $major = $_POST['major'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $description = $_POST['description'];
        $id = $_SESSION['uid'];

        $filtered = array_filter($school);
  
        foreach ($filtered as $index => $value)
        {
                $schoolQuery = "INSERT INTO " . $this->educTable . " (user_id, school_name, type, course, major, start_year, end_year, description) VALUES (:user_id, :school_name, :type, :course, :major, :start_year, :end_year, :description)";
                $stmt = $this->conn->prepare($schoolQuery);
                $schoolResult = $stmt->execute([
                    'user_id'     => $this->sanitize($id), 
                    'school_name' => $this->sanitize($school[$index]), 
                    'type'        => $this->sanitize($type[$index]), 
                    'course'      => $this->sanitize($course[$index]), 
                    'major'       => $this->sanitize($major[$index]), 
                    'start_year'  => $this->sanitize($start[$index]), 
                    'end_year'    => $this->sanitize($end[$index]), 
                    'description' => $this->sanitize($description[$index]),
                ]);
        }
        if ($schoolResult)
        {
            array_push($_SESSION['success'], ['success' => 'Education information has been inserted!']);
        }
        else
        {
            array_push($_SESSION['message'], ['error' => 'Error inserting educational background. Check your data!']);
        }

        // Job Experience Information
        $employer = $_POST['employer'];
        $position = $_POST['position'];
        $level = $_POST['level'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $summary = $_POST['summary'];

        $filtered = array_filter($employer);

        foreach ($filtered as $index => $value)
        {
          
            $employerQuery = "INSERT INTO " . $this->expTable . " (user_id, employer_name, position, employment_type_id, start_date, end_date, summary) VALUES (:user_id, :employer, :position, :level, :start, :end, :summary)";
            $stmt = $this->conn->prepare($employerQuery);
            $employerResult = $stmt->execute([
                'user_id'  => $this->sanitize($id),
                'employer' => $this->sanitize($employer[$index]),
                'position' => $this->sanitize($position[$index]),
                'level'    => $this->sanitize($level[$index]),
                'start'    => $this->sanitize($start_date[$index]),
                'end'      => $this->sanitize($end_date[$index]),
                'summary'  => $this->sanitize($summary[$index]),
            ]);

        }
        if ($employerResult)
        {
            array_push($_SESSION['success'], ['success' => 'Job Experience information has been inserted!']);
            return redirect('manage-resume');
        }
        else
        {
            array_push($_SESSION['message'], ['error' => 'Error inserting job experience. Check your data!']);
        }

        // Skills Information
        $skill = $_POST['skill'];
        $difficulty = $_POST['position'];

        $filtered = array_filter($skill);

        foreach ($filtered as $index => $value)
        {
          
            $employerQuery = "INSERT INTO " . $this->skillsTbl . " (user_id, name, difficulty) VALUES (:user_id, :name, :difficulty)";
            $stmt = $this->conn->prepare($employerQuery);
            $employerResult = $stmt->execute([
                'user_id'  => $this->sanitize($id),
                'name' => $this->sanitize($skill[$index]),
                'difficulty' => $this->sanitize($difficulty[$index]),
            ]);

        }
        if ($employerResult)
        {
            array_push($_SESSION['success'], ['success' => 'Skills information has been inserted!']);
            return redirect('manage-resume');
        }
        else
        {
            array_push($_SESSION['message'], ['error' => 'Error inserting skills information. Check your data!']);
        }
    }
    
}