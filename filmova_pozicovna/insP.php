<?php
require_once('pripojenie.php');


$meno = $_GET["meno"];
$priezvisko = $_GET["priezvisko"];
$film_id = $_GET["film_id"];


$query = "INSERT INTO zoznam_pozicanych VALUES(null,$film_id,'$meno','$priezvisko',CURRENT_TIMESTAMP())";
$sql = MySQLi_Query($con, $query);
if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    ?>
    <meta http-equiv="refresh" content="0 Zoznam_pozicanych.php">
    <?php
endif;
?>