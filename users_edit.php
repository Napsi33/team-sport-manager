<?php
session_start(); 
include "auth.php";
include "header.php";
?>
<h2>Edit user</h2>
<form>
   <label for="username">Username</label><br />
   <input type="text" id="username" name="username" /><br />

   <label for="name">Name</label><br />
   <input type="text" id="name" name="name" /><br />

   <input type="submit" value="save" />
</form>
<?php include "footer.php"; ?>