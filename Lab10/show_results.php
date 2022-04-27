<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Show results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>

<body>
    <h1>Game Stats</h1>
    <!-- ////////////////////////////////////////////////////////////////
    //ADD GAMES PLAYED TO GAMES TABLE 
    RESET AUTO INCREMENT
    RESET GAMES ALREADY IN TABLE
    -->
    <?php
    echo "<table>
    <tr>
    <th>Username</th>
    <th>Total Won</th>
    <th>Total Lost</th>
    <th>Games Played</th>
    </tr>";
    require_once("functions.php");
    $mysqli = db_connect();

    //Gets all usernames
    $usernames = get_users();

    //Outputs game data for each user in table
    foreach ($usernames as $username) {
        //Gets all games played by specific user
        $userGamesQuery = "SELECT * FROM Games50505 WHERE username = '$username'";
        $games = $mysqli->query($userGamesQuery);

        //If user has played games, find and output stats
        $gamesPlayed = $games->num_rows;
        if ($gamesPlayed > 0) {
            $numWon = 0;
            $numLost = 0;
            foreach ($games as $game) {
                $numWon += $game['numwon'];
                $numLost += $game['numlost'];
            }
            echo "<tr>
                <th>$username</th>
                <td>$numWon</td>
                <td>$numLost</td>
                <td>$gamesPlayed</td>";
        }
    }
    $games->close();
    $mysqli->close();
    ?>
    </table>
    <a href="login.php">Options Menu</a>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>