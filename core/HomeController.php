<?php

class HomeController extends Controller
{
    
    public function __construct()
    {

    }

    public function index()
    {   
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT jobs.*, employment_type.name AS etype, locations.island_name AS lname, employers.name AS employer, employers.verified_at AS verified, employers.logo AS logo FROM jobs INNER JOIN employment_type ON jobs.employment_type = employment_type.id INNER JOIN locations ON jobs.location = locations.id INNER JOIN employers ON jobs.user_id = employers.user_id LIMIT 5";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('index', ['jobs' => $jobs]);
    }
}
