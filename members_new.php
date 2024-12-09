<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();
$stmt = $conn->prepare("SELECT * from teams");
$stmt->execute();
$teams = $stmt->fetchAll();

include "header.php";
?>
<h2>New member</h2>
<form method="POST" action="members_create.php">
   <label for="name">Name</label><br />
   <input type="text" id="name" name="name" /><br />

   <label for="nationality">Nationality</label><br />
   <input type="text" id="nationality" name="nationality" /><br />

   <label for="date_of_birth">Date of birth</label><br />
   <input type="date" id="date_of_birth" name="date_of_birth" /><br />

   <label for="position">Position</label><br />
   <input type="text" id="position" name="position" /><br />

   <label for="team">Team</label><br />
   <select id="team_id" name="team_id" >
     <?php
     foreach($teams as $team) {
          echo '<option value="'. $team['id'].'">' . $team['name'] . '</option>';
     }
     ?>
   </select><br />

   <input type="submit" value="save" />
</form>
<?php include "footer.php"; ?>
