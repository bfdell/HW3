<?php
$username = $_POST['username'];
$password = $_POST['password'];
$action = $_POST['action'];

if ($action == "Insert") {
    if ($username != "" && $password != "") {
        $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
        
        $insertQuery = "INSERT INTO Users50505 (username, password, gamesplayed) VALUES
        ('$username', '$password', '0')";
        $existQuery = "SELECT username FROM Users50505 WHERE ' .$username ' = username";

        $previousUsers = $mysqli->query($existQuery);
        if($previousUsers != false) {
            //RUNS QUERY THAT INSERTS USER IF USER ISN'T ALREADY THERE
            $mysqli->query($insertQuery);
            $mysqli->close();
        } else {
            echo $username . " is already taken";
            die();
            $mysqli->close();
        }
        // echo var_dump($_POST);
        // //EXECUTES show_questions
        // header("Location: http://www.sienasellbacks.com/bf08dell/Lab8/show_questions.php");
        // die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1,
shrink-to-fit=no">
    <title>Add User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>

<body>
    <form method="post" action="insert_user.php">
        <label>Username:<br>
            <input type="text" name="username" style="width: 60vh">
        </label>
        <br>
        <label>Password:<br>
            <input type="password" name="password" style="width: 70vh">
        </label>
        <input type="submit" name="action" value="Insert">
    </form>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>