<?php
function connect_db() {
    $servername = "localhost";
    $username = "teamsport";
    $password = "teamsport";
    $dbname = "teamsportmanager";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}