<html>
    <head>
        <title>TeamSportManager</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div class="header-wrapper"> 
            <h1>TeamSportManager</h1>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) echo "<p>Hello " . $_SESSION['username'] . "!</p>" ?>
        </div>
        <div class="menu-wrapper">
            <ul>
                <?php

                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                echo '<li>
                    <a href="index.php">Welcome</a>
                </li>
                <li>
                    <a href="users.php">Users</a>
                </li>
                <li>
                    <a href="teams.php">Teams</a>
                </li>
                <li>
                    <a href="members.php">Members</a>
                </li>
                <li>
                    <a href="matches.php">Matches</a>
                </li>
                <li>
                    <a href="matches_next.php">Next matches</a>
                </li>
                <li>
                    <a href="wins_losses.php">Wins / losses</a>
                </li>
                <li>
                    <a href="oldest_team.php">Oldest teams</a>
                </li>
                <li>
                    <a href="team_member_nationality.php">Team member nationality</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>';
                }
                else
                {
                echo '<li>
                    <a href="registration.php">Registration</a>
                </li>
                <li>
                    <a href="login.php">Login</a>
                </li>';
                }
                ?>
            </ul>
        </div>
        <div class="main-wrepper">