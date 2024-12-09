<?php
session_start(); 
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT * from users");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

include "header.php"; 
?>

<h2>Users</h2>
<table>
    <thead>
        <tr>
            <td>Username</td>
            <td>Name</td>
            <td>Operations</td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = $stmt->fetch()) {
                echo '
                <tr>
                    <td>' . $row['username'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>
                        <a href="users_edit.php?user_id='. $row['id'] .'">Edit</a> | <a href="users_delete.php?user_id='. $row['id'] .'">Delete</a>
                    </td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
