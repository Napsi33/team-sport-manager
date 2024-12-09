<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("DELETE FROM members WHERE id = ?");
$stmt->execute([
    $_GET["member_id"],
]);

header("Location: members.php");