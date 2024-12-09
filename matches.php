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
    ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

include "header.php"; 
?>

<h2>Matches</h2>
<p class="new-item-wrapper">
    <a href="matches_new.php">New match</a>
</p>
<table>
    <thead>
        <tr>
            <td>Home team</td>
            <td>Away team</td>
            <td>Result</td>
            <td>Venue</td>
            <td>Date</td>
            <td>Operations</td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = $stmt->fetch()) {
                echo '
                <tr>
                    <td>' . $row['home_team_name'] . '</td>
                    <td>' . $row['away_team_name'] . '</td>
                    <td>' . $row['team_home_goals'] . ':' . $row['team_away_goals'] . '</td>
                    <td>' . $row['venue'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td>
                        <a href="matches_edit.php?match_id='. $row['id'] .'">Edit</a> | <a href="matches_delete.php?match_id='. $row['id'] .'">Delete</a>
                    </td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
