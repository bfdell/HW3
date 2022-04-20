<?php
session_start();

require_once("functions.php");
$mysqli = db_connect();

//Gets question and users answer
$questionNum = $_POST['action'];
$question = $_SESSION[$questionNum];
$choice = $_POST['answer'];

//Gets answer to question
$answerQuery = "SELECT answer FROM Questions50505 WHERE question = '$question'";
$answer = $mysqli->query($answerQuery)->fetch_array()[0];

//Validates question
if($answer == $choice) {
    echo "Correct answer!";
} else {
    echo "Incorrect... correct answer: " . $answer;
}

// $sql = "UPDATE Games50505 SET ";