<?php include "header.php"; ?>
<h2>New match</h2>
<form>
   <label for="home_team">Home team</label><br />
   <select id="home_team" name="home_team" >
        <option value='1'>OTP Pick Szeged</option>
   </select><br />

   <label for="away_team">Away team</label><br />
   <select id="away_team" name="away_team" >
        <option value='1'>OTP Pick Szeged</option>
   </select><br />

   <label for="home_goals">Home team goals</label><br />
   <input type="number" id="home_goals" name="home_goals" /><br />

   <label for="away_goals">Away team goals</label><br />
   <input type="number" id="away_goals" name="away_goals" /><br />

   <label for="venue">Venue</label><br />
   <input type="text" id="venue" name="venue" /><br />

   <label for="date">Date</label><br />
   <input type="date" id="date" name="date" /><br />

   <input type="submit" value="save" />
</form>
<?php include "footer.php"; ?>