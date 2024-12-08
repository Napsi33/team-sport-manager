<?php 
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT * from users");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

include "header.php"; 
?>

<h2>Users</h2>
<p class="new-item-wrapper">
    <a href="users_new.php">New user</a>
</p>
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
                        <a>Edit</a> | <a>Delete</a>
                    </td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
