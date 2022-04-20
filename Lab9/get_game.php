<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Get Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>
<?php
require_once("functions.php");
$mysqli = db_connect();

$numQuestions = 5;
$questionsQuery = "SELECT DISTINCT * FROM Questions50505 ORDER BY RAND() LIMIT $numQuestions";
$questions = $mysqli->query($questionsQuery);
for ($i = 0; $i < $numQuestions; $i++) {

    while ($question = $questions->fetch_assoc()) {
        echo "<form method=\"post\" action=\"get_game.php\">";

        echo "<label>{$question['question']}<br>
        </label><br>
        <div class=\"questionfield\">
            <label>{$question['choice1']}<br>
            <input type=\"radio\" name=\"answer\" value=\"1\">
            </label>
        </div>
        <div class=\"questionfield\">
            <label>{$question['choice2']}<br>
            <input type=\"radio\" name=\"answer\" value=\"2\">
            </label>
        </div>
        <div class=\"questionfield\">
            <label>{$question['choice3']}<br>
            <input type=\"radio\" name=\"answer\" value=\"3\">
            </label>
        </div>
        <div class=\"questionfield\">
            <label>{$question['choice4']}<br>
            <input type=\"radio\" name=\"answer\" value=\"4\">
            </label>
        </div>
        <input type=\"submit\" name=\"action\" value=\"Next\">";

        echo "</form><br>";
    }
}
$questions->close();
$mysqli->close();

?>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
</script>
</body>

</html>