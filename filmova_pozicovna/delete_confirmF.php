<?php
require_once('pripojenie.php');


$id = $_GET['filmy_id'];


$query = "DELETE FROM filmy WHERE filmy_id=$id";


$sql_predmet = mysqli_query($con, $query);

if (!$sql_predmet):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    ?>
    <meta http-equiv="refresh" content="0 Zoznam_filmov.php">
    <?php
endif;
?>