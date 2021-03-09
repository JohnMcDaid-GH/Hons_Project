<?php
class Adoption{

    // database connection and table name
    private $conn;
    private $table_name = "adoptionposts";

    // object properties
    public $id;
    public $title;
    public $post;
    public $author;
    public $date;
    public $imagelocation;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){

        // select all query
        $query = "SELECT * FROM adoptionposts ORDER BY DATE DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // used when filling up the update product form
    function readOne(){

        // query to read single record
        $query = "SELECT * FROM adoptionposts ORDER BY DATE DESC";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->title = $row['title'];
        $this->post = $row['post'];
        $this->author = $row['author'];
        $this->date = $row['date'];
        $this->imagelocation = $row['imagelocation'];
    }
}
