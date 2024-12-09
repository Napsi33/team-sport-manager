<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("DELETE FROM teams WHERE id = ?");
$stmt->execute([
    $_GET["team_id"],
]);

header("Location: teams.php");