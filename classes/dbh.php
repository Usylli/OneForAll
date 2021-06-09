<?php 

class Dbh {
    private $host;
    private $user;
    private $pass;
    private $name;
    public $conn;

    public function __construct() {
        $host ="localhost";
        $user = 'root';
        $pass = '';
        $name  ='blog';
        $this->conn = mysqli_connect($host,$user,$pass,$name);
    }
}