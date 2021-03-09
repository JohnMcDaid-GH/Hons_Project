<?php
class Database{

    // Database details for my domain

//    private $host = "johnmcdaid.net.mysql";
//    private $db_name = "johnmcdaid_netmydb";
//    private $username = "johnmcdaid_netmydb";
//    private $password = "Admin1234";

    // Database details for local host
    private $host = "127.0.0.1";
    private $db_name = "pts2019";
    private $username = "John";
    private $password = "Admin123";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password );
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
