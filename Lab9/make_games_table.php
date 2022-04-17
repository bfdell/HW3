<?php
if($_GET['key'] != "505") {
    die("Access denied");
}

require_once("functions.php");
$mysqli = db_connect();

$sql = "CREATE TABLE Games50505 ( 
                gameid INTEGER NOT NULL AUTO_INCREMENT,
                username VARCHAR(64) NOT NULL,
                numwom INTEGER NOT NULL,
                numlost INTEGER NOT NULL,
                PRIMARY KEY (gameid),
                FOREIGN KEY (username) REFERENCES Users50505(username)
                )";


$mysqli->query($sql);
$mysqli->close();
?>