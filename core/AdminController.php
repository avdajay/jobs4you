<?php

use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function settings()
    {
        return view('admin/settings');
    }

    public function users()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT users.*, roles.name AS rname FROM users INNER JOIN roles ON users.role_id = roles.id GROUP BY users.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return view('admin/users', ['users' => $users]);
    }

    public function resumes()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT resume.*, locations.island_name AS lname FROM resume INNER JOIN locations ON locations.id = resume.location";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $resume = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return view('admin/resumes', ['resume' => $resume]);
    }

    public function jobs()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT J.*, count(A.id) AS applications FROM jobs J LEFT JOIN applications A ON (J.id=A.job_id) GROUP BY J.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('admin/jobs', ['jobs' => $jobs]);
    }

    public function addFeatured()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'current' => Carbon::now()->toDateString(),
            'id' => $this->sanitize($_POST['featured']),
        ];

        $query = "UPDATE jobs SET featured_at=:current WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        array_push($_SESSION['success'], ['success' => 'Job listing has been featured!']);
    }

    public function deleteJobAdmin()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'id' => $this->sanitize($_POST['deleted']),
        ];

        $query = "DELETE FROM jobs WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        array_push($_SESSION['success'], ['success' => 'Job listing has been deleted!']);
        
    }

    public function manualActivate()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'id' => $this->sanitize($_POST['manual']),
            'activated' => Carbon::now('Asia/Manila'),
            'updated' => Carbon::now('Asia/Manila'),
            'code' => null
        ];

        $query = "UPDATE users SET updated_at = :updated, activated_at = :activated, activation_code = :code WHERE id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        array_push($_SESSION['success'], ['success' => 'Account has been manually activated!']);
    }

    public function resendActivation()
    {
        $auth = new AuthController();
        $auth->sendActivationEmail($_POST['email'], $_POST['activation']);

        array_push($_SESSION['success'], ['success' => 'Activation token has been sent successfully!']);
    }

    public function suspend()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'id' => $this->sanitize($_POST['suspend']),
            'suspended' => Carbon::now('Asia/Manila'),
            'updated' => Carbon::now('Asia/Manila'),
        ];

        $query = "UPDATE users SET updated_at = :updated, suspended_at = :suspended WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        array_push($_SESSION['success'], ['success' => 'Account has been suspended!']);
    }

    public function unsuspend()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'id' => $this->sanitize($_POST['unsuspend']),
            'suspended' => null,
            'updated' => Carbon::now('Asia/Manila'),
        ];

        $query = "UPDATE users SET updated_at = :updated, suspended_at = :suspended WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        array_push($_SESSION['success'], ['success' => 'Account has been unsuspended!']);
    }

    public function preview($id, $rid)
    {
        $user = new User();
        
        if ($rid == 1)
        {
            $result = $user->user_applicants($id);
        }
        else
        {
            $result = $user->user_employees($id);
        }

        return view('admin/preview', $result);
    }

    public function verifyAccount()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "UPDATE employers SET verified_at = :verified WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['verified' => Carbon::now('Asia/Manila'),
                        'id' => $this->sanitize($_POST['verify'])]);

        array_push($_SESSION['success'], ['success' => 'Account identity verified!']);
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

        $query = "SELECT * FROM resume";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $resume = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('admin/index', ['jobs' => $jobs, 'jobseekers' => $jobseekers, 'employers' => $employers, 'resume' => $resume]);
    }

}
