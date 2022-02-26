<?php
include ("./../../utils/db.php");
function insertBill(
    string $tab,
    string $isbn,
    string $title,
    string $author,
    string $overview ) {
    $db = getDataBaseConnection();
    $sql = "INSERT INTO $tab(isbn, title, author, overview, read_count) VALUES (?,?,?,?,?)";
    $params = [
                $isbn,
                $title,
                $author,
                $overview,
                0
            ];
                
    return dataBaseInsert($db,  $sql, $params, $tab);

}


