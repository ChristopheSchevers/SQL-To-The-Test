<?php
session_start();

include('header.php');

try{
// Register


// Log in


}
catch(PDOException $e){
    echo "Error occurred: ". $e->getMessage();
    die();
}
?>