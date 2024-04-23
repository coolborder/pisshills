<?php

// info: basically a php script for all the profile related stuff
// deepcode ignore WebCookieSecureDisabledByDefault, deepcode ignore WebCookieHttpOnlyDisabledByDefault

function checkAvaliable($user) {
    try {
        include(__DIR__ . "../connectudumbfuck.php");

        $stmnt = $conn->prepare("SELECT * FROM `dumbasses` WHERE `user` = :user");
        $stmnt->bindParam(':user', $user);
        $stmnt->execute();
        $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC);
        
        if (empty($result)) {
            return true;
        } else {
            return false;
        };

    } catch (PDOException $e) {
        return;
    }
};

function fuckingregister($name, $pass) {
    try {
        include(__DIR__ . "../connectudumbfuck.php");

        $hash = password_hash(hash("gost", $pass), PASSWORD_DEFAULT);
        $uuid = strval(uniqid('$$', true)) . "-" . strval(random_int(-6942000000, 6942000000)) . "-" . strval(random_int(-4200000000, 4200000000));

        $stmnt = $conn->prepare('INSERT INTO `dumbasses`(`user`, `hashed_password`, `uuid`) VALUES (:username,:pass,:uuid)');
        $stmnt->bindParam(':username', $name);
        $stmnt->bindParam(':pass', $hash);
        $stmnt->bindParam(':uuid', $uuid);
        $stmnt->execute();

        $stmnt = $conn->prepare('INSERT INTO `avatardata`(`user`) VALUES (:username)');
        $stmnt->bindParam(':username', $name);
        $stmnt->execute();

        $pissdata = json_encode(array([
            "user" => $_POST["username"],
            "pass" => hash("gost", $pass),
            "uuid" => $uuid,
        ]));
        
        setcookie("pissdata", $pissdata, strtotime( '+69 days' ), "/", null); // funny numbers

        imageonimage("C:\xampp\htdocs\imgs\avatartemplate.png", "C:\xampp\htdocs\imgs\avatartemplate.png", "C:/xampp/htdocs/imgs/avatars/$user.png");
    } catch (PDOException $e) {
        // deepcode ignore ServerLeak
        echo "failed to register because <div class='fuckyou'>fuck you</div>";
    };
};

function check($name, $pass) {
    try {
        include(__DIR__ . "../connectudumbfuck.php");

        $stmnt = $conn->prepare("SELECT * FROM `dumbasses` WHERE `user` = :username; ");
        $stmnt->bindParam(':username', $name);
        $stmnt->execute();
        $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC);
        
        if (empty($result)) {
            return false;
        }

        foreach($result as $row) {
            $res = password_verify(hash("gost", $pass), $row["hashed_password"]);
        };

        if ($res) {
            return $res;
        };

    } catch (PDOException $e) {
        return;
    };
};

function checkuuid($user, $uuid) {
    try {
        include(__DIR__ . "../connectudumbfuck.php");

        $stmnt = $conn->prepare("SELECT * FROM `dumbasses` WHERE `user` = :user");
        $stmnt->bindParam(':user', $user);
        $stmnt->execute();
        $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC);
        
        if (empty($result)) {
            return false;
        }

        foreach($result as $row) {
            if ($row["uuid"] == $uuid) {
                return true;
            } else {
                return false;
            }
        }

    } catch (PDOException $e) {
        return;
    }
};

function postfeed($user, $text) {
    try {
        include(__DIR__ . "../connectudumbfuck.php");

        $stmnt = $conn->prepare("INSERT INTO `feed` (`user`, `text`) VALUES (:user, :text)");
        $stmnt->bindParam(':user', $user);
        $stmnt->bindParam(':text', $text);
        $stmnt->execute();

    } catch (PDOException $e) {
        return;
    }
};

function fetchfeed() {
    try {
        include(__DIR__ . "../connectudumbfuck.php");

        $stmnt = $conn->prepare("SELECT * FROM `feed` ORDER BY `feed`.`id` DESC LIMIT 5");
        $stmnt->execute();

        $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC);
        
        if (empty($result)) {
            return;
        }

        foreach($result as $row) {
            $txt = htmlspecialchars($row["text"]);
            $user = htmlspecialchars($row["user"]);
            echo "
            <div class='feedcontent' style='text-align: left;'>
                <img src='/imgs/avatars/$user.png' style='width: 50px; height:70px;'>
                <pre class='xtxt'>$txt</pre>
            </div><br>
            ";
        };

    } catch (PDOException $e) {
        return;
    }
};

function imageonimage($backgroundImagePath, $overlayImagePath, $outputPath) {
    $background = imagecreatefrompng($backgroundImagePath);
    $overlay = imagecreatefrompng($overlayImagePath);

    imagealphablending($background, true);
    imagesavealpha($background, true);

    $overlay_width = imagesx($overlay);
    $overlay_height = imagesy($overlay);

    $background_width = imagesx($background); // imagesex haha very funny
    $background_height = imagesy($background);

    $position_x = ($background_width - $overlay_width) / 2;
    $position_y = ($background_height - $overlay_height) / 2;

    imagecopy($background, $overlay, $position_x, $position_y, 0, 0, $overlay_width, $overlay_height);
    imagepng($background, $outputPath);

    imagedestroy($background);
    imagedestroy($overlay);
};

function getname() {
    $obj  = json_decode($_COOKIE["pissdata"], true);
    $user = htmlentities($obj[0]["user"]);
    return $user;
};

function getpass() {
    $obj  = json_decode($_COOKIE["pissdata"], true);
    $pass = htmlentities($obj[0]["pass"]);
    return $pass;
};

function getuuid() {
    $obj  = json_decode($_COOKIE["pissdata"], true);
    $uuid = htmlentities($obj[0]["uuid"]);
    return $uuid;
};

function equipItem($user, $item) {
    try {
        include(__DIR__ . "../connectudumbfuck.php");

        $stmnt = $conn->prepare("UPDATE `avatardata` SET `item` = :data WHERE `user` = :user; ");
        $stmnt->bindParam(':user', $user);
        $stmnt->bindParam(':data', $item);
        $stmnt->execute();

        imageonimage("C:/xampp/htdocs/imgs/avatartemplate.png", "C:/xampp/htdocs/imgs/accesories/$item", "C:/xampp/htdocs/imgs/avatars/$user.png");

    } catch (PDOException $e) {
        return;
    }
};

function unEquipItem($user) {
    try {
        include(__DIR__ . "../connectudumbfuck.php");

        $stmnt = $conn->prepare("UPDATE `avatardata` SET `item` = '' WHERE `user` = :user; ");
        $stmnt->bindParam(':user', $user);
        $stmnt->execute();

        imageonimage("C:/xampp/htdocs/imgs/avatartemplate.png", "C:/xampp/htdocs/imgs/avatartemplate.png", "C:/xampp/htdocs/imgs/avatars/$user.png");

    } catch (PDOException $e) {
        return;
    }
};

function getAvatarImage($user) {
    return "/imgs/avatars/$user.png";
}

if (isset($_GET["equipItem"]) and isset($_COOKIE["pissdata"])) {
    $item = $_GET["equipItem"];

    equipItem(getname(),$item);

    sleep(0.5);

    header("Location: /includes/profiles.php?redir=yes");
};

if (isset($_GET["redir"]) and isset($_COOKIE["pissdata"])) {
    echo "Redirecting back...";
    header("Location: /avatar.php");
};

?>