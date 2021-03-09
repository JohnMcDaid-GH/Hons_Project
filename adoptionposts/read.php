<?php
// required headers
header("Access-Control-Allow-Origin: *");

// displaying XML
header("Content-Type: application/xml; charset=UTF-8");

// displaying json
//header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/adoption.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$adoption = new Adoption($db);

// read products will be here
// query products
$stmt = $adoption->read();
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
    $adoption_arr=array();
    $xml = new SimpleXMLElement('<root/>');

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $adoption_item=array(
            "id" => $id,
            "title" => $title,
            "post" => html_entity_decode($post),
            "author" => $author,
            "date" => $date,
            "imagelocation" => $imagelocation
        );

        //array_push($adoption_arr, $adoption_item);
        to_xml( $xml, $adoption_item);
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
        array("message" => "No Adoption Posts found.")
    );
}