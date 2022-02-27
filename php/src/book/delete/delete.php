<?php
include("./../../chckFnctns/chckFnctns.php");
include("./../functions/functions.php");
if(isset($_GET)) {
    $isbn = strval($_GET['isbn']);
    $sql = buildsDelete("Book", $isbn);
    $params = array($isbn);
    if (execRequestDelete($sql, $params)) {
        header('Content-type: Application/json');
        echo json_encode(["success" => 1]);
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(500);
}
