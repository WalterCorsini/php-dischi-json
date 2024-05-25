<?php

// get data to file json
$list_dischi_json = file_get_contents("dischi.json");

// vconvert data to use in php
$list_php = json_decode($list_dischi_json, true);

// add or remove like function
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $list_php[$id]["like"] = !$list_php[$id]["like"];
}

// refresh data in file json
file_put_contents("dischi.json", json_encode($list_php));

// create copy to list_phh "array_filtered" to show on page
$list_filtered = $list_php;

// filter only like disk
if (isset($_POST["action"])) {
    $list_filtered = array_filter($list_filtered, function ($list_filtered) {
        return $list_filtered["like"] === true;
    });
}

// save new result in array
$array = [
    "results" => $list_filtered
];

//  transform to json string
$json_string = json_encode($array);

// creates the information regarding the http response
header("Content-Type: application/json");

// sent response
echo $json_string;
