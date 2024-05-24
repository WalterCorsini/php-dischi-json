<?php
// ottengo i file dal file json
$list_dischi_json = file_get_contents("dischi.json");

// converto per utilizzare in php
$list_php = json_decode($list_dischi_json, true);



if(isset($_POST["id"])){
    $id= $_POST["id"];
    $list_php[$id]["like"]= !$list_php[$id]["like"];
}

$list_filtered = $list_php;

if(isset($_POST["action"])){
    $list_filtered = array_filter($list_filtered, function ($list_filtered) {
        return $list_filtered["like"] === true;
    });
}


//  qui devo creare un filtro ma adesso a reult cmq gli passo un aray filtrato
// se c"è il filtro preferiti 
// array filtrato = filtro array list php
// else
//  array filtrato = list_php
// e in result passo array filtrato.
file_put_contents("dischi.json", json_encode($list_php));

// la salvo in un array associativo
$array = [
    "results" => $list_filtered
];

//  trasformo in stringa json
$json_string = json_encode($array);

//  passo il contenuto a javascript
header("Content-Type: application/json");

// gli invio la risposta
echo $json_string;
