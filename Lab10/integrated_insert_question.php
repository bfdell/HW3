<?php
//ASSIGNS VARIABLES
$q = $_POST['question'];
$c1 = $_POST['choice1'];
$c2 = $_POST['choice2'];
$c3 = $_POST['choice3'];
$c4 = $_POST['choice4'];
$a = $_POST['answer'];
$action = $_POST['action'];

//IF WE ARE INSERTING A QUESTION
if ($action == "Insert") {
    if ($q != "" && $c1 != "" && $c2 != "" && $c3 != "" && $c4 != "" && $a != "") { ?>
        <!--Links back to Integrated Insert Questions -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
            <title>Create Question</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <header>
                <h1>All Questions</h1>
            </header>
            <hr>
            <?php
            require_once("functions.php");
            $mysqli = db_connect();

            //INSERT QUESTION INTO TABLE
            $insertQuery = "INSERT INTO Questions50505 (question, choice1, choice2, choice3, choice4, answer) VALUES
        ('$q', '$c1', '$c2', '$c3', '$c4', '$a')";
            $mysqli->query($insertQuery);

            //EXECUTES show_questions
            $result = $mysqli->query("SHOW COLUMNS FROM Questions50505");
            echo
            '<table>';
            echo
            '<tr>';
            // echo var_dump($result);
            while ($row = $result->fetch_row()) {
                echo '<th>' . $row[0] . '</th>';
            }
            echo '</tr>';
            $result->close();
            $result = $mysqli->query("SELECT * FROM Questions50505");

            while ($row = $result->fetch_row()) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            $result->close();
            $mysqli->close();
            ?>
            <a href="integrated_insert_question.php">Insert Another Question</a>
            <br>
            <a href="admin.php">Admin</a>
            <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
            </script>
        </body>

        </html>
    <?php }
} else if ($action == null) { ?>
    <!--IF SUBMIT BUTTON IS NULL, DISPLAY FORM-->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
        <title>Create Question</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <h1>Create Question</h1>
        </header>
        <hr>
        <form method="post" action="integrated_insert_question.php">
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

        <br>
        <a href="admin.php">Admin</a>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
        </script>
    </body>

    </html>
<?php }
?>