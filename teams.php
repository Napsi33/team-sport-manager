<?php
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT * from teams");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

include "header.php";
?>

<h2>Teams</h2>
<p class="new-item-wrapper">
    <a href="teams_new.php">New team</a>
</p>
<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>City</td>
            <td>Year of foundation</td>
            <td>Operations</td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = $stmt->fetch()) {
                echo '
                <tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['city'] . '</td>
                    <td>' . $row['year_of_foundation'] . '</td>
                    <td>
                        <a>Edit</a> | <a>Delete</a>
                    </td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
