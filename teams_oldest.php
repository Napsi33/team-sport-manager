<?php
session_start();
include "auth.php";
include "database.php";

$conn = connect_db();

$stmt = $conn->prepare("SELECT * from teams ORDER BY year_of_foundation ASC LIMIT 1;");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

include "header.php";
?>

<h2>Oldest team</h2>
<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>City</td>
            <td>Year of foundation</td>
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
                </tr>';
            }
        ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
