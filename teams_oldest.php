<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT id, name, year_of_foundation FROM teams ORDER BY year_of_foundation ASC LIMIT 1;");
$stmt->execute();
$team = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt_members = $conn->prepare("SELECT name FROM members WHERE team_id = ?;");
$stmt_members->execute([$team['id']]);


include "header.php";
?>

<h2>Oldest team (<?php echo $team['name']?> - <?php echo $team['year_of_foundation']?>)</h2>
<table>
    <thead>
        <tr>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = $stmt_members->fetch()) {
                echo '
                <tr>
                    <td>' . $row['name'] . '</td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
