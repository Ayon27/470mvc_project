<?php
include_once '../Resource/functions.php';
include_once '../Resource/connection.php';

session_start();
$userID = $_SESSION['userid'];

$name = preg_replace('/\s+/', ' ', $_POST['name']);
$name = trim($name);

if (empty($userID) || empty($name)) {
    header('location: ../home.php');
    exit();
}

$continue = true;
$redir = '';
$table = $_POST['for'];

if ($table == 'guest') {
    $redir = 'location: ../guestProfile.php';
} else {
    $redir = 'location: ../hostProfile.php';
}

$phone = trim($_POST['phone']);
$email = trim($_POST['email']);

$country = preg_replace('/\s+/', ' ', $_POST['country']);
$country = trim($country);

$state = preg_replace('/\s+/', ' ', $_POST['state']);
$state = trim($state);

$address = trim($_POST['address']);

if (duplicateExistsI($table, 'email', $email, $conn, $userID)) {
    $continue = false;
}

if ($continue) {
    $query = "update $table set name = ?, email = ?,  phone = ?, address = ?, state = ?, country = ? where id = ?";
    echo $query;

    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $query)) {
        mysqli_stmt_bind_param($statement, "ssssssi", $name, $email, $phone, $address, $state, $country, $userID);
        mysqli_stmt_execute($statement);
    }
    mysqli_close($conn);
    $_SESSION['name'] = $name;
    header($redir);
} else {
    mysqli_close($conn);
    header($redir);
}

