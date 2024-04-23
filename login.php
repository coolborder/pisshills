<?php

// info: page to login

include(__DIR__ . "/includes/profiles.php");
include(__DIR__ . "/includes/header.php");
include(__DIR__ . "/includes/style.php");

?>

<html>
    <head>
        <title>pisshills - login</title>
    </head>
    <body>
        <br><br><br>
        <center>
            <?php
            if (isset($_POST["username"]) and isset($_POST["pass"])) {
                if (check($_POST["username"], $_POST["pass"])) {
                    $user = $_POST["username"];
                    echo '<h2>ur logged in, now get the fuck ouyt</h2>';
                    return;
                } else {
                    echo '<h2>incorrect password or username, dumb fuck</h2>';
                    return;
                };
            };
            echo '
            <text>loginnnnnnnnn</text><br><br>
            <form method="POST" style="display: inline; border-style: solid; padding: 20px; border-width: 2px" class="rotating">
                <text>USERNAME</text><br><input name="username" maxlength="30"><br><br>
                <text>PASSWORD</text><br><input type="password" name="pass" maxlength="30"><br><br><br>
                <button type="submit">SUMBIT</button>
            </form>
            ';
            ?>
        </center>
    </body>
</html>