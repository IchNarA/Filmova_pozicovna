<?php
ob_start();
session_start();
date_default_timezone_set("Europe/Bratislava");

$host = "localhost";
$username = "root";
$password = "";
$database = "filmova_pozicovna";


$con = mysqli_connect($host, $username, $password, $database);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>