<?php
include_once '../Resource/connection.php';
$placeID = $_GET['id'];

$query = "DELETE from listing where id=?";
$statement = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($statement, $query)) {
    mysqli_stmt_bind_param($statement, "i", $placeID);
    mysqli_stmt_execute($statement);
}
mysqli_close($conn);
header('location: ../hosthome.php');

