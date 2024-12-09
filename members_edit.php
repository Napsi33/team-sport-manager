<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT * from members WHERE id = ?");
$stmt->execute([$_GET["member_id"]]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);

$conn = connect_db();
$stmt_teams = $conn->prepare("SELECT * from teams");
$stmt_teams->execute();
$teams = $stmt_teams->fetchAll();

include "header.php";
?>
<h2>Edit member</h2>
<form method="POST" action="members_update.php">
   <input type="hidden" id="member_id" name="member_id" value="<?php echo $member['id'] ?>" />

   <label for="name">Name</label><br />
   <input type="text" id="name" name="name" value="<?php echo $member['name'] ?>" /><br />

   <label for="nationality">Nationality</label><br />
   <input type="text" id="nationality" name="nationality" value="<?php echo $member['nationality'] ?>" /><br />

   <label for="date_of_birth">Date of birth</label><br />
   <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $member['date_of_birth'] ?>" /><br />

   <label for="position">Position</label><br />
   <input type="text" id="position" name="position" name="position" value="<?php echo $member['position'] ?>" /><br />

   <label for="team">Team</label><br />
   <select id="team_id" name="team_id" >
     <?php
     foreach($teams as $team) {
          echo '<option value="'. $team['id'].'" ' . ($member['team_id'] == $team['id'] ? 'selected' : '') . '>' . $team['name'] . '</option>';
     }
     ?>
   </select><br />

   <input type="submit" value="update" />
</form>
<?php include "footer.php"; ?>
