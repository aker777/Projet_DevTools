<?php
include("./../functions/functions.php");
include("./../../chckFnctns/chckFnctns.php");
include("./../../listfnctns/listfnctns.php");
if(isset($_GET)) {
    $isbn = $_GET['isbn'];
    unset($_GET['isbn']);
    $sql = buildsSelectAndattributs($_GET, "Book");//listfnctns.php
    $sql .= " WHERE isbn = ?";
    $rows = dataBaseFindOne($sql, strval($isbn)); //db.php
    if($rows == NULL || $rows == NULL ) {
        http_response_code(404);
        header("Content-Type: application/json");
        echo json_encode(["message"=> "book not found invalid isbn"]);
        exit(1);
    }
    $json = json_encode($rows);
    header("Content-Type: application/json");
    print_r($json);
} else {
    http_response_code(500);
}