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

    public function single($id)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT * FROM jobs WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        $job = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($job))
        {
            http_response_code(404);
            die();
        }
        else 
        {
            if (isset($_SESSION['uid']))
            {
                $query = "SELECT * FROM resume WHERE user_id=:uid";
                $stmt = $this->conn->prepare($query);
                $stmt->execute(['uid' => $_SESSION['uid']]);
                $resume = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                return view('job/single', ['job' => $job, 'resume' => $resume]);
            }
            else
            {
                return view('job/single', ['job' => $job]);
            }
        }
    }

    public function singleApply()
    {

    }

    public function add()
    {
        $this->middleware(['auth', 'verified', 'employer']);

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
        $this->middleware(['auth', 'verified', 'employer']);

        return view('dashboard/manage-jobs');
    }

    public function applications()
    {
        $this->middleware(['auth', 'verified', 'employer']);

        return view('dashboard/manage-applications');
    }
}