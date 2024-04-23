<?php
    // info: page to register on

    include(__DIR__ . '/includes/header.php');
    include(__DIR__ . '/includes/profiles.php');
    include(__DIR__ . '/includes/style.php');
?>

<html>
    <head>
        <title>pisshills - register</title>
    </head>
    <body>
        <br><br><br>
        <center>
            <?php
            if (isset($_POST["username"]) and isset($_POST["pass"])) {
                if ($_POST["pass"] == '' || $_POST["username"] == '') {
                    echo "<h2>u can't have a field left blank, dumbass</h2>";
                    return;
                };
                if (!checkAvaliable($_POST["username"])) {
                    echo "<h2>name is already taken, dumbass</h2>";
                    return;
                };
                try {
                    fuckingregister($_POST["username"], $_POST["pass"]);
                    echo '<h2 class="rotating">ur registerd now get the fuck ouyt</h2>';
                } catch (Exception $e) {
                    echo "failed to register because <div class='fuckyou'>fuck you</div>";
                };
                return;
            };
            echo '
            <text>registasasitonMMMMMMMMMMMMMMMMMMMMMMMMMMMM</text><br><br>
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