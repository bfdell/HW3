<?php
session_start();

require_once("functions.php");
$mysqli = db_connect();

$questions = $_SESSION['questions'];
for ($i = 0; $i < count($questions); $i++) {
    //Gets question and users answer
    $question  = $questions["Question $i"];
    $userChoice = $_POST["answer$i"];

    //Gets answer to current question
    $answerQuery = "SELECT answer FROM Questions50505 WHERE question = '$question'";
    $answer = $mysqli->query($answerQuery)->fetch_array()[0];

    //Validates question
    $updateQuery = "UPDATE Games50505 SET 
    if ($answer == $userChoice) {
        echo "Correct answer!<br>";
    } else {
        echo "Incorrect... correct answer: " . $answer. "<br>";
    }
}
