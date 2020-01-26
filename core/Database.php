<?php

class Database {

    private $dbhost = 'localhost';
    private $dbname = 'jobtain';
    private $dbuser = 'root';
    private $dbpass = '';
    private $conn;

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
