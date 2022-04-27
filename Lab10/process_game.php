<?php
session_start();
require_once("functions.php");
if (!isset($_SESSION['username'])) {
    die("You must be logged in to play a game");
} else {
    authenticate();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Process Game</title>
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
    <?php
    require_once("functions.php");
    $mysqli = db_connect();
    if (isset($_POST['action'])) {
        $numwon = 0;
        $numlost = 0;
        $questions = $_SESSION['questions'];
        for ($i = 0; $i < count($questions); $i++) {
            //Gets question and user's answer
            $question  = $questions["question$i"];
            $userChoice = $_POST["answer$i"];

            //Gets correct answer to current question
            $answerQuery = "SELECT answer FROM Questions50505 WHERE question = '$question'";
            $answer = $mysqli->query($answerQuery)->fetch_array()[0];

            //Validates question
            echo "<strong>Question " . $i + 1 . ":</strong> Correct answer: $answer &nbsp Your answer: $userChoice ";
            if ($answer == $userChoice) {
                echo "<strong>CORRECT</strong>";
                $numwon++;
            } else {
                echo " <strong>INCORRECT</strong>";
                $numlost++;
            }
            echo "<br>Correct: " . $numwon . " Incorrect: " . $numlost . " <br>";
        }
        //Print insert message
        $user = $_SESSION['username'];
        echo "<br>GAME INSERTED INTO TABLE FOR USER: $user";

        //Increments amount of games played for user in users table
        $incrementPlayedQuery = "UPDATE Users50505 SET gamesplayed = gamesplayed + 1 WHERE username = '$user'";
        $mysqli->query($incrementPlayedQuery);

        //Inserts game into table with numwon and lost
        $insertGameQuery = "INSERT INTO Games50505 (username, numwon, numlost) VALUES ('$user', '$numwon', '$numlost')";
        $mysqli->query($insertGameQuery);

        $mysqli->close();
    } else {
        echo "<h2>You must play a game to process a game</h2>";
    }
    ?>
    <br>
    <a href="get_game.php">Play New Game</a>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>