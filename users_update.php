<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("UPDATE users SET username = ?, name = ? WHERE id = ?");
$stmt->execute([
    $_POST["username"],
    $_POST["name"],
    $_POST["user_id"],
]);

header("Location: users.php");