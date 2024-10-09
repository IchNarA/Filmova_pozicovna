<?php
require_once('pripojenie.php');


$id = $_GET['filmy_id'];
$nazov = $_GET['Nazov'];
$popis = $_GET['Popis'];
$rok = $_GET['Rok'];
$zanre = implode("/", $_GET['zaner']);
$obrazok = $_GET['Obrazok'];
$cena = $_GET['Cena'];


$query = "UPDATE filmy SET nazov='$nazov', zaner='$zanre', rok=$rok, popis='$popis', cena=$cena, obrazok='$obrazok' WHERE filmy_id=$id";


$sql_predmet = mysqli_query($con, $query);

if (!$sql_predmet):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    ?>
    <meta http-equiv="refresh" content="0 info.php?id=" .$id>
    <?php
endif;
?>