<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("UPDATE members SET name = ?, nationality = ?, date_of_birth = ?, position = ?, team_id = ? WHERE id = ?");
$stmt->execute([
    $_POST["name"],
    $_POST["nationality"],
    $_POST["date_of_birth"],
    $_POST["position"],
    $_POST["team_id"],
    $_POST["member_id"],
]);

header("Location: members.php");