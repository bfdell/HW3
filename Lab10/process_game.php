<?php
session_start();

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
    echo "<strong>Question " . $i + 1 .":</strong> Correct answer: $answer &nbsp Your answer: $userChoice ";
    if ($answer == $userChoice) {
        echo "<strong>CORRECT</strong>";
        $numwon++;
    } else {
        echo " <strong>INCORRECT</strong>";
        $numlost++;
    }
    echo "<br>Correct: ". $numwon . " Incorrect: " . $numlost . " <br>";
}
//Inserts game into table with  numwon and lost
//Print insert message
echo "<br>GAME INSERTED INTO TABLE";
$insertGameQuery = "INSERT INTO Games50505 (username, numwon, numlost) VALUES ('Juan', '$numwon', '$numlost')";
$mysqli->query($insertGameQuery);
$mysqli->close();
