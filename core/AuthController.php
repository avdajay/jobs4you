<?php

use Carbon\Carbon;

class AuthController extends Controller
{
	private $conn;
	
	public function login()
	{
		return view('login');
	}

	public function register()
	{
		return view('register');
	}

	public function authenticate($email, $password)
	{
		$db = new Database();
        $cdb = $db->connect();
		$this->conn = $cdb;
		
		$query = "SELECT * FROM users WHERE email=?";
		$stmt = $this->conn->prepare($query);
        $stmt->execute([$this->sanitize($email)]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if (isset($_POST['email']) && isset($_POST['password']))
		{
			if (password_verify($password, $user['password']))
			{
				return redirect('dashboard');
			}
		}
		else 
		{
			$_SESSION['message'] = 'Please fill in all required fields.';
		}
	}

	public function insert()
	{
		$user = new User();
		$user->email = $this->sanitize($_POST['email']);
		$user->password = $_POST['password'];
		$user->role = $_POST['role'];
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		$user->save();
	}

	public function resume()
	{
		return view('resume');
	}
}