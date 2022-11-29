<?php
include 'connect.php';

// Include The Important Files
include 'tmp/functions.php';
include 'tmp/head.php';

//Include Navbar On All Pages Execpt The One With $noNavbar Variable

if (!isset($noNavbar)) {
    include 'tmp/navbar.php';
}