<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>show_results</title>
</head>

<body>
    <h1>Game Stats</h1>
    <?php
    echo "<table>
    <tr>
    <th>Username</th>
    <th>Total Won</th>
    <th>Total Lost</th>
    </tr>";

    require_once("functions.php");
    $mysqli = db_connect();

    //Gets all usernames and stores them in usernames array
    $usersQuery = "SELECT username FROM Users50505";
    $users = $mysqli->query($usersQuery);
    $usernames = array();
    while ($username = $users->fetch_row()) {
        array_push($usernames, $username[0]);
    }
    $users->close();

    //Outputs game data for each user in table
    foreach ($usernames as $username) {
        //Gets all games played by specific user
        $userGamesQuery = "SELECT * FROM Games50505 WHERE username = '$username'";
        $games = $mysqli->query($userGamesQuery);

        //Tf user has played games, find and output stats
        if ($games->num_rows > 0) {
            $numWon = 0;
            $numLost = 0;
            foreach ($games as $game) {
                $numWon += $game['numwon'];
                $numLost += $game['numlost'];
            }
            echo "<tr>
                <th>$username</th>
                <td>$numWon</td>
                <td>$numLost</td>";
        }
    }
    $games->close();
    $mysqli->close();
    ?>
    </table>
</body>

</html>