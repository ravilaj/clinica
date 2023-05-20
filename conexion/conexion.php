<?php
$host = "localhost";
$user = "admin";
$pass = "admin";

try {

    $conn = new PDO("mysql:host=$host;dbname=centro1", $user, $pass, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $conn -> exec ("set names utf8");

} catch (PDOException $f) {
    echo $f -> getMessage();
}

?>
