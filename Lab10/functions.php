<?php
function db_connect()
{
    // return new mysqli(
    //     "localhost",
    //     "sienasel_sbxusr",
    //     "Sandbox@)!&",
    //     "sienasel_sandbox"
    // );
    return new mysqli(
        ini_get("mysqli.default_host"),
        "root",
        "root",
        "webclass"
    );
}

function get_users()
{
    //Connect to database
    $mysqli = db_connect();

    //Gets all usernames and stores them in usernames array
    $usersQuery = "SELECT username FROM Users50505";
    $users = $mysqli->query($usersQuery);
    $usernames = array();
    while ($username = $users->fetch_row()) {
        array_push($usernames, $username[0]);
    }
    $users->close();
    $mysqli->close();

    return $usernames;
}

function get_questions() {
     //Connect to database
     $mysqli = db_connect();

     //Gets all questions and stores them in questions array
     $questionsQuery = "SELECT question FROM Questions50505";
     $questions = $mysqli->query($questionsQuery);
     $questionsArr = array();
     while ($question = $questions->fetch_row()) {
         array_push($questionsArr, $question[0]);
     }
     $questions->close();
     $mysqli->close();
 
     return $questionsArr;
}

function authenticate()
{
    //Connect to database
    $mysqli = db_connect();

    $sessionusername = $_SESSION['username'];

    //Checks to see if currently logged in user has been deleted since logging in
    $confirmUserQuery = "SELECT username FROM Users50505 WHERE username = '$sessionusername'";
    $userExist = $mysqli->query($confirmUserQuery)->num_rows == 1;
    if (!$userExist) {
        echo "<h2 id=\"deleted_user_error\">Previously logged in user \"$sessionusername\" has since been deleted: Please login to a different account.</h2>";
    } else {
        echo "<h2>Welcome $sessionusername</h2>";
    }

    return $userExist;
}
