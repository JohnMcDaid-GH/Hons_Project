<?php

//TITLE
echo '<title>JSON vs XML</title><br/><br/>';
echo '<h1>JSON vs XML</h1><br/><br/>';
//SAMPLE DATA
//$json = "[55, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0.1]";
$json = file_get_contents('http://localhost/Hons_Project/APIs/API-JSON.php');
//$json = file_get_contents("http://johnmcdaid.net/Api%20Demo/API's/API-JSON.php");
//$json = file_get_contents('json.json');

//$xml = "<array><int>55</int><string>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</string><float>0.1</float></array>";
$xml = file_get_contents('http://localhost/Hons_Project/APIs/API-XML.php');
//$xml = simplexml_load_file("http://johnmcdaid.net/Api%20Demo/API's/API-XML.php");
//$xml = file_get_contents('xml.xml');


//$jsonSample = json_decode($json, true);
echo '<h2>Sample Data from JSON</h2>';
print_r($json);
echo '<hr>';
echo '<h2>Sample Data from XML</h2>';
print_r($xml);


//1000 REQUESTS

echo '<hr>';
echo '<h2>Sample data at 1000 requests</h2>';



$before = microtime(true);

for ($i=0 ; $i<1000; $i++) {
    simplexml_load_string($xml);
}

$after = microtime(true);
echo '<br/>';
echo '<br/><b>Seconds</b>';
echo '<br/>XML total time taken: '.($after-$before);
echo '<br/>XML average time per object: '.($after-$before)/$i;

echo '<br/><br/><b>Milliseconds</b>';
echo '<br/>XML total time taken: '.($after-$before) * 1000;
echo '<br/>XML average time per object: '.($after-$before)/$i * 1000;

$before = microtime(true);
for ($i=0 ; $i<1000; $i++) {
    json_decode($json);
}

$after = microtime(true);
echo '<br/>';
echo '<br/><b>Seconds</b>';
echo '<br/>JSON total time taken: '.($after-$before);
echo '<br/>JSON average time per object: '.($after-$before)/$i;

echo '<br/><br/><b>Milliseconds</b>';
echo '<br/>JSON total time taken: '.($after-$before) * 1000;
echo '<br/>JSON average time per object: '.($after-$before)/$i * 1000;

//10,000 REQUESTS

echo '<hr>';
echo '<h2>Sample data at 10,000 requests</h2>';

$before = microtime(true);

for ($i=0 ; $i<10000; $i++) {
    simplexml_load_string($xml);
}

$after = microtime(true);
echo '<br/>';
echo '<br/><b>Seconds</b>';
echo '<br/>XML total time taken: '.($after-$before);
echo '<br/>XML average time per object: '.($after-$before)/$i;

echo '<br/><br/><b>Milliseconds</b>';
echo '<br/>XML total time taken: '.($after-$before) * 1000;
echo '<br/>XML average time per object: '.($after-$before)/$i * 1000;

$before = microtime(true);
for ($i=0 ; $i<10000; $i++) {
    json_decode($json);
}

$after = microtime(true);
echo '<br/>';
echo '<br/><b>Seconds</b>';
echo '<br/>JSON total time taken: '.($after-$before);
echo '<br/>JSON average time per object: '.($after-$before)/$i;

echo '<br/><br/><b>Milliseconds</b>';
echo '<br/>JSON total time taken: '.($after-$before) * 1000;
echo '<br/>JSON average time per object: '.($after-$before)/$i * 1000;

//100,000 REQUESTS

echo '<hr>';
echo '<h2>Sample data at 100,000 requests</h2>';

$before = microtime(true);

for ($i=0 ; $i<100000; $i++) {
    simplexml_load_string($xml);
}

$after = microtime(true);
echo '<br/>';
echo '<br/><b>Seconds</b>';
echo '<br/>XML total time taken: '.($after-$before);
echo '<br/>XML average time per object: '.($after-$before)/$i;

echo '<br/><br/><b>Milliseconds</b>';
echo '<br/>XML total time taken: '.($after-$before) * 1000;
echo '<br/>XML average time per object: '.($after-$before)/$i * 1000;

$before = microtime(true);
for ($i=0 ; $i<100000; $i++) {
    json_decode($json);
}

$after = microtime(true);
echo '<br/>';
echo '<br/><b>Seconds</b>';
echo '<br/>JSON total time taken: '.($after-$before);
echo '<br/>JSON average time per object: '.($after-$before)/$i;

echo '<br/><br/><b>Milliseconds</b>';
echo '<br/>JSON total time taken: '.($after-$before) * 1000;
echo '<br/>JSON average time per object: '.($after-$before)/$i * 1000;

//500,000 REQUESTS

//echo '<hr>';
//echo '<h2>Sample data at 500,000 requests</h2>';
//
//$before = microtime(true);
//
//for ($i=0 ; $i<500000; $i++) {
//    simplexml_load_string($xml);
//}
//
//$after = microtime(true);
//echo '<br/>';
//echo '<br/><b>Seconds</b>';
//echo '<br/>XML total time taken: '.($after-$before);
//echo '<br/>XML average time per object: '.($after-$before)/$i;
//
//echo '<br/><br/><b>Milliseconds</b>';
//echo '<br/>XML total time taken: '.($after-$before) * 1000;
//echo '<br/>XML average time per object: '.($after-$before)/$i * 1000;
//
//$before = microtime(true);
//for ($i=0 ; $i<500000; $i++) {
//    json_decode($json);
//}
//
//$after = microtime(true);
//echo '<br/>';
//echo '<br/><b>Seconds</b>';
//echo '<br/>JSON total time taken: '.($after-$before);
//echo '<br/>JSON average time per object: '.($after-$before)/$i;
//
//echo '<br/><br/><b>Milliseconds</b>';
//echo '<br/>JSON total time taken: '.($after-$before) * 1000;
//echo '<br/>JSON average time per object: '.($after-$before)/$i * 1000;

//1,000,000 REQUESTS

//echo '<hr>';
//echo '<h2>Sample data at 1,000,000 requests</h2>';
//
//$before = microtime(true);
//
//for ($i=0 ; $i<1000000; $i++) {
//    simplexml_load_string($xml);
//}
//
//$after = microtime(true);
//echo '<br/>';
//echo '<br/><b>Seconds</b>';
//echo '<br/>XML total time taken: '.($after-$before);
//echo '<br/>XML average time per object: '.($after-$before)/$i;
//
//echo '<br/><br/><b>Milliseconds</b>';
//echo '<br/>XML total time taken: '.($after-$before) * 1000;
//echo '<br/>XML average time per object: '.($after-$before)/$i * 1000;
//
//$before = microtime(true);
//for ($i=0 ; $i<1000000; $i++) {
//    json_decode($json);
//}
//
//$after = microtime(true);
//echo '<br/>';
//echo '<br/><b>Seconds</b>';
//echo '<br/>JSON total time taken: '.($after-$before);
//echo '<br/>JSON average time per object: '.($after-$before)/$i;
//
//echo '<br/><br/><b>Milliseconds</b>';
//echo '<br/>JSON total time taken: '.($after-$before) * 1000;
//echo '<br/>JSON average time per object: '.($after-$before)/$i * 1000;


?>