<?php
session_start();
include 'auth.php';
include "database.php";

$username = $_POST["username"];
$password = $_POST["password"];

if (!empty($username) && !empty($password)) {
    $conn = connect_db();
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([
        $username,
        md5($password),
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
    if($user) {
        $_SESSION["username"] = $username;
        $_SESSION["loggedin"] = true;
        header("Location: index.php");

    } else {
        header("Location: login.php");
    }

} else {
    header("Location: login.php");

}
