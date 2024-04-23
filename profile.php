<?php
    // thing to render profiles

    include(__DIR__ . '/includes/header.php');
    include(__DIR__ . '/includes/profiles.php');
    include(__DIR__ . '/includes/style.php');

?>

<html>
    <head>
        <title>pisshills - profile</title>
    </head>
    <body><br>
        <center>
            <div class="rect">
                <text class="ftxt">user feed</text>
                <br>
                <div class="profile" style="float: left; background-color: white;">
                    <?php
                        if (!isset($_GET["profile"])) {
                            echo "<h2>cannot render profile, _get['profile'] is missing</h2>";
                            return;
                        } else {
                            $user = htmlentities($_GET["profile"]);
                            if (checkAvaliable($user) == true) {
                                echo "<h2>cannot render profile, user doesn't exist</h2>";
                                return;
                            };

                            echo "<h2>$user</h2>";
                        };
                    ?>
                    <?php echo "<img src='/imgs/avatars/$user.png'>"; ?><br><br>
                </div>
            </div>
            <div class="rect2" style="background: #eaeaea;">
                <?php
                    getuserfeed($_GET["profile"]);
                ?>
            </div>
        </center>
    </body>
</html>