<?php
session_start();
include "database.php";

$username = $_POST["username"];
$name = $_POST["name"];
$password = $_POST["password"];
$password_confirmation = $_POST["password_confirmation"];

if (!empty($username) && !empty($name) && !empty($password) && !empty($password_confirmation) && $password == $password_confirmation) {
    $conn = connect_db();
    
    $stmt = $conn->prepare("INSERT INTO users (username, name, password) VALUES (?, ?, ?)");
    $stmt->execute([
        $username,
        $name,
        md5($password),
    ]);
    header("Location: login.php");
} else {
    header("Location: registration.php");
}
