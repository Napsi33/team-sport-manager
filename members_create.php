<?php
session_start();
include 'database.php';
include "auth.php";

$conn = connect_db();

$stmt = $conn->prepare("INSERT INTO members (name, nationality, date_of_birth, position, team_id) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$_POST['name'], $_POST['nationality'], $_POST['date_of_birth'], $_POST['position'], $_POST['team_id']]);

header('Location: members.php');
?>