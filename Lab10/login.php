<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once("functions.php");
    $mysqli = db_connect();
    $userExist = false;
    if (isset($_SESSION['username'])) {
        echo "<header>
                <h1>Options Menu</h1>
             </header><hr>";
        $userExist = authenticate();
    }
    //DONT LOGIN IF ALREADY LOGGED IN (TO ADD!)
    if (!$userExist) {
        if (!isset($_POST['login'])) {
            echo "<header>
                    <h1>Login</h1>
                 </header><hr>";
            echo "<form id=\"logininfo\" method=\"post\" action=\"login.php\">
        <label for=\"username\"> <strong>Username:</strong><br>
        <input type=\"text\" name=\"username\" id=\"username\" placeholder=\"Username\" required>
        </label>
        <label for=\"password\"><strong>Password:</strong><br>
        <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\" required>
        </label>
        <input type=\"submit\" name=\"login\" value=\"Submit\" id=\"submitinfo\">
        </form>";
        } else {
            $username = $_POST['username'];
            $enteredPassword = $_POST['password'];

            $passwordQuery = "SELECT password FROM Users50505 WHERE username = '$username'";
            $passwordResult = $mysqli->query($passwordQuery);

            if ($passwordResult->num_rows > 0) {
                $password = $passwordResult->fetch_array()[0];

                if ($enteredPassword == $password) {
                    $_SESSION['username'] = $username;
    ?>
                    <script>
                        var errorMessage = document.getElementById("deleted_user_error");

                        if (errorMessage != null) {
                            document.querySelector("body").removeChild(errorMessage);
                        }
                    </script>
    <?php
                    echo "<header>
                    <h1>Options Menu</h1> 
                    </header> <hr>";
                    echo "<h2>Welcome {$_SESSION['username']}</h2>";
                    echo "<a href=\"get_game.php\">Play Game</a>";
                    echo "<a href=\"show_results.php\">Show Statistics</a>";
                    echo "<a href=\"logout.php\">Logout</a>";
                } else {
                    echo "<header><h1>Login failed: either username or password is incorrect</h1></header>";
                    echo "<a href=\"login.php\">Try Again</a>";
                }
                $passwordResult->close();
            } else {
                echo "<header><h1>Login failed: either username or password is incorrect</h1></header>";
                echo "<a href=\"login.php\">Try Again</a>";
            }
            $mysqli->close();
        }
    } else {
        echo "<a href=\"get_game.php\">Play Game</a>";
        echo "<a href=\"show_results.php\">Show Statistics</a>";
        echo "<a href=\"admin.php\">Admin</a>";
        echo "<a href=\"logout.php\">Logout</a>";
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>