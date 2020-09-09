<?php
include_once '../Resource/functions.php';
include_once '../Resource/connection.php';
session_start();
$_SESSION['nameErr'];
$_SESSION['countryErr'];
$_SESSION['stateErr'];


$placeName = preg_replace('/\s+/', ' ', $_POST['name']);
$placeName = trim($placeName);

$bedroom = $_POST['bedroom'];
$washroom = $_POST['washroom'];
$guest = $_POST['guests'];
$entirePlace = $_POST['entirePlace'];
$has_gym = $_POST['has_gym'];
$has_pool = $_POST['has_pool'];

$country = preg_replace('/\s+/', ' ', $_POST['country']);
$country = trim($country);

$state = preg_replace('/\s+/', ' ', $_POST['state']);
$state = trim($state);

$address = trim($_POST['address']);
$price = $_POST['price'];

$continue = true;
if (!checkName($placeName)) {
    $_SESSION['nameErr'] = "Name must be alphabetic only";
    $continue = false;
}

if (!checkName($country)) {
    $_SESSION['countryErr'] = "Country must be alphabetic only";
    $continue = false;
}

if (!checkName($state)) {
    $_SESSION['stateErr'] = "State must be alphabetic only";
    $continue = false;
}

if ($continue) {
    $userID = $_SESSION['hostid'];
    $userName = $_SESSION['name'];

    $query = "insert into listing 
(host_id, name, bedrooms, washrooms, guests, entire_house, has_pool, has_gym, country, state, address, price, hostName)
 values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $query)) {
        mysqli_stmt_bind_param($statement, "isiiiiiisssds",
            $userID, $placeName, $bedroom, $washroom, $guest,
            $entirePlace, $has_gym, $has_pool, $country, $state, $address, $price, $userName);
        mysqli_stmt_execute($statement);
    }
    mysqli_close($conn);
    header('location: ../lessImportant/placeAdded.php');
}
