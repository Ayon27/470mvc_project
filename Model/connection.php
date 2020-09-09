<?php
$username = "root";
$server = "localhost";
$password = "";
$db = "391project";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    echo "Connection to database failed" . mysqli_connect_error();;
}
