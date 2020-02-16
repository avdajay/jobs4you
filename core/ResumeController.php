<?php

class ResumeController extends Controller
{
    private $table = "resume";
    
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
        $stmt->execute($data);
    }
}