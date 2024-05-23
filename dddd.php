
<?php 
// ottengo i file dal file json
$list_dischi_json = file_get_contents("dischi.json");

// converto per utilizzare in php
$list_php = json_decode($list_dischi_json, true);

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
?>