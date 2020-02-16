<?php

use Carbon\Carbon;

class AccountController extends Controller
{
    public function __construct()
    {
        
    }

    public function profile()
    {
        $user = new User();
        
        if ($_SESSION['rid'] == 1)
        {
            $result = $user->user_applicants($_SESSION['uid']);
        }
        else
        {
            $result = $user->user_employees($_SESSION['uid']);
        }

        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT * FROM locations";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $location = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return view('profile', ['user' => $result, 'location' => $location]);
    }

    public function update_profile()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $photo = $this->handleImageUpload();

        $applicantsTable = "applicants";
        $employersTable = "employers";

        switch ($_SESSION['rid'])
        {
            case 1:
                
                if ($_FILES['photo']['size'] != 0)
                {
                    $applicantsData = [
                        'name' => $this->sanitize($_POST['name']),
                        'address' => $this->sanitize($_POST['address']),
                        'phone' => $this->sanitize($_POST['phone']),
                        'summary' => $this->sanitize($_POST['details']),
                        'facebook' => $this->sanitize($_POST['facebook']),
                        'twitter' => $this->sanitize($_POST['twitter']),
                        'linkedin' => $this->sanitize($_POST['linkedin']),
                        'slug' => slug($this->sanitize($_POST['name'])),
                        'photo' => $photo,
                        'location' => $_POST['location'],
                        'user_id' => $_SESSION['uid'],
                    ];
    
                    $query = "UPDATE " . $applicantsTable . " SET name=:name, address=:address, phone=:phone, summary=:summary, facebook=:facebook, twitter=:twitter, linkedin=:linkedin, slug=:slug, photo=:photo, location=:location WHERE user_id=:user_id";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute($applicantsData);

                    array_push($_SESSION['success'], ['success' => 'Profile has been updated successfully!']);
                    
                }
                else
                {
                    array_push($_SESSION['message'], ['error' => 'Please upload a photo or a logo image!']);
                }
                 
                break;

            case 2:
                $employersData = [
                    'user_id' => $_SESSION['uid'],
                    'name' => $this->sanitize($_POST['name']),
                    'address' => $this->sanitize($_POST['address']),
                    'description' => $this->sanitize($_POST['description']),
                    'phone' => $this->sanitize($_POST['phone']),
                    'size' => $this->sanitize($_POST['size']),
                    'logo' => $photo,
                    'slug' => slug($this->sanitize($_POST['name'])),
                    'website' => $this->sanitize($_POST['website']),
                    'facebook' => $this->sanitize($_POST['facebook']),
                    'twitter' => $this->sanitize($_POST['twitter']),
                    'linkedin' => $this->sanitize($_POST['linkedin']),
                    'location' => $_POST['location'],
                    'verified_at' => null, 
                ];

                $query = "UPDATE " . $employersTable . " SET name=:name, address=:address, description=:description, phone=:phone, size=:size, logo=:logo, slug=:slug, website=:website, facebook=:facebook, twitter=:twitter, linkedin=:linkedin, location=:location WHERE user_id=:user_id";
                $stmt = $this->conn->prepare($query);
                $stmt->execute($employersData);
                array_push($_SESSION['success'], ['success' => 'Profile has been updated successfully!']);
                break;

        }
    
    }

    public function change_password()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT * FROM users WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $_SESSION['uid']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $currentPassword = $_POST['current_password'];
        $passwordOnFile = $user['password'];
        $confirmNew = $_POST['confirm_new'];
        $newPassword = $_POST['new_password'];

        if (empty($currentPassword) || empty($confirmNew) || empty($newPassword))
        {
            array_push($_SESSION['message'], ['error' => 'Please fill in all required fields!']);
        }

        if (!empty($currentPassword) && !empty($confirmNew) && !empty($newPassword))
        {
            if (password_verify($currentPassword, $passwordOnFile) && $confirmNew == $newPassword && strlen($newPassword) > 8)
            {
                $passQuery = "UPDATE users SET password=:password, updated_at=:updated WHERE id=:id";
                $passStmt = $this->conn->prepare($passQuery);
                $passStmt->execute(['password' => password_hash($newPassword, PASSWORD_DEFAULT), 'updated' => Carbon::now(new DateTimeZone('Asia/Manila')),'id' => $user['id']]);
                
                array_push($_SESSION['success'], ['success' => 'Password changed successfully!']);
            }
            else
            {
                array_push($_SESSION['message'], ['error' => 'Passwords does not match!']);
            }

            if ($currentPassword == $newPassword)
            {
                array_push($_SESSION['message'], ['error' => 'Please use another password!']);
            }

            if ($confirmNew != $newPassword)
            {
                array_push($_SESSION['message'], ['error' => 'Password confirmation does not match!']);
            }

            if (strlen($newPassword) < 8)
            {
                array_push($_SESSION['message'], ['error' => 'Password should have a minimum of 8 characters!']);
            }
        }

    }

    public function handleImageUpload()
    {
        $currentDir = getcwd();
        $uploadDirectory = "/public/uploads/";

        $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

        $fileName = $_FILES['photo']['name'];
        $fileSize = $_FILES['photo']['size'];
        $fileTmpName  = $_FILES['photo']['tmp_name'];
        $fileType = $_FILES['photo']['type'];
        $tmp = explode('.',$fileName);
        $str = end($tmp);
        $fileExtension = strtolower($str);

        $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

        if (!in_array($fileExtension,$fileExtensions)) {
            array_push($_SESSION['message'], ['error' => 'This file extension is not allowed. Please upload a JPEG or PNG file']);
        }

        if ($fileSize > 2000000) {
            array_push($_SESSION['message'], ['error' => 'This file is more than 2MB. Sorry, it has to be less than or equal to 2MB']);
        }

        if (empty($_POST['message']) && $_FILES['photo']['size'] != 0)
        {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload)
            {
                return $fileName;
            }
        }
    }

}