<?php
function get_data() {
    $list = file_get_contents("dischi.json"); // string
    return json_decode($list, true); // array
  };

function change_id($list){
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $list[$id]["like"] = !$list[$id]["like"];
    }
    return $list;
};

function put_data($list){
    file_put_contents("dischi.json", json_encode($list));
};

function only_liked($list){
    if (isset($_POST["action"])) {
        $list = array_filter($list, function ($list) {
            return $list["like"] == $_POST["action"];
        });
    }
    return $list;
};

function prepare_response($list){
    // save new result in array
$array = [
    "results" => $list
];
$json_string = json_encode($array);
return $json_string;
}
?>