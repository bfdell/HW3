<?php
$q = $_POST['question'];
$c1 = $_POST['choice1'];
$c2 = $_POST['choice2'];
$c3 = $_POST['choice3'];
$c4 = $_POST['choice4'];
$a = $_POST['answer'];
$action = $_POST['action'];

if ($action == "Insert") {
    if ($q != "" && $c1 != "" && $c2 != "" && $c3 != "" && $c4 != "" && $a != "") {
        $sql = "INSERT INTO Questions50505 (question, choice1, choice2, choice3, choice4, answer) VALUES
        ('$q', '$c1', '$c2', '$c3', '$c4', '$a')";

        // echo var_dump($_POST);
        require_once("functions.php");
        $mysqli = db_connect();
        $mysqli->query($sql);
        $mysqli->close();

        //EXECUTES show_questions
        header("Location: http://www.sienasellbacks.com/bf08dell/Lab8/show_questions.php");
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1,
shrink-to-fit=no">
    <title>Add Question</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>

<body>
    <form method="post" action="insert_question.php">
        <label>Question<br>
        <input type="text" name="question" style="width: 70vh">
        </label>
        <br>
        <div class="questionfield">
            <label>Choice1<br><input type="text" name="choice1">
            </label>
            <input type="radio" name="answer" value="1">
        </div>
        <div class="questionfield">
            <label>Choice2<br><input type="text" name="choice2">
            </label>
            <input type="radio" name="answer" value="2">
        </div>
        <div class="questionfield">
            <label>Choice3<br><input type="text" name="choice3">
            </label>
            <input type="radio" name="answer" value="3">
        </div>
        <div class="questionfield">
            <label>Choice4<br><input type="text" name="choice4">
            </label>
            <input type="radio" name="answer" value="4">
        </div>
        <input type="submit" name="action" value="Insert">
    </form>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>