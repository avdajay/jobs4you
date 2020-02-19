<?php

class ResumeController extends Controller
{
    private $table = "resume";
    private $educTable = "education";
    private $empTable = "employers";
    
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

    public function save()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        // Resume Details
        $data = [
            'name' => $this->sanitize($_POST['name']),
            'email' => $this->sanitize($_POST['email']),
            'title' => $this->sanitize($_POST['title']),
            'location' => $this->sanitize($_POST['location']),
            'photo' => $this->sanitize($_POST['photo']),
            'video' => $this->sanitize($_POST['video']),
            'description' => $this->sanitize($_POST['description']),
            'salary' => $this->sanitize($_POST['salary']),
            'user_id' => $_SESSION['uid'],
        ];
        
        $query = "INSERT INTO " . $this->table . " (name, email, title, location, photo, video, description, salary, user_id, id) VALUES (:name, :email, :title, :location, :photo, :video, :description, :salary, :user_id)";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute($data);

        if ($result)
        {
            array_push($_SESSION['success'], ['success' => 'Resume has been created successfully!']);
        }
        else
        {
            array_push($_SESSION['message'], ['error' => 'Error creating resume. Check your data!']);
        }

        // Educational Background Information
        $school = $this->sanitize($_POST['school']);
        $type = $this->sanitize($_POST['type']);
        $course = $this->sanitize($_POST['course']);
        $major = $this->sanitize($_POST['major']);
        $start = $this->sanitize($_POST['start']);
        $end = $this->sanitize($_POST['end']);
        $description = $this->sanitize($_POST['description']);
        $id = $_SESSION['uid'];

        $educData = [
            'user_id'     => $id, 
            'school_name' => $school[$index], 
            'type'        => $type[$index], 
            'course'      => $course[$index], 
            'major'       => $major[$index], 
            'start_year'  => $start[$index], 
            'end_year'    => $end[$index], 
            'description' => $description[$index],
        ];

        foreach ($school as $index => $value)
        {
            $query = "INSERT INTO " . $this->educTable . " (user_id, school_name, type, course, major, start_year, end_year, description) VALUES (:user_id, :school_name, :type, :course, :major, :start_year, :end_year, :description)";
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute($educData);

            if ($result)
            {
                array_push($_SESSION['success'], ['success' => 'Education information has been inserted!']);
            }
            else
            {
                array_push($_SESSION['message'], ['error' => 'Error inserting educational background. Check your data!']);
            }
        }

        // Job Experience Information
        $employer = $this->sanitize($_POST['employer']);
        $position = $this->sanitize($_POST['position']);
        $level = $this->sanitize($_POST['level']);
        $start_date = $this->sanitize($_POST['start_date']);
        $end_date = $this->sanitize($_POST['end_date']);
        $summary = $this->sanitize($_POST['summary']);

        $expData = [
            'employer' => $employer[$index],
            'position' => $position[$index],
            'level'    => $level[$index],
            'start'    => $start_date[$index],
            'end'      => $end_date[$index],
            'summary'  => $summary[$index],

        ];

        foreach ($employer as $index => $value)
        {
            $query = "INSERT INTO " . $this->empTable . " (employer, position, level, start, end, summary) VALUES (:employer, :position, :level, :start, :end, :summary)";
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute($expData);

            if ($result)
            {
                array_push($_SESSION['success'], ['success' => 'Job Experience information has been inserted!']);
            }
            else
            {
                array_push($_SESSION['message'], ['error' => 'Error inserting job experience. Check your data!']);
            }
        }
    }
}