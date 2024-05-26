<?php
require_once __DIR__ . "/partials/function.php";
// get data to file json
$list_php = get_data();

// add or remove like function
$list_php = change_id($list_php);

// refresh data in file json
put_data($list_php);

// create copy to list_phh "array_filtered" to show on page
$list_filtered = $list_php;

// filter only like disk
$list_filtered = only_liked($list_filtered);

//  transform to json string
$json_string = prepare_response($list_filtered);

// creates the information regarding the http response
header("Content-Type: application/json");

// sent response
echo $json_string;

