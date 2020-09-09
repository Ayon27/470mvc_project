<?php
include_once '../Resource/connection.php';

session_start();

$userID = $_SESSION['id'];
$placeID = $_POST['placeID'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];

if (empty($placeID) || empty($checkIn) || empty($checkOut)) {
    header('location: ../home.php');
    exit();
} else {
    $query = "INSERT INTO booking (check_in, check_out, user_id, listing_id) values (?, ?, ?, ?);";

    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $query)) {
        mysqli_stmt_bind_param($statement, "ssii", $checkIn, $checkOut, $userID, $placeID);
        mysqli_stmt_execute($statement);
    }
    mysqli_close($conn);
    header('location: ../guestProfile.php');
}

