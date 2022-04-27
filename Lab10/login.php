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
    <style>
        body {
            min-height: 100vh;
            background-image: linear-gradient(to bottom, rgb(168, 213, 255), #140558);
            min-width: 610px;
        }

        header {
            text-align: center;
        }

        h1 {
            margin-bottom: 0;
            font-size: 2.5em;
        }

        hr {
            border-style: solid;
            width: 60%;
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form * {
            margin: 0 auto;
            font-size: 1.24em;
        }

        label {
            margin-top: 15px;
            margin-bottom: 15px;
            width: 25%;
        }

        label input {
            width: 100%;
            border-style: solid;
            border-radius: 12px;
            border-color: black;
            border-width: 4px;
        }

        label input:hover,
        #submitinfo:hover {
            border-color: rgb(34, 0, 255);
        }

        #submitinfo:active {
            background-color: rgb(115, 144, 223);
            color: white;
            font-weight: bold;
        }

        #submitinfo {
            padding: 10px 10px;
            margin-top: 15px;
            font-size: 1.5em;
            border-style: solid;
            border-radius: 12px;
            border-color: black;
            border-width: 4px;
        }

        #passwordMessage {
            margin-top: 30px;
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
        }

        a {
            text-align: center;
            margin: 20px auto 10px;
            display: block;
            width: 10%;
            font-size: 1.5em;
            text-decoration: none;
            padding: 7px;
            border-radius: 30px;
            background-color: blue;
            color: black;
        }

        a:visited,
        .smallbox button:visited {
            color: cyan;
        }

        a:hover,
        .smallbox button:hover {
            background-color: lightblue;
            transition: .1s;
        }

        a:active,
        .smallbox button:active {
            color: rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>
    <hr>
    <?php
    //ADD AUTHENTICATE TO ALL PLACES UNDER SESSION
    require_once("functions.php");
    $mysqli = db_connect();
    $userExist = false;
    if (isset($_SESSION['username'])) {
        $userExist = authenticate();
    }
    if (!$userExist) {
        if (!isset($_POST['login'])) {
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

            $passwordQuery = "SELECT password FROM users50505 WHERE username = '$username'";
            $passwordResult = $mysqli->query($passwordQuery);

            if ($passwordResult->num_rows > 0) {
                $password = $passwordResult->fetch_array()[0];

                if ($enteredPassword == $password) {
                    $_SESSION['username'] = $username;
                    ?>
                        <script> 
                            var errorMessage = document.getElementById("deleted_user_error");
                        
                            if(errorMessage != null) {
                                document.querySelector("body").removeChild(errorMessage);
                            }
                        </script>
                    <?php
                    echo "<h2>Welcome {$_SESSION['username']}</h2>";
                    echo "<a href=\"get_game.php\">Play Game</a>";
                    echo "<a href=\"show_results.php\">Show Statistics</a>";
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
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>