<?php

$ServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "loginsystem";

$conn = mysqli_connect($ServerName, $dbUserName, $dbPassword, $dbName);


if (!$conn) {
    die("Connection failed: " . mysql_connect_eror());
}