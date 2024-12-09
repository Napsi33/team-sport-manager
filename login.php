<?php
session_start();
include "header.php";
?>
<h2>Login</h2>
<form method="POST" action="login_create.php">
   <label for="username">Username</label><br />
   <input type="text" id="username" name="username" /><br />

   <label for="password">Password</label><br />
   <input type="password" id="password" name="password" /><br />

   <input type="submit" value="save" />
</form>
<?php include "footer.php"; ?>