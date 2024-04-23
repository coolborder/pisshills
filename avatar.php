<?php

// info: avatar page

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
                <text class="ftxt" style="left: 300px;">inventory</text>
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
                    <br>
                </div>
            </div>
            <div class="rect2" style="background: #eaeaea; height: 580px; text-align: left;">
                <div class="invItem">
                    <img src="/imgs/accesories/hat.png"><br>
                    <a href="/includes/profiles.php?equipItem=hat.png">hat</a>
                </div><br>
                <div class="invItem">
                    <img src="/imgs/accesories/penjoyer.png"><br>
                    <a href="/includes/profiles.php?equipItem=penjoyer.png">piss enjoyer</a>
                </div><br>
                <div class="invItem">
                    <img src="/imgs/accesories/soul.png"><br>
                    <a href="/includes/profiles.php?equipItem=soul.png">soul</a>
                </div><br>
            </div>
        </center>
    </body>
</html>