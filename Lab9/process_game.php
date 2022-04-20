<?php
session_start();

require_once("functions.php");
$mysqli = db_connect();

//FIX TYPO NUM WOM INSTEAD OF NUM LOST

//CREATES GAME
$createGameQuery = "INSERT INTO Games50505 (username, numwom, numlost) VALUES ('brian', 0, 0)";
$mysqli->query($createGameQuery);
$gameidQuery = "SELECT max(gameid) FROM Games50505";
$gameid = $mysqli->query($gameidQuery)->fetch_array()[0];
$numwon = 0;
$numlost = 0;

$questions = $_SESSION['questions'];
for ($i = 0; $i < count($questions); $i++) {
    //Gets question and users answer
    $question  = $questions["Question $i"];
    $userChoice = $_POST["answer$i"];

    //Gets answer to current question
    $answerQuery = "SELECT answer FROM Questions50505 WHERE question = '$question'";
    $answer = $mysqli->query($answerQuery)->fetch_array()[0];

    //Validates question
    if ($answer == $userChoice) {
        echo "Correct answer!  ";
        $numwon++;
    } else {
        echo "Incorrect... correct answer: " . $answer . "  ";
        $numlost++;
    }
    echo "STATUS (l, w): ". $numlost . "  " . $numwon . " <br>";

    $updateQuery = "UPDATE Games50505 SET numwom = '$numwon', numlost = '$numlost' WHERE gameid = '$gameid'";
    $mysqli->query($updateQuery);
}
