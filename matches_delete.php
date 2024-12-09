<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("DELETE FROM matches WHERE id = ?");
$stmt->execute([
   $_GET["match_id"],
]);

header("Location: matches.php");