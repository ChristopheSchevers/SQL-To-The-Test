<?php
session_start();

if(isset($_SESSION['user_id'])){
    header("location: /");
}

include('header.php');

$message = '';

$username = $_POST['username'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$usermail = $_POST['user_email'];
$userpw = $_POST['passw'];

if(!empty($_POST['username']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['user_email']) && !empty($_POST['passw'])){
    $data = [
        $username   => 'username',
        $firstname  => 'fname',
        $lastname   => 'lname',
        $usermail   => 'user_email',
        $userpw     => 'passw'
    ];
    
    $sql = "INSERT INTO users(username,fname,lname,user_email,passw) VALUES (:username, :fname, :lname, :user_email, :passw)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    if($stmt->execute()):
        $message = 'Successfully created new user';
    else :
        $message = 'Error creating new user';
    endif;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container col-8 offset-2 my-5">
        <div class="card d-flex justify-content-center align-items-center">
            <h2 class="card-title mt-4">Register</h2>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group col-6 pl-0 my-3">
                        <label for="username">Username</label>
                        <input class="form-control p-2" type="text" name="username" placeholder="Enter username" required>
                    </div>
                    <div class="row">
                        <div class="form-group col my-3">
                            <label for="fName">First name</label>
                            <input class="form-control p-2" type="text" name="fName" placeholder="Enter first name" required>
                        </div>
                        <div class="form-group col my-3">
                            <label for="lName">Last name</label>
                            <input class="form-control p-2" type="text" name="lName" placeholder="Enter last name" required>
                        </div>
                    </div>
                    <div class="form-group my-4">
                        <label for="email">Email</label>
                        <input class="form-control p-2" type="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Password</label>
                        <input class="form-control p-2" type="password" name="password" placeholder="Enter password" minlength="4" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="confirmPass">Confirm Password</label>
                        <input class="form-control p-2" type="password" name="confirmPass" placeholder="Repeat password" minlength="4" required>
                    </div>
                    <div class="form-group text-center my-5">
                        <button class="btn btn-success" type="submit" name="login-btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>