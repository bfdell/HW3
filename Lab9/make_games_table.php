<?php
if($_GET['key'] != "505") {
    die("Access denied");
}

$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");

$sql = "CREATE TABLE Games50505 ( 
                gameid INTEGER NOT NULL,
                username VARCHAR(64) NOT NULL,
                numwom INTEGER NOT NULL,
                numlost INTEGER NOT NULL,
                PRIMARY KEY (gameid),
                FOREIGN KEY (username) REFERENCES Users (username)
                )";


$mysqli ->query($sql);
$mysqli->close();
?>