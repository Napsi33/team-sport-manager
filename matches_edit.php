<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT * from matches WHERE id = ?");
$stmt->execute([$_GET["match_id"]]);
$match = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt_teams = $conn->prepare("SELECT * from teams");
$stmt_teams->execute();
$teams = $stmt_teams->fetchAll();

include "header.php"; ?>
<h2>Edit match</h2>
<form method="POST" action="matches_update.php">
   <label for="home_team">Home team</label><br />
   <select id="home_team" name="team_home_id" >
     <?php
     foreach($teams as $team) {
          echo '<option value="'. $team['id'].'" ' . ($match['team_home_id'] == $team['id'] ? 'selected' : '') . '>' . $team['name'] . '</option>';
     }
     ?>
   </select><br />

   <label for="away_team">Away team</label><br />
   <select id="away_team" name="team_away_id" >
     <?php
          foreach($teams as $team) {
               echo '<option value="'. $team['id'].'" ' . ($match['team_away_id'] == $team['id'] ? 'selected' : '') . '>' . $team['name'] . '</option>';
          }
     ?>
   </select><br />

   <input type="hidden" id="match_id" name="match_id" value="<?php echo $match['id'] ?>" />


   <label for="team_home_goals">Home team goals</label><br />
   <input type="number" id="team_home_goals" name="team_home_goals" value="<?php echo $match['team_home_goals'] ?>"/><br />

   <label for="team_away_goals">Away team goals</label><br />
   <input type="number" id="team_away_goals" name="team_away_goals" value="<?php echo $match['team_away_goals'] ?>"/><br />

   <label for="venue">Venue</label><br />
   <input type="text" id="venue" name="venue" value="<?php echo $match['venue'] ?>"/><br />

   <label for="date">Date</label><br />
   <input type="date" id="date" name="date" value="<?php echo $match['date'] ?>"/><br />

   <input type="submit" value="update" />
</form>
<?php include "footer.php"; ?>