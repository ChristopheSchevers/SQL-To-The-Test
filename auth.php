<?php
session_start();

include('header.php');

try{
// Register
$message = '';

$username = $_POST['username'];
$firstname = $_POST['fName'];
$lastname = $_POST['lName'];
$usermail = $_POST['email'];
$userpw = $_POST['password'];

if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($usermail) && !empty($userpw)){
    $data = [
        'username'      => $username,
        'fname'         => $firstname,
        'lname'         => $lastname,
        'user_email'    => $usermail,
        'passw'         => sha1($userpw)
    ];
    
    $sql = "INSERT INTO users(username,fname,lname,user_email,passw) VALUES (:username, :fname, :lname, :user_email, :passw)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header('locaction: home.php');
} else {
    $message = "Please fill in all the fields";
}

// Log in


}
catch(PDOException $e){
    echo "Error occurred: ". $e->getMessage();
    die();
}
?>