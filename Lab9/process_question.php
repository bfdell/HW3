<?php
session_start();

$choice = $_POST['answer'];
$question = $_SESSION['question'];

require_once("functions.php");
$mysqli = db_connect();

$answerQuery = "SELECT answer FROM Questions50505 WHERE question = '$question'";
$answer = $mysqli->query($answerQuery);

if($answer == $choice) {
    echo "Correct answer!";
} else {
    echo "Incorrect... correct answer: " . $answer;
}