<?php

class DBConnection {

public $username = "root";
public $server = "localhost";
public $password = "";
public $db = "391project";

function __construct($username, $server, $password, $db){
    $this->username = $username;
    $this->server = $server;
    $this->password = $password;
    $this->db = $db;
}
public function initiateConnection()
{
    $conn = mysqli_connect($this->server, $this->username, $this->password, $this->db);
    if (!$conn) {
        echo "Connection to database failed" . mysqli_connect_error();;
    }
}
}