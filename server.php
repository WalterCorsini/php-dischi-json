<?php

// ottengo i file dal file json
$list_dischi_json = file_get_contents("dischi.json");

// converto per utilizzare in php
$list_php = json_decode($list_dischi_json, true);


// add or remove like function
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $list_php[$id]["like"] = !$list_php[$id]["like"];
}

file_put_contents("dischi.json", json_encode($list_php));

// create array filtered to show on page
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


//  trasformo in stringa json
$json_string = json_encode($array);

//  passo il contenuto a javascript
header("Content-Type: application/json");

// gli invio la risposta
echo $json_string;
