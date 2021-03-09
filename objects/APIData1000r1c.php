<?php
class APIData1000r1c {

    // database connection and table name
    private $conn;
    private $table_name = "apidata1000r4c";

    // object properties
    public $id;
    public $name;
    public $name1;
    public $name2;



    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){

        // select all query
        $query = "SELECT * FROM apidata1000r1c";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // used when filling up the update product form
    function readOne(){

        // query to read single record
        $query = "SELECT * FROM apidata1000r1c";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];

    }
}
