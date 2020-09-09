<?php
include_once '../Resource/functions.php';
include_once '../Resource/connection.php';
$placeID = $_POST['id'];

$placeName = preg_replace('/\s+/', ' ', $_POST['name']);
$placeName = trim($placeName);

$bedroom = $_POST['bedroom'];
$washroom = $_POST['washroom'];
$guest = $_POST['guests'];
$entirePlace = $_POST['entirePlace'];

$address = trim($_POST['address']);

$price = $_POST['price'];

if (empty($placeID)) {
    header('location: ../hosthome.php');
    exit();
} else {
    $query = "update listing SET name =?, bedrooms=?, washrooms=?, guests=?, entire_house=?, address=?, price=? WHERE id=?";

    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $query)) {
        mysqli_stmt_bind_param($statement, "siiiisdi",
            $placeName, $bedroom, $washroom, $guest,
            $entirePlace, $address, $price, $placeID);
        mysqli_stmt_execute($statement);
    }
}
mysqli_close($conn);
header('location: ../hosthome.php');