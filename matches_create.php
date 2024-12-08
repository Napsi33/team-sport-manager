<?php

include 'database.php';

$conn = connect_db();

$stmt = $conn->prepare("INSERT INTO matches (team_home_id, team_away_id, team_home_goals, team_away_goals, venue, date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$_POST['home_team'], $_POST['away_team'], $_POST['home_goals'], $_POST['away_goals'], $_POST['venue'], $_POST['date']]);

header('Location: matches.php');
?>