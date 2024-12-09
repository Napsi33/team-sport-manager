<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("UPDATE matches SET team_home_id = ?, team_away_id = ?, team_home_goals = ?, team_away_goals = ?, venue = ?, date = ? WHERE id = ?");
$stmt->execute([
    $_POST["team_home_id"],
    $_POST["team_away_id"],
    $_POST["team_home_goals"],
    $_POST["team_away_goals"],
    $_POST["venue"],
    $_POST["date"],
    $_POST["match_id"],
]);

header("Location: matches.php");