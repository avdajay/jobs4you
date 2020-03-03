<?php

use Carbon\Carbon;

class JobController extends Controller
{
    private $table = 'jobs';
    
    public function __construct()
    {

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
        
        return view('job/browse', ['jobs' => $jobs]);
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

        $query = "SELECT jobs.email, jobs.job_title, jobs.description, jobs.tags, employers.name, employers.address, employers.logo, employers.website, employers.linkedin, employment_type.name AS type, categories.name AS category, job_level.name AS level FROM jobs INNER JOIN employers ON jobs.user_id = employers.user_id INNER JOIN employment_type ON jobs.employment_type = employment_type.id INNER JOIN categories ON jobs.category = categories.id INNER JOIN job_level ON jobs.level = job_level.id WHERE jobs.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        $job = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($_SESSION['uid']))
        {
            $query = "SELECT * FROM applications WHERE user_id=:uid";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['uid' => $_SESSION['uid']]);
            $app = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if (empty($job))
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
            
                return view('job/single', ['job' => $job, 'resume' => $resume, 'app' => $app]);
            }
            else
            {
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

        if (empty($type))
        {
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

        
        return view('dashboard/add-job', ['user'       => $currentUser, 
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

        if (empty($_POST['email']))
        {
            array_push($_SESSION['message'], ['error' => 'Email field is required!']);
        }

        if (empty($_POST['title']))
        {
            array_push($_SESSION['message'], ['error' => 'Job Title field is required!']);
        }

        if (empty($_POST['description']))
        {
            array_push($_SESSION['message'], ['error' => 'Description field is required!']);
        }

        if (empty($_POST['tags']))
        {
            array_push($_SESSION['message'], ['error' => 'Tags field is required!']);
        }

        if (!empty($_POST['email']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tags']))
        {
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

        try
        {
            $query = "INSERT INTO applications (message, job_id, resume_id, user_id, applied_at, status, rating, employer_notes) VALUES (:message, :job_id, :resume_id, :user_id, :applied_at, :status, :rating, :notes)";
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute($data);  
            array_push($_SESSION['success'], ['success' => 'You have applied to this job! Expect a response soon.']);
      
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
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

        return view('dashboard/manage-applications');
    }
}