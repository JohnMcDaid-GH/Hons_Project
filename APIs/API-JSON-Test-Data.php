<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Allow: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");




// displaying XML
//header("Content-Type: application/xml; charset=UTF-8");

// displaying json
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/testdata.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$testdata = new TestData($db);

// read products will be here
// query products
$stmt = $testdata->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $testdata_arr=array();
    //$news_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $testdata_item=array(
            "id" => $id,
            "name" => $name

        );

        array_push($testdata_arr, $testdata_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in xml format
    //echo xmlrpc_encode($news_arr);

    // show products data in json format
    echo json_encode($testdata_arr);
}

// no products found will be here

else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No data found.")
    );
}