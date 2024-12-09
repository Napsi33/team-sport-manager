<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([
    $_GET["user_id"],
]);

header("Location: users.php");