<?php
session_start();
require_once("functions.php");
$loginStatus = authenticate();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Process Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Process Game</h1>
    </header>
    <hr>
    <?php
    $message = getWelcomeMessage($loginStatus);
    echo  "<h2>$message</h2>";

    if ($loginStatus == "verified") {
        if (isset($_POST['action'])) {
            $mysqli = db_connect();
            $numwon = 0;
            $numlost = 0;
            $questions = $_SESSION['questions'];
            echo "<div id=\"resultdata\">";
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
            echo "<br><strong>GAME INSERTED INTO TABLE FOR USER: $user</strong>";
            echo "</div>";
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
    }
    ?>
    <br>
    <a href="get_game.php">Play New Game</a>
    <a href="login.php">Options Menu</a>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>