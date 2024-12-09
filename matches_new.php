<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();
$stmt = $conn->prepare("SELECT * from teams");
$stmt->execute();
$teams = $stmt->fetchAll();

include "header.php"; ?>
<h2>New match</h2>
<form method="POST" action="matches_create.php">
   <label for="team_home_id">Home team</label><br />
   <select id="team_home_id" name="team_home_id" >
     <?php
     foreach($teams as $team) {
          echo '<option value="'. $team['id'].'">' . $team['name'] . '</option>';
     }
     ?>
   </select><br />

   <label for="team_away_id">Away team</label><br />
   <select id="team_away_id" name="team_away_id" >
     <?php
          foreach($teams as $team) {
               echo '<option value="'. $team['id'].'">' . $team['name'] . '</option>';
          }
     ?>
   </select><br />

   <label for="team_home_goals">Home team goals</label><br />
   <input type="number" id="team_home_goals" name="team_home_goals" /><br />

   <label for="team_away_goals">Away team goals</label><br />
   <input type="number" id="team_away_goals" name="team_away_goals" /><br />

   <label for="venue">Venue</label><br />
   <input type="text" id="venue" name="venue" /><br />

   <label for="date">Date</label><br />
   <input type="date" id="date" name="date" /><br />

   <input type="submit" value="save" />
</form>
<?php include "footer.php"; ?>