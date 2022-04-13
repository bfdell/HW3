<?php

if ($_GET['key'] != "505") {
    die("Access denied");
}

$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");

$sql = "CREATE TABLE Users50505 (
    username VARCHAR(64) NOT NULL,
    password VARCHAR(64) NOT NULL,
    gamesplayed INTEGER NOT NULL,
    PRIMARY KEY (username)
)";

$mysqli->query($sql);
// Use the result

$mysqli->close();
?>