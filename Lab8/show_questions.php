<?php
$mysqli = new mysqli(
    "localhost",
    "sienasel_sbxusr",
    "Sandbox@)!&",
    "sienasel_sandbox"
);

$result = $mysqli->query("SHOW COLUMNS FROM Questions22344");
echo
'<table>';
echo
'<tr>';
while ($row = $result->fetch_row()) {
    echo '<th>' . $row[0] . '</th>';
}
echo '</tr>';
$result->close();
$result = $mysqli->query("SELECT * FROM Questions22344");

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
    <!-- <a href="logout.php">Logout</a> -->
</body>

</html>