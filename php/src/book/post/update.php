<?php
include("./../../chckFnctns/chckFnctns.php");
include("./../functions/functions.php");
$content = file_get_contents('php://input');
$data = json_decode($content, true);

$idCheck = strval($data['isbn']);
$tab = "Book";

$sql = buildsUpdateAndattributs($tab, $data);
//echo $sql;
unset($data['isbn']);
$params = buildParams($data);
//print_r($params);
if (execRequestUpdate($sql, $params)) {
    header('Content-type: Application/json');
    echo json_encode(execRequest("SELECT * FROM ".$tab." WHERE isbn =?", [$idCheck]));
} else {
    http_response_code(400);
}
