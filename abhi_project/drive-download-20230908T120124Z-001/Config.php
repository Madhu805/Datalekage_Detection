<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'dataleker';
$dbC = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)
        or die('Error Connecting to MySQL DataBase');
?>
