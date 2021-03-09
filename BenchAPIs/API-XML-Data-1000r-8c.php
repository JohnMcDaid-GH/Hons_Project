<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Allow: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

// displaying XML
header("Content-Type: application/xml; charset=UTF-8");

// displaying json
//header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/APIData1000r8c.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$apidata1000r8c = new APIData1000r8c($db);

// read products will be here
// query products
$stmt = $apidata1000r8c->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    function to_xml(SimpleXMLElement $object, array $data) {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $new_object = $object->addChild($key);
                to_xml( $new_object, $value);
            } else {
                // if the key is an integer, it needs text with it to actually work.
                if ($key != 0 && $key === (int) $key) {
                    $key = "key_$key";
                }

                $object->addChild( $key, htmlspecialchars($value));
            }
        }
    }

    // adoption array
    $apidata1000r8c_arr=array();
    $xml = new SimpleXMLElement('<root/>');

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $apidata1000r8c_item=array(
            "id" => $id,
            "name" => $name,
            "name1" => $name1,
            "name2" => $name2,
            "name3" => $name3,
            "name4" => $name4,
            "name5" => $name5,
            "name6" => $name6

        );

        //array_push($adoption_arr, $adoption_item);
        to_xml( $xml, $apidata1000r8c_item);
    }

    echo $xml->asXML();





    // set response code - 200 OK
    http_response_code(200);

    // show products data in xml format
    //echo xmlrpc_encode($adoption_arr);


    // show products data in json format
    //echo json_encode($adoption_arr);
}

// no products found will be here

else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No Data found.")
    );
}