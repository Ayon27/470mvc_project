<?php

namespace App\Models;

use mysqli;

class connectionController
{

    public $username = "root";
    public $server = "localhost";
    public $password = "";
    public $db = "391project";
    private static $conn;

    function __construct($username, $server, $password, $db)
    {
        $this->username = $username;
        $this->server = $server;
        $this->password = $password;
        $this->db = $db;
    }

    public function initiateConnection()
    {
        if (connectionController::$conn == null) {
            connectionController::$conn = new mysqli($this->server, $this->username, $this->password, $this->db);

            if (connectionController::$conn->connect_errno) {
                echo "Failed to connect to MySQL: " . connectionController::$conn->connect_error;
                return false;
            } else {
                echo "Connection Successful";
                return true;
            }
        } else return false;
    }

    public function closeConnection()
    {
        connectionController::$conn->close();
    }
}