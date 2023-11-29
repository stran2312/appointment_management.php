<?php
function getDBConnection() {
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "appointments";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>