<?php
session_start(); 
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT * from users WHERE id = ?");
$stmt->execute([$_GET["user_id"]]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

include "header.php";
?>
<h2>Edit user</h2>
<form method="POST" action="users_update.php">
   <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['id'] ?>" />

   <label for="username">Username</label><br />
   <input type="text" id="username" name="username" value="<?php echo $user['username'] ?>" /><br />

   <label for="name">Name</label><br />
   <input type="text" id="name" name="name" value="<?php echo $user['name'] ?>" /><br />

   <input type="submit" value="update" />
</form>
<?php include "footer.php"; ?>