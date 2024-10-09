<?php

require_once('pripojenie.php');

$filmy_id = $_GET['id'];

$query = "SELECT * from filmy where filmy_id=$filmy_id";
$sql_predmet = MySQLi_Query($con, $query);
if (!$sql_predmet):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    $row = mysqli_fetch_array($sql_predmet, MYSQLI_ASSOC);
    $nazov = $row["Nazov"];
    $popis = $row["Popis"];
    $rok = $row["Rok"];
    $zanre = $row["Zaner"];
    $obrazok = $row["Obrazok"];
    $cena = $row["Cena"];
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vypožičať</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2>
            <?php echo 'Požičať: ' . $nazov ?>
            <h2>
                <ul class="navbar">
                    <li><a href="MainPage.php">Domov</a></li>
                    <li><a href="Zoznam_filmov.php">Zoznam Filmov</a></li>
                    <li><a href="Zoznam_pozicanych.php">Zoznam požičaných</a></li>
                </ul>
    </header>
    <div class="column">
        <div class="header">
            <h3>
                <?php echo 'Formulár pre požičanie filmu: ' . $nazov ?>
            </h3>
        </div>
        <form method="get" name="form4" action="pozicatF.php">
            <input type="text" id="Meno" name="Meno" placeholder="Meno">
            <input type="text" id="Priezvisko" name="Priezvisko" placeholder="Priezvisko">
            <input type="Submit" name="Submit_button" value="Požičať" style="margin-left:140px;">
            <input type="hidden" name="filmy_id" value="<?php echo $filmy_id; ?>">
        </form>
        <?php echo '<a href="info.php?id=' . $filmy_id . '"><img src="back_button.png" alt="Sipka_späť"></a>' ?>
    </div>
</body>

</html>