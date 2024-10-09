<?php
require_once('pripojenie.php');
$id = $_GET["filmy_id"];
$meno = $_GET['Meno'];
$priezvisko = $_GET['Priezvisko'];




$sql = MySQLi_Query($con, "INSERT INTO zoznam_pozicanych VALUES (null,$id,'$meno','$priezvisko',CURRENT_TIMESTAMP())");
if (!$sql):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    ?>
    <meta http-equiv="refresh" content="0 Zoznam_filmov.php">
    <?php
endif;
?>