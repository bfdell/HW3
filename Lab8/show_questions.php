<?php
require_once("functions.php");
$mysqli = db_connect();

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

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Show Questions</title>

<body>
</body>

</html>