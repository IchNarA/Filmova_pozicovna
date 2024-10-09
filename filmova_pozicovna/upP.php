<?php
require_once('pripojenie.php');


$id = $_GET['id'];
$meno = $_GET['Meno'];
$priezvisko = $_GET['Priezvisko'];
$datum = $_GET['datum'];
$filmy_id = $_GET['film_id'];


$query = "UPDATE zoznam_pozicanych SET filmy_id=$filmy_id, Meno='$meno', Priezvisko='$priezvisko', Kedy='$datum'WHERE ID=$id";


$sql_predmet = mysqli_query($con, $query);

if (!$sql_predmet):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    ?>
    <meta http-equiv="refresh" content="0 Zoznam_pozicanych.php">
    <?php
endif;
?>