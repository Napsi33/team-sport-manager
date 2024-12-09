<?php
session_start();
include "auth.php";
include "header.php";
?>
<h2>New team</h2>
<form method="POST" action="teams_create.php">
   <label for="name">Name</label><br />
   <input type="text" id="name" name="name" /><br />

   <label for="city">City</label><br />
   <input type="text" id="city" name="city" /><br />

   <label for="year_of_foundation">Year of foundation</label><br />
   <input type="text" id="year_of_foundation" name="year_of_foundation" /><br />
   
   <input type="submit" value="save" />
</form>
<?php include "footer.php"; ?>
