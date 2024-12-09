<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("UPDATE teams SET name = ?, city = ?, year_of_foundation = ? WHERE id = ?");
$stmt->execute([
    $_POST["name"],
    $_POST["city"],
    $_POST["year_of_foundation"],
    $_POST["team_id"],
]);

header("Location: teams.php");