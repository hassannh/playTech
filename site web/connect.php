<?php
// connect data base with website
$dsn = 'mysql:host=localhost;dbname=playtech';
$user = 'root';
$pass = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    //check if data base there
    $con = new PDO($dsn, $user, $pass, $option);
    //connect data with data base
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'failed' . $e->getMessage();
}
