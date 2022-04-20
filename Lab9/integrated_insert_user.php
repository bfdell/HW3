<?php
$username = $_POST['username'];
$password = $_POST['password'];
$action = $_POST['action'];

if ($action == "Insert") {
    if ($username != "" && $password != "") {
        require_once("functions.php");
        $mysqli = db_connect();

        $insertQuery = "INSERT INTO Users50505 (username, password, gamesplayed) VALUES
        ('$username', '$password', '0')";
        $existQuery = "SELECT username FROM Users50505 WHERE username = '$username'";

        $previousUsers = $mysqli->query($existQuery);
        // var_dump($previousUsers);
        if ($previousUsers->num_rows == 0) {
            //RUNS QUERY THAT INSERTS USER IF USER ISN'T ALREADY THERE
            $mysqli->query($insertQuery);
            echo $username . " added to users.";
        } else {
            echo "username " . $username . " is alredy taken.";
        }

        //EXECUTES show_users
        $result = $mysqli->query("SHOW COLUMNS FROM Users50505");
        echo
        '<table>';
        echo
        '<tr>';
        // echo var_dump($result);
        while ($row = $result->fetch_row()) {
            echo '<th>' . $row[0] . '</th>';
        }
        echo '</tr>';
        $result->close();
        $result = $mysqli->query("SELECT * FROM Users50505");

        while ($row = $result->fetch_row()) {
            echo '<tr>';
            foreach ($row as $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        $result->close();
        $mysqli->close();
?>
        <!-- Links back to integrated_insert_user -->
        <!DOCTYPE html>
        <html>
        <meta charset="utf-8">
        <title>Integrated Insert User</title>

        <body>
            <a href="integrated_insert_user.php">Insert another user</a>
        </body>

        </html>
    <?php }
} else if ($action == null) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
        <title>Integrated Insert User</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    </head>

    <body>
        <form method="post" action="integrated_insert_user.php">
            <label>Username:<br>
                <input type="text" name="username" required style="width: 60vh">
            </label>
            <br>
            <label>Password:<br>
                <input type="password" name="password" required style="width: 60vh">
            </label><br>
            <input type="submit" name="action" value="Insert">
        </form>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
        </script>
    </body>

    </html>
<?php }
?>