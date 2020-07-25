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

	public function activate()
	{
		return view('activate');
	}

	public function handleActivation($token)
	{
		if (empty($token)) {
			array_push($_SESSION['message'], ['error' => 'Token cannot be empty!']);
		} else {
			$db = new Database();
			$cdb = $db->connect();
			$this->conn = $cdb;

			$query = "SELECT * FROM users WHERE activation_code=:code";
			$stmt = $this->conn->prepare($query);
			$stmt->execute(['code' => $this->sanitize($token)]);
			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			if (empty($user)) {
				array_push($_SESSION['message'], ['error' => 'Invalid token or has expired!']);
			} else {
				$actData = [
					'id' => $user['id'],
					'activated' => Carbon::now(new DateTimeZone('Asia/Manila')),
					'code' => null
				];

				$actQuery = "UPDATE users SET activated_at =:activated, activation_code=:code WHERE id=:id";
				$actstmt = $this->conn->prepare($actQuery);
				$actstmt->execute($actData);
			}

			$sesQuery = "SELECT * FROM users WHERE id=:id";
			$sesStmt = $this->conn->prepare($sesQuery);
			$sesStmt->execute(['id' => $user['id']]);
			$sesUser = $sesStmt->fetch(PDO::FETCH_ASSOC);

			$applicantsData = [
				'name' => null,
				'address' => null,
				'phone' => null,
				'summary' => null,
				'facebook' => null,
				'twitter' => null,
				'linkedin' => null,
				'slug' => null,
				'photo' => null,
				'location' => 1,
				'user_id' => $user['id'],
			];

			$employersData = [
				'user_id' => $user['id'],
				'name' => null,
				'address' => null,
				'description' => null,
				'phone' => null,
				'size' => null,
				'logo' => null,
				'slug' => null,
				'website' => null,
				'facebook' => null,
				'twitter' => null,
				'linkedin' => null,
				'location' => 1,
				'verified_at' => null,
			];

			$applicantsTable = "applicants";
			$employersTable = "employers";

			switch ($user['role_id']) {
				case 1:

					$query = "INSERT INTO " . $applicantsTable . "(name, address, phone, summary, facebook, twitter, linkedin, slug, photo, location, user_id) VALUES (:name, :address, :phone, :summary, :facebook, :twitter, :linkedin, :slug, :photo, :location, :user_id)";
					$stmt = $this->conn->prepare($query);
					$stmt->execute($applicantsData);
					break;

				case 2:
					$query = "INSERT INTO " . $employersTable . "(user_id, name, address, description, phone, size, logo, slug, website, facebook, twitter, linkedin, location, verified_at) VALUES (:user_id, :name, :address, :description, :phone, :size, :logo, :slug, :website, :facebook, :twitter, :linkedin, :location, :verified_at)";
					$stmt = $this->conn->prepare($query);
					$stmt->execute($employersData);
					break;
			}

			$this->sendWelcomeEmail($sesUser['email']);

			array_push($_SESSION['success'], ['success' => 'Account has been activated!']);

			$_SESSION['act'] = $sesUser['activated_at'];
			return redirect('main');
		}
	}

	public function sendWelcomeEmail($email)
	{
		$host = config('mail', 'host');
		$user = config('mail', 'username');
		$pass = config('mail', 'password');
		$port = config('mail', 'port');
		$fromName = config('mail', 'name');
		$fromEmail = config('mail', 'email');

		$home = 'http://' . $_SERVER['SERVER_NAME'] . '/';
		$logo = 'http://' . $_SERVER['SERVER_NAME'] . '/public/images/logo.png';

		$html = file_get_contents(__DIR__ . '/../resources/views/mails/welcome.html');
		$html = preg_replace('/{home}/', $home, $html);
		$html = preg_replace('/{logo}/', $logo, $html);

		try {
			$message = (new Swift_Message())
				->setSubject('Welcome to Jobs4You')
				->setFrom([$fromEmail => $fromName])
				->setTo($email)
				->setBody($html, 'text/html');

			$transport = (new Swift_SmtpTransport($host, $port))
				->setUsername($user)
				->setPassword($pass);

			$mailer = new Swift_Mailer($transport);
			$mailer->send($message);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function sendActivationEmail($email, $token)
	{
		$host = config('mail', 'host');
		$user = config('mail', 'username');
		$pass = config('mail', 'password');
		$port = config('mail', 'port');
		$encryption = config('mail', 'encryption');
		$fromName = config('mail', 'name');
		$fromEmail = config('mail', 'email');

		$home = 'http://' . $_SERVER['SERVER_NAME'] . '/';
		$logo = 'http://' . $_SERVER['SERVER_NAME'] . '/public/images/logo.png';

		$html = file_get_contents(__DIR__ . '/../resources/views/mails/email-activation.html');
		$html = preg_replace('/{home}/', $home, $html);
		$html = preg_replace('/{logo}/', $logo, $html);
		$html = preg_replace('/{email}/', $email, $html);
		$html = preg_replace('/{token}/', $token, $html);

		try {
			$message = (new Swift_Message())
				->setSubject('Verify Email Address - Jobs4You')
				->setFrom([$fromEmail => $fromName])
				->setTo($email)
				->setBody($html, 'text/html');

			$transport = (new Swift_SmtpTransport($host, $port, $encryption))
				->setUsername($user)
				->setPassword($pass);

			$mailer = new Swift_Mailer($transport);
			$mailer->send($message);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
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

		if (empty($user)) {
			array_push($_SESSION['message'], ['error' => 'No existing user found! Register an account.']);
		} else {
			if (empty($_POST['email'])) {
				array_push($_SESSION['message'], ['error' => 'Email address is required!']);
			}
			if (empty($_POST['password'])) {
				array_push($_SESSION['message'], ['error' => 'Password is required!']);
			}
			if (isset($_POST['email']) && !empty($_POST['email']) && password_verify($password, $user['password']) && empty($user['suspended_at'])) {
				$_SESSION['uid'] = $user['id'];
				$_SESSION['rid'] = $user['role_id'];
				$_SESSION['act'] = $user['activated_at'];

				if ($user['role_id'] === "0") { // Admin. Role 0 is Administrator Account
					return redirect('admin');
				}

				return redirect('main');
			} elseif (!empty($user['suspended_at'])) {
				array_push($_SESSION['message'], ['error' => 'Your account is suspended. Contact support!']);
			} else {
				array_push($_SESSION['message'], ['error' => 'Invalid email or password!']);
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

		if (!empty($user) && !empty($_POST['email'])) {
			array_push($_SESSION['message'], ['error' => 'Existing email! Try logging in.']);
		} else {
			if (empty($_POST['email'])) {
				array_push($_SESSION['message'], ['error' => 'Email address is required!']);
			}
			if (empty($_POST['password'])) {
				array_push($_SESSION['message'], ['error' => 'Password is required!']);
			}
			if (empty($_POST['confirm'])) {
				array_push($_SESSION['message'], ['error' => 'Confirm Password is required!']);
			}
			if (strlen($_POST['password']) < 8) {
				array_push($_SESSION['message'], ['error' => 'Password length must be greater than 8!']);
			}

			if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm']) && $_POST['confirm'] == $_POST['password'] && strlen($_POST['password']) > 8) {
				$actToken = sha1($this->sanitize($_POST['email']) . rand(100000, 999999) . microtime());

				$user = new User();
				$user->email = $this->sanitize($_POST['email']);
				$user->password = $_POST['password'];
				$user->role = $_POST['role'];
				$user->created_at = Carbon::now(new DateTimeZone('Asia/Manila'));
				$user->updated_at = Carbon::now(new DateTimeZone('Asia/Manila'));
				$user->activated_at = null;
				$user->activation_code = $actToken;
				$user->save();

				$this->sendActivationEmail($this->sanitize($_POST['email']), $actToken);

				return redirect('activate');
			}

			if ($_POST['confirm'] != $_POST['password']) {
				array_push($_SESSION['message'], ['error' => 'Password Confirmation does not match!']);
			}
		}
	}
}
