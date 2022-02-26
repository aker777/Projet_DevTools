<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user password
$pass = 'MYSQL_PASSWORD';

// check the MySQL connection status

$conn = new PDO("mysql:host=$host;port=3306;dbname=MYSQL_DATABASE", $user, $pass); 

try {
    $conn = new PDO("mysql:host=$host;port=3306;dbname=MYSQL_DATABASE", $user, $pass);  
} catch (PDOException $e) {
    // bad connection
    echo 'error '. $e;
}

$q = 'SELECT * FROM employees';
$req = $conn->query($q);
$result = $req->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);