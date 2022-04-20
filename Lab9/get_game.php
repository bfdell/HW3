<?php
require_once("functions.php");
$mysqli = db_connect();
$query = "SELECT question, choice1, choice2, choice3, choice4 FROM Questions50505 ORDER BY RAND()";
$result = $mysqli->query($query);
$row = $result->fetch_row();
$q = $row[0];
$c1 = $row[1];
$c2 = $row[2];
$c3 = $row[3];
$c4 = $row[4];

$numQuestions = 5;
$questionsQuery = "SELECT DISTINCT * FROM Questions50505 ORDER BY RAND() LIMIT $numQuestions";
$questions = $mysqli->query($questionsQuery);
for($i = 0; $i < $numQuestions; $i++) {

    while($question = $questions->fetch_assoc()) {
        echo "<form method=\"post\" action=\"get_qame.php\">";

        echo "<label>{$question['question']}<br>
        </label>";

        echo "</form>";
    }
}
// $result = $mysqli->query("SHOW COLUMNS FROM Questions50505");
// echo
// '<table>';
//     echo
//     '<tr>';
//         // echo var_dump($result);
//         while ($row = $result->fetch_row()) {
//             echo '<th>' . $row[0] . '</th>';
//         }
//         echo '</tr>';
//         $result->close();
//         $result = $mysqli->query("SELECT * FROM Questions50505");
        
//         while ($row = $result->fetch_row()) {
//             echo '<tr>';
//                 foreach ($row as $value) {
//                     echo '<td>' . $value . '</td>';
//                 }
//                 echo '</tr>';
//             }
//             echo '</table>';
//             $result->close();
            $mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1,
shrink-to-fit=no">
    <title>Get Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>

<body>
    <form method="post" action="get_question.php">
        <label><?php echo $q ?><br>
        </label>
        <br>
        <div class="questionfield">
            <label><?php echo $c1 ?><br>
            <input type="radio" name="answer" value="1">
            </label>
        </div>
        <div class="questionfield">
            <label><?php echo $c2 ?><br>
            <input type="radio" name="answer" value="2">
            </label>
        </div>
        <div class="questionfield">
            <label><?php echo $c3 ?><br>
            <input type="radio" name="answer" value="3">
            </label>
        </div>
        <div class="questionfield">
            <label><?php echo $c4 ?><br>
            <input type="radio" name="answer" value="4">
            </label>
        </div>
        <input type="submit" name="action" value="Next">
    </form>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>