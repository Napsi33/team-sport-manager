<?php
session_start();
include "auth.php";
include 'database.php';

$conn = connect_db();

$stmt = $conn->prepare("INSERT INTO teams (name, city, year_of_foundation) VALUES (?, ?, ?)");
$stmt->execute([$_POST['name'], $_POST['city'], $_POST['year_of_foundation']]);

header('Location: teams.php');
?>