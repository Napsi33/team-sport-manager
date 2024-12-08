<?php 
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("
    SELECT
        members.name,
        members.nationality,
        members.date_of_birth,
        members.position,
        teams.name AS team_name
    FROM members
    JOIN teams ON teams.id = members.team_id
    ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

include "header.php"; 
?>

<h2>Members</h2>
<p class="new-item-wrapper">
    <a href="members_new.php">New member</a>
</p>
<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Nationality</td>
            <td>Date of birth</td>
            <td>Position</td>
            <td>Team</td>
            <td>Operations</td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = $stmt->fetch()) {
                echo '
                <tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['nationality'] . '</td>
                    <td>' . $row['date_of_birth'] . '</td>
                    <td>' . $row['position'] . '</td>
                    <td>' . $row['team_name'] . '</td>
                    <td>
                        <a>Edit</a> | <a>Delete</a>
                    </td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
