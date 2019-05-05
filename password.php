<?php
session_start();

include('header.php');

if(isset($_POST['passw-update']) && !empty($_POST)){
    try{
        $id = $_SESSION['user_id'];
        $oldpw = $_POST['oldpw'];
        $newpw = $_POST['newpw'];
        $confirmpw = $_POST['confirm-newpw'];
        $dbpw = $_SESSION['pw'];

        if(!empty($newpw) && !empty($confirmpw) && password_verify($oldpw, $dbpw)){
            if($newpw == $confirmpw){
                $data = [
                    'id'        => $id,
                    'passw'  => password_hash($newpw, PASSWORD_DEFAULT)
                ];

                $sql = "UPDATE users SET passw = :passw WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($data);
            } else {
                $_SESSION['msg'] = "You didn't confirm your new password correctly.";
            }
        } else {
            $_SESSION['msg'] = "The current password you entered appears to be incorrect.";
        }
    }
    catch(PDOException $e){
        die("Error: ".$e->getMessage());
    }
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
    <title>Password</title>
</head>
<body>
<div class="container col-8 offset-2 my-5">
        <div class="card d-flex justify-content-center align-items-center">
            <h2 class="card-title mt-4">Update password</h2>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group mt-4">
                        <label for="oldpw">Please fill in old password</label>
                        <input class="form-control p-2" type="password" name="oldpw" placeholder="Enter old password" minlength="4" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="newpw">New password</label>
                        <input class="form-control p-2" type="password" name="newpw" placeholder="Enter new password" minlength="4" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="confirm-newpw">Confirm new password</label>
                        <input class="form-control p-2" type="password" name="confirm-newpw" placeholder="Repeat new password" minlength="4" required>
                    </div>  
                    <div class="alert alert-warning">
                        <?php 
                        echo $_SESSION['msg']; 
                        unset($_SESSION['msg']);
                        ?>
                    </div>
                    <div class="form-group text-center my-5">
                        <button class="btn btn-success" type="submit" name="passw-update">Enter</button>
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