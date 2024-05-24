<?php
// ottengo i file dal file json
$list_dischi_json = file_get_contents("dischi.json");

// converto per utilizzare in php
$list_php = json_decode($list_dischi_json, true);

if(isset($_POST["id"])){
    $id= $_POST['id'];
    $list_php[$id]['key']= !$list_php[$id]['key'];
}

    file_put_contents("dischi.json", json_encode($list_php));


// la salvo in un array associativo
$array = [
    "results" => $list_php
];

//  trasformo in stringa json
$json_string = json_encode($array);

//  passo il contenuto a javascript
header("Content-Type: application/json");

// gli invio la risposta
echo $json_string;
