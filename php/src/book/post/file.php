<?php
include("./../../chckFnctns/chckFnctns.php");
include("./../functions/functions.php");
if(isset($_POST["isbn"])) {
    $isbn = $_POST["isbn"]; 
}
    

if(!empty($_FILES['file'] ?? null)) {
    $acceptable = [
        'image/jpeg',
        'image/jpg',
        'image/png'
    ];

    if(!in_array( $_FILES['file']['type'], $acceptable ) ) { 
        header("Content-Type: application/json");
        echo json_encode(["message"=> "invalide file"]);
        exit(1);
    }

    $maxsize = 1024 * 1024; 
    if($_FILES['file']['size'] > $maxsize) { // 1Mo  //check file weight
        header("Content-Type: application/json");
        echo json_encode(["message"=> "file is too heavy"]);
        exit(1);
    }

    $img = file_get_contents($_FILES['file']['tmp_name']);

    $sql = "UPDATE Book SET picture = LOAD_FILE(?) where isbn = ?";
    

    if(execRequestUpdate($sql, [$img, $isbn]) == 1) {
        header("Content-Type: application/json");
        echo json_encode(["message"=> "img uploaded succefully"]);
    }
    
}
