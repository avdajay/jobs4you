<?php

class AdminController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT * FROM jobs";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM users WHERE role_id=1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $jobseekers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM users WHERE role_id=2";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $employers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('admin/index', ['jobs' => $jobs, 'jobseekers' => $jobseekers, 'employers' => $employers]);
    }

    public function settings()
    {
        // return view('admin/settings');
    }

    public function users()
    {
        return view('admin/users');
    }
}
