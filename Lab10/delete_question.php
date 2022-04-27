<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delete Question</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>

<body>
    <header>
        <h1>Delete Question</h1>
    </header>

    <?php
    require_once("functions.php");

    if (isset($_POST['deletequestion'])) {
        $mysqli = db_connect();
        $question = $_POST['question'];

        $deleteQuestionQuery = "DELETE FROM Questions50505 WHERE question = '$question'";
        $mysqli->query($deleteQuestionQuery);
        echo "Successfully deleted the question $question";

        $mysqli->close();
    }
    $questions = get_questions();
    echo "<form method=\"post\" action=\"delete_question.php\">
        <select name=\"question\">";
    foreach ($questions as $question) {
        echo "<option value=\"$question\">$question</option>";
    }
    echo "</select> 
        <br>
        <input type=\"submit\" name=\"deletequestion\" value=\"Delete Question\">
        </form>";

    ?>
    <br>
    <a href="admin.php">Admin</a>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>