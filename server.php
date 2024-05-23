<?php
// ottengo i file dal file json
$list_dischi_json = file_get_contents("dischi.json");

// converto per utilizzare in php
$list_php = json_decode($list_dischi_json, true);


// aggiungo variabile like per ogni disco in lista che non ha la variabile like

if(isset($_POST['id'])){
    foreach($list_php as $key => $cur_card){
        if($key === $_POST['id']){
            $cur_card['like'] = $like;
        }
    }

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
