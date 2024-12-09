<?php
session_start();
include "header.php";
?>
<h2>Registration</h2>
<form method="POST" action="registration_create.php">
   <label for="name">Name</label><br />
   <input type="text" id="name" name="name" /><br />

   <label for="username">Username</label><br />
   <input type="text" id="username" name="username" /><br />

   <label for="password">Password</label><br />
   <input type="password" id="password" name="password" /><br />

   <label for="password_confirmation">Password confirmation</label><br />
   <input type="password" id="password_confirmation" name="password_confirmation" /><br />

   <input type="submit" value="save" />
</form>
<?php include "footer.php"; ?>