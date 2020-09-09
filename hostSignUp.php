<?php
include_once 'Resource/connection.php';
include_once 'Resource/functions.php';

global $emailMsg;
global $contactNoMsg;
global $nameMsg;
global $countryMsg;
global $stateMsg;

$continue = true;

if (isset($_POST['submit'])) {
    $name = preg_replace('/\s+/', ' ', $_POST['name']);
    $country = preg_replace('/\s+/', ' ', $_POST['country']);
    $state = preg_replace('/\s+/', ' ', $_POST['state']);
    $address = trim($_POST['address']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    if (!checkName($name)) {
        $nameMsg = "Name must be alphabetic only";
        $continue = false;
    }

    if (!checkName($country)) {
        $countryMsg = "Country must be alphabetic only";
        $continue = false;
    }

    if (!checkName($state)) {
        $stateMsg = "State must be alphabetic only";
        $continue = false;
    }

    if (!checkNumber($phone)) {
        $contactNoMsg = "Invalid phone number";
        $continue = false;
    }

    if (duplicateExists('host', 'email', $email, $conn)) {
        $email = "Email already in use!";
        $continue = false;
    }

    if ($continue) {
        $query = "INSERT INTO host (email, pass, name, country, state, address, phone) values (?, ?, ?, ?, ?, ?, ?);";

        $statement = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($statement, $query)) {
            mysqli_stmt_bind_param($statement, "sssssss", $email, $hashedPass, $name, $country, $state, $address, $phone);
            mysqli_stmt_execute($statement);
        }
        mysqli_close($conn);
        header('location: lessImportant/successful.php');
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SIgn Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div></div>
    <div></div>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container">
                <a style="text-decoration: none; color: black; font-size: 16px; border-bottom: 1px solid grey" href="index.php">Home</a></span>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto"></ul>
                    <span class="navbar-text actions"> <a class="login" href="hostlogin.php">Log In</a><a class="btn btn-light action-button" role="button" href="#">Sign Up</a></span>
                </div>
            </div>
        </nav>
    </div>

    <div class="register-photo">
        <div class="form-container">
            <form method="post" action="" onsubmit="return checkPass()">
                <h2 class="text-center"><strong>Become</strong> a host</h2>

                <div class="form-group">
                    <input required class="form-control" type="text" name="name" placeholder="Full name" pattern="[A-Za-z\s]+" maxlength="40">
                    <p style="text-align : center; color : red"> <?php echo $nameMsg; ?> </p>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Country" name="country" pattern="[A-Za-z\s]+" required maxlength="15">
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="state" placeholder="State" pattern="[A-Za-z\s]+" required maxlength="15">
                </div>

                <div class="form-group">
                    <input required class="form-control" type="text" name="address" placeholder="Street Address" maxlength="95">
                </div>

                <div class="form-group">
                    <input required class="form-control" type="text" name="phone" placeholder="Phone number (without + or any special characters)" pattern="\d+" maxlength="20">
                    <p style="text-align : center; color : red"> <?php echo $contactNoMsg; ?> </p>
                </div>

                <div class="form-group">
                    <input required class="form-control" type="email" name="email" placeholder="Email" maxlength="80">
                    <p style="text-align : center; color : red"> <?php echo $emailMsg; ?> </p>
                </div>

                <div class="form-group">
                    <input required class="form-control" type="password" name="password" placeholder="Password (At least one number and one uppercase and lowercase letter, and of length 8 or more)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="pass" maxlength="15">
                </div>

                <div class="form-group">
                    <input required class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="passRpt" maxlength="15">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary btn-block" type="submit" value="Sign Up" name="submit"></input>
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script type="text/javascript">
    function checkPass() {
        var p1 = document.getElementById("pass").value;
        var p2 = document.getElementById("passRpt").value;

        if (p1 === p2) {
            return true;
        } else {
            document.getElementById("passRpt").style.color = "red";
            document.getElementById("passError").innerHTML = "Passwords do not match!";
            return false;
        }
    }
</script>