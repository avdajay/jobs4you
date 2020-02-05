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

		if (empty($user))
		{
			array_push($_SESSION['message'], ['error' => 'Invalid email or password!']);
		}
		else if (empty($_POST['email']))
		{
			array_push($_SESSION['message'], ['error' => 'Email address is required!']);
		}
		else if (empty($_POST['password']))
		{
			array_push($_SESSION['message'], ['error' => 'Password is required!']);
		}
		else
		{
			if (password_verify($password, $user['password']))
			{
				$_SESSION['uid'] = $user['id'];
				$_SESSION['rid'] = $user['role_id'];
				$_SESSION['act'] = $user['activated_at'];
				return redirect('main');
			}
		}
	}

	public function insert()
	{
		$db = new Database();
        $cdb = $db->connect();
		$this->conn = $cdb;

		$query = "SELECT * FROM users WHERE email=?";
		$stmt = $this->conn->prepare($query);
		$stmt->execute([$this->sanitize($_POST['email'])]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if (empty($_POST['email']))
		{
			array_push($_SESSION['message'], ['error' => 'Email address is required!']);
		}
		else if (empty($_POST['password']))
		{
			array_push($_SESSION['message'], ['error' => 'Password is required!']);
		}
		else if (empty($_POST['confirm']))
		{
			array_push($_SESSION['message'], ['error' => 'Confirm Password is required!']);
		}
		else if ($_POST['confirm'] != $_POST['password'])
		{
			array_push($_SESSION['message'], ['error' => 'Password Confirmation does not match!']);
		}
		else if (count($user) > 0)
		{
			array_push($_SESSION['message'], ['error' => 'Existing account! Try logging in.']);
		}
		else
		{
			$user = new User();
			$user->email = $this->sanitize($_POST['email']);
			$user->password = $_POST['password'];
			$user->role = $_POST['role'];
			$user->created_at = Carbon::now();
			$user->updated_at = Carbon::now();
			$user->activated_at = null;
			$user->save();
			
			return redirect('activate');
		}
	}
}