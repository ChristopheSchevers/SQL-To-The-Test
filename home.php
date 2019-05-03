<?php
session_start();

include('header.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Homepage</title>
    </head>
    <body>
        <div class="container col-8 offset-2 my-5">
            <div class="alert alert-success">
                <?php echo "Welcome, ".$_SESSION['fname']; ?> 
            </div>
            <div class="alert alert-info">
                <?php echo $_SESSION['msg']; ?>
            </div>
            <div class="card d-flex justify-content-center align-items-center">
                <div class="card-body">
                    <a href="profile.php" class="btn btn-primary">View profile</a>
                    <a href="account.php" class="btn btn-primary">Update account</a>
                    <a href="password.php" class="btn btn-primary">Update password</a>
                    <a href="settings.php" class="btn btn-primary">Settings</a>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>