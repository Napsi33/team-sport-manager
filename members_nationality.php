<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("
    SELECT
        members.nationality,
        count(members.nationality) as nat_count
    FROM members
    WHERE members.team_id = ?
    GROUP BY members.nationality
    ");
$stmt->execute([$_GET['team_id']]);
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt_team = $conn->prepare("
    SELECT
        name
    FROM teams
    WHERE id = ?
    ");
$stmt_team->execute([$_GET['team_id']]);
$team = $stmt_team->fetch(PDO::FETCH_ASSOC);


include "header.php"; 
?>

<h2>Members by nationality (<?php echo $team["name"] ?>)</h2>
<table>
    <thead>
        <tr>
            <td>Nationality</td>
            <td>Count</td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = $stmt->fetch()) {
                echo '
                <tr>
                    <td>' . $row['nationality'] . '</td>
                    <td>' . $row['nat_count'] . '</td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
