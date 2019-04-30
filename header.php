<?php
$servername = "localhost";
$db = "sql_ex";
$dbUser = "root";
$dbPassword = "root";

try{
    $pdo = new PDO("mysql:host=$servername; dbname=$db; charset=utf8", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
    die();
}
?>