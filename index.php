<?php
    // info: homepage, nothing much

    include(__DIR__ . '/includes/header.php');
    include(__DIR__ . '/includes/profiles.php');
    include(__DIR__ . '/includes/style.php');
?>

<html>
    <head>
        <title>pisshills - homepage</title>
    </head>
    <body>
        <center>
            <br>
            <div class="rect">
                <text class="ftxt">feed</text>
                <br>
                <div class="profile" style="float: left; background-color: white;">
                    <?php
                        if (!isset($_COOKIE["pissdata"])) {
                            echo "<h2>ur not logged in</h2><br><a href='/login.php'>login </a><a href='/register.php'>register</a>";
                            return;
                        } else {
                            $user = getname();
                            $pass = getpass();
                            $uuid = getuuid();

                            if (checkuuid($user, $uuid) == true) {
                                echo "<h2>henlo $user</h2>";
                            } else {
                                echo "<h2>invalid cookies, go re-login</h2>";
                                return;
                            };
                        };
                    ?>
                    <?php echo "<img src='/imgs/avatars/$user.png'>"; ?>
                    <br>
                    <a href="">profile</a>
                </div>
            </div>
            <div class="rect2" style="background: #eaeaea;">
                <?php
                    fetchfeed();
                ?>
            </div>
            <form method="POST">
                <div class="rect">
                    <input name="feedtitle">
                    <button type="submit">send</button>
                </div>
            </form>

            <?php
                if (isset($_POST["feedtitle"])) {
                    $feedtitle = $_POST["feedtitle"];
                    postfeed($user, $feedtitle);
                };
            ?>
        </center>
    </body>
</html>