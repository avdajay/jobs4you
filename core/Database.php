<?php

class Database {

    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpass;
    private $conn;

    public function __construct()
    {
        $this->dbhost = config('db', 'host');
        $this->dbname = config('db', 'name');
        $this->dbuser = config('db', 'user');
        $this->dbpass = config('db', 'pass');
    }

    public function connect() {
        $this->conn = null;
        
        try { 
            $this->conn = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }

}
