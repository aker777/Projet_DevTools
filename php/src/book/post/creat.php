<?php
include("./../../chckFnctns/chckFnctns.php");
include("./../functions/functions.php");
$content = file_get_contents('php://input');
$data = json_decode($content, true);
getBookIsbn(strval($data["isbn"]));
insertBill(
    "Book",
    $data["isbn"],
    $data["title"],
    $data["author"],
    $data["overview"]);