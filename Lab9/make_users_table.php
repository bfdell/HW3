<?php

if ($_GET['key'] != "505") {
    die("Access denied");
}

require_once("functions.php");
$mysqli = db_connect();

$sql = "CREATE TABLE Users50505 (
    username VARCHAR(64), NOT NULL,
    password VARCHAR(64) NOT NULL,
    gamesplayed INTEGER NOT NULL,
    PRIMARY KEY (username)
    FOREIGN KEY
)";

$mysqli->query($sql);
// Use the result

$mysqli->close();
?>