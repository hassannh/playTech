<?php

$myserver = 'mysql:host=localhost;dbname=playtech';
$user = 'root';
$pass = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    //PDO (PHP Data Objects)
);

try { //try to connect with db
    //start new connection with PDO class
    $con = new PDO($myserver, $user, $pass, $option);
    //connect data with db
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'failed' . $e->getMessage();
}