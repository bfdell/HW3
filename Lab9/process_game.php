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
    if ($answer == $userChoice) {
        // echo "Correct answer!  ";
        $numwon++;
    } else {
        // echo "Incorrect... correct answer: " . $answer . "  ";
        $numlost++;
    }
    echo "STATUS (w, l): ". $numwon . "  " . $numlost . " <br>";
}
//Inserts game into table with  numwon and lost
$insertGameQuery = "INSERT INTO Games50505 (username, numwon, numlost) VALUES ('brian', '$numwon', '$numlost')";
$mysqli->query($insertGameQuery);
