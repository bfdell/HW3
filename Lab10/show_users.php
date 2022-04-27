<?php
require_once("functions.php");
$mysqli = db_connect();

$result = $mysqli->query("SHOW COLUMNS FROM Users50505");
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
$result = $mysqli->query("SELECT * FROM Users50505");

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Show Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js ">
    </script>
</head>

<body>
    <br>
    <a href="admin.php">Admin</a>
</body>

</html>