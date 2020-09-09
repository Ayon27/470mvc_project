<?php
include_once 'Resource/connection.php';
include_once 'Resource/functions.php';

session_start();
global $invalidLoginMsg;

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    $query = "SELECT * from guest WHERE email = '$email';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);



    if (mysqli_num_rows($result) == 1) {
        $checkPass = $row['pass'];
        if (password_verify($pass, $checkPass)) {

            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['userid'] = $row['id'];
            mysqli_close($conn);
            header('location: home.php');
        } else {
            $invalidLoginMsg = "Invalid username/password";
            mysqli_close($conn);
        }
    } else {
        $invalidLoginMsg = "Invalid username/password";
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container">
        <a style="text-decoration: none; color: black; font-size: 16px; border-bottom: 1px solid grey" href="index.php">Home</a></span>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span
                    class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto"></ul>
                <span class="navbar-text actions">
                <a class="login"
                   href="guestlogin.php">Log In</a>
                    <a class="btn btn-light action-button" role="button" href="guestSignUp.php">Sign Up</a></span>
            </div>
        </div>
    </nav>
</div>
<div></div>

<div class="login-clean">
    <form method="post" action="">
        <h2 class="text-center">Log In</h2>
        <div class="illustration"></div>
        <div class="form-group">
        <p class="text-center text-danger" name="error"><?php echo $invalidLoginMsg ?></p>
            <input class="form-control" type="email" name="email" placeholder="Email" required maxlength="40"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"
                                       required maxlength="15">
        </div>
        <div class="form-group">
            <input class="btn btn-primary btn-block" type="submit" value="Log In" name="submit"></input>
        </div>
        <a
    </form>
</div>
<div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>