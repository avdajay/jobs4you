<?php

class User
{
    private $conn;
    private $table = 'users';

    //Properties
    public $id;
    public $email;
    public $password;
    public $role;
    public $created_at;
    public $updated_at;

    public function __construct()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;
    }

    public function get($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id=?";
		$stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $user;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $collection = $stmt->fetchAll();

        return $collection;
    }
	
	public function save()
	{
		$data = [
			'email' => $this->email,
			'password' => password_hash($this->password, PASSWORD_DEFAULT),
			'role' => $this->role,
			'created' => $this->created_at,
			'updated' => $this->updated_at
		];
		
		$query = "INSERT INTO " . $this->table . "(email, password, role_id, created_at, updated_at) VALUES (:email, :password, :role, :created, :updated)";
		$stmt = $this->conn->prepare($query);
		$stmt->execute($data);
	}
	
}