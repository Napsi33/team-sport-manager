<?php
session_start();
include "auth.php";
include "header.php";
?>
<h2>New member</h2>
<form method="POST" action="members_create.php">
   <label for="name">Name</label><br />
   <input type="text" id="name" name="name" /><br />

   <label for="nationality">Nationality</label><br />
   <input type="text" id="nationality" name="nationality" /><br />

   <label for="birth">Date of birth</label><br />
   <input type="date" id="birth" name="birth" /><br />

   <label for="position">Position</label><br />
   <input type="text" id="position" name="position" /><br />

   <label for="team">Team</label><br />
   <input type="text" id="team" name="team_id" /><br />

   <input type="submit" value="save" />
</form>
<?php include "footer.php"; ?>
