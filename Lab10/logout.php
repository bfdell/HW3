<?php session_start();
session_destroy();
unset($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
    <title>Logout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            background-image: linear-gradient(to bottom, rgb(168, 213, 255), #140558);
            min-width: 610px;
        }

        header {
            text-align: center;
        }

        h1 {
            margin-bottom: 0;
            font-size: 2.5em;
        }

        hr {
            border-style: solid;
            width: 60%;
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form * {
            margin: 0 auto;
            font-size: 1.24em;
        }

        label {
            margin-top: 15px;
            margin-bottom: 15px;
            width: 25%;
        }

        label input {
            width: 100%;
            border-style: solid;
            border-radius: 12px;
            border-color: black;
            border-width: 4px;
        }

        label input:hover,
        #submitinfo:hover {
            border-color: rgb(34, 0, 255);
        }

        #submitinfo:active {
            background-color: rgb(115, 144, 223);
            color: white;
            font-weight: bold;
        }

        #submitinfo {
            padding: 10px 10px;
            margin-top: 15px;
            font-size: 1.5em;
            border-style: solid;
            border-radius: 12px;
            border-color: black;
            border-width: 4px;
        }

        #passwordMessage {
            margin-top: 30px;
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
        }

        a {
            text-align: center;
            margin: 20px auto 10px;
            display: block;
            width: 10%;
            font-size: 1.5em;
            text-decoration: none;
            padding: 7px;
            border-radius: 30px;
            background-color: blue;
            color: black;
        }

        a:visited,
        .smallbox button:visited {
            color: cyan;
        }

        a:hover,
        .smallbox button:hover {
            background-color: lightblue;
            transition: .1s;
        }

        a:active,
        .smallbox button:active {
            color: rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    <header>
        <h1>Logout</h1>
    </header>
    <h2>Logged out and session destroyed</h2>
    <a href="login.php">Login</a>
</body>

</html>