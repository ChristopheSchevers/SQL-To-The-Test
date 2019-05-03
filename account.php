<?php
session_start();

include('header.php');

if(isset($_POST['update']) && !empty($_POST)){
    try{
        $id = $_SESSION['user_id'];
        $username = $_POST['username'];
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $email = $_POST['email'];

        $data = [
            'id'        => $id,
            'username'  => $username,
            'fname'     => $fname,
            'lname'     => $lname,
            'email'     => $email
        ];

        $sql = "UPDATE users SET username = :username, fname = :fname, lname = :lname, user_email = :email WHERE id = :id";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

        $_SESSION['msg'] = "Account updated";
        header('location: home.php');
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
    <title>Account</title>
</head>
<body>
<div class="container col-8 offset-2 my-5">
        <div class="card d-flex justify-content-center align-items-center">
            <h2 class="card-title mt-4">Update account</h2>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group col-6 pl-0 my-3">
                        <label for="username">Username</label>
                        <input class="form-control p-2" type="text" name="username" placeholder="Enter username" value="<?php echo $_SESSION['username']; ?>" required>
                    </div>
                    <div class="row">
                        <div class="form-group col my-3">
                            <label for="fName">First name</label>
                            <input class="form-control p-2" type="text" name="fName" placeholder="Enter first name" value="<?php echo $_SESSION['fname']; ?>" required>
                        </div>
                        <div class="form-group col my-3">
                            <label for="lName">Last name</label>
                            <input class="form-control p-2" type="text" name="lName" placeholder="Enter last name" value="<?php echo $_SESSION['lname']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group my-4">
                        <label for="email">Email</label>
                        <input class="form-control p-2" type="email" name="email" placeholder="Enter email address" value="<?php echo $_SESSION['email']; ?>" required>
                    </div>                    
                    <p>
                        <?php echo $_SESSION['msg']; ?>
                    </p>
                    <div class="form-group text-center my-5">
                        <button class="btn btn-success" type="submit" name="update">Update</button>
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