<?php
session_start();
if (!isset($_SESSION['username'])) {
    die("You must be logged in to process a game");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Process Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once("functions.php");
    $mysqli = db_connect();

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
    ?>
    <br>
    <a href="get_game.php">Play Again</a>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>