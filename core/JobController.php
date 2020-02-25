<?php

class JobController extends Controller
{
    public function __construct()
    {
        
    }

    public function browse()
    {
        return view('job/browse');
    }

    public function categories()
    {
        return view('job/categories');
    }

    public function single()
    {
        return view('job/single');
    }

    public function add()
    {
        $user = new User();
        $currentUser = $user->get($_SESSION['uid']);

        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

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

        
        return view('dashboard/add-job', ['user'       => $currentUser, 
                                          'type'       => $type, 
                                          'categories' => $categories, 
                                          'locations'  => $locations,
                                          'levels'      => $levels
                                          ]);
    }

    public function manage()
    {
        return view('job/manage');
    }

    public function applications()
    {
        return view('job/applications');
    }
}