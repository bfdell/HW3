<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Admin</h1>
    </header>
    <hr>
    <?php
    echo "<a href=\"\">Create User</a>";
    echo "<a href=\"\">Show all Users</a>";
    echo "<a href=\"\">Create Question</a>";
    echo "<a href=\"\">Show all Questions</a>";
    echo "<a href=\"delete_question.php\">Delete Question</a>";
    echo "<a href=\"delete_user.php\">Delete User</a>";
    ?>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</body>

</html>