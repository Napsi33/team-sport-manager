<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT * from teams WHERE id = ?");
$stmt->execute([$_GET["team_id"]]);
$team = $stmt->fetch(PDO::FETCH_ASSOC);

include "header.php";
?>
<h2>Edit team</h2>
<form method="POST" action="teams_update.php">
   <input type="hidden" id="team_id" name="team_id" value="<?php echo $team['id'] ?>" />

   <label for="name">Name</label><br />
   <input type="text" id="name" name="name" value="<?php echo $team['name'] ?>" /><br />

   <label for="city">City</label><br />
   <input type="text" id="city" name="city" value="<?php echo $team['city'] ?>" /><br />

   <label for="year_of_foundation">Year of foundation</label><br />
   <input type="text" id="year_of_foundation" name="year_of_foundation" value="<?php echo $team['year_of_foundation'] ?>" /><br />
   
   <input type="submit" value="update" />
</form>
<?php include "footer.php"; ?>