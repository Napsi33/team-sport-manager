<?php
session_start();
include "database.php";
include "auth.php";

$conn = connect_db();

$stmt = $conn->prepare("
    SELECT
        matches.id,
        matches.team_home_goals,
        matches.team_away_goals,
        matches.venue,
        matches.date,
        home_teams.name AS home_team_name,
        away_teams.name AS away_team_name
    FROM matches
    JOIN teams as home_teams ON home_teams.id = matches.team_home_id
    JOIN teams as away_teams ON away_teams.id = matches.team_away_id
    WHERE date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY);
    ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

include "header.php"; 
?>

<h2>Next matches in the following 7 days</h2>
<table>
    <thead>
        <tr>
            <td>Home team</td>
            <td>Away team</td>
            <td>Venue</td>
            <td>Date</td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = $stmt->fetch()) {
                echo '
                <tr>
                    <td>' . $row['home_team_name'] . '</td>
                    <td>' . $row['away_team_name'] . '</td>
                    <td>' . $row['venue'] . '</td>
                    <td>' . $row['date'] . '</td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
