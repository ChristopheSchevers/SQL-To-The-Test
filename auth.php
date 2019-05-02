<?php
session_start();

include('header.php');

// Register
if(isset($_POST['register'])){
    try{
    $username = $_POST['username'];
    $firstname = $_POST['fName'];
    $lastname = $_POST['lName'];
    $usermail = $_POST['email'];
    $userpw = $_POST['password'];
    $confirmPw = $_POST['confirmPass'];
    
    if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($usermail) && !empty($userpw) && $userpw == $confirmPw){
        $data = [
            'username'      => $username,
            'fname'         => $firstname,
            'lname'         => $lastname,
            'user_email'    => $usermail,
            'passw'         => password_hash($userpw, PASSWORD_DEFAULT)
        ];
        
        $sql = "INSERT INTO users(username,fname,lname,user_email,passw) VALUES (:username, :fname, :lname, :user_email, :passw)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    
        $count = $stmt->rowCount();
        if($count > 0) {
            $_SESSION['fname'] = $firstname;
            header('locaction: home.php');
        }
    
    } else {
        $message = "Please fill in all the fields";
    }
    
    }
    catch(PDOException $e){
        echo "Error occurred: ". $e->getMessage();
        die();
    }
}

// Login
if(isset($_POST['login'])){
    try {
        $login = !empty($_POST['username']) ? trim($_POST['username']) : null;
        $loginpw = !empty($_POST['password']) ? trim($_POST['password']) : null;

        $loginSql = "SELECT * FROM users WHERE username = :username";
        $loginStmt = $pdo->prepare($loginSql);
        $loginStmt->bindParam(':username', $login);
        $loginStmt->execute();

        $user = $loginStmt->fetch(PDO::FETCH_ASSOC);

        if($user === false){
            die($message = 'Username and/or password not correct!');
        } else {
            if(password_verify($loginpw, $user['passw'])){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['logged_in'] = time();
                
                header('Location: home.php');
                exit;
            } else {
                die($message = 'Username and/or password not correct!');
            }
        }
    }
    catch(PDOException $e){
        die('Error: '. $e->getMessage());
    }
}
?>