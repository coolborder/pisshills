<?php

// haha i stole this from w3skools

$servername = 'localhost:3306';
$username = 'root';
$password = '';
$db = 'pisshills';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    return;
}

?>