<?php
include_once '../config/database.php';

$result=mysqli_query("select * from adoptionposts");

$xml = new DOMDocument("1.0");

$title = $xml->createElement("Title");
$xml->appendChild($title);

echo $xml->saveXML();