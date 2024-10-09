<?php
require_once('pripojenie.php');

$nazov = $_GET['nazov'];
$popis = $_GET['popis'];
$rok = $_GET['rok'];
$cena = $_GET['cena'];
$obrazok = $_GET['obrazok'];
$zanre = implode("/", $_GET['zaner']);




$sql = MySQLi_Query($con, "INSERT INTO filmy VALUES (null,'$nazov','$zanre',$rok,'$popis',$cena,'$obrazok')");
if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    ?>
    <meta http-equiv="refresh" content="0 Zoznam_filmov.php">
    <?php
endif;
?>