<?php

class Connection {
    private $servername = 'localhost';
    private $username = 'root';
    private $password = ''; // windows - no password
    private $database = 'the_company';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);


        if ($this->conn->connect_error) {
            die("ERROR: ".$this->conn->error);
        }
    }
}