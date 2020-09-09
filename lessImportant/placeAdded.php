<?php
session_start();
unset($_SESSION['nameErr']);
unset($_SESSION['countryErr']);
unset($_SESSION['stateErr']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Successful</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
<?php header('Refresh: 1.5; URL=../hostHome.php');?>
<div class="highlight-clean">
    <div class="container" style="margin-top: 100px">
        <div class="intro">
            <h2 class="text-center">Congratulations!</h2>
            <p class="text-center">Your place Has Been Successfully Added!</p>
        </div>
        <div class="buttons"><a class="btn btn-primary" role="button" href="../hostHome.php">Back to My Listings</a></div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

