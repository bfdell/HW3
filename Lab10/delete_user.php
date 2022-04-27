<?php
session_start();
//Add authentication
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delete User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Delete User</h1>
    </header>
    <hr>

    <?php
    require_once("functions.php");

    if (isset($_POST['deleteuser'])) {
        $username = $_POST['user'];
        $mysqli = db_connect();
        $deleteGamesQuery = "DELETE FROM Games50505 WHERE username = '$username'";
        $mysqli->query($deleteGamesQuery);

        $deleteUserQuery = "DELETE FROM Users50505 WHERE username = '$username'";
        $mysqli->query($deleteUserQuery);
        echo "<h2>Successfully deleted the user \"$username\"</h2>";

        $mysqli->close();
    }
    $users = get_users();
    echo "<form method=\"post\" action=\"delete_user.php\">
        <select name=\"user\">";
    foreach ($users as $username) {
        echo "<option value=\"$username\">$username</option>";
    }
    echo "</select> 
        <br>
        <input type=\"submit\" name=\"deleteuser\" value=\"Delete User\">
        </form>";

    ?>
    <br>
    <a href="admin.php">Admin</a>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>