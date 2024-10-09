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
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

    ?>
    <header>

        <h2>
            <?php echo 'Upraviť film: ' . $nazov; ?>
        </h2>
        <ul class="navbar">
            <li><a href="MainPage.php">Domov</a></li>
            <li><a href="Zoznam_filmov.php">Zoznam Filmov</a></li>
            <li><a href="Zoznam_pozicanych.php">Zoznam požičaných</a></li>
        </ul>
    </header>
    <div class="column">
        <div class="header">
            <h3>Formulár pre upravenie filmu</h3>
        </div>
        <form method="get" name="form2" action="upF.php">
            <input type="text" id="nazov" name="Nazov" placeholder="Názov filmu" required>
            <input type="text" id="popis" name="Popis" placeholder="Popis filmu" required>
            <input type="number" id="rok" name="Rok" min="1800" max="2023" placeholder="Rok" required>
            <input type="number" id="cena" name="Cena" min="1" max="1000" placeholder="Cena" step="0.01" required>
            <input type="text" id="obrazok" name="Obrazok" placeholder="Link na obrazok" required>
            <label for="zanre">Žánre:</label>
            <div clas="checkbox-container" id="zanre">
                <div class="checkbox-group">
                    <label>
                        <input id="zaner1" type="checkbox" name="zaner[]" value="Akčný"> Akčný
                    </label>
                    <label>
                        <input id="zaner2" type="checkbox" name="zaner[]" value="Komédia"> Komédia
                    </label>
                    <label>
                        <input id="zaner3" type="checkbox" name="zaner[]" value="Dráma"> Dráma
                    </label>
                    <label>
                        <input id="zaner4" type="checkbox" name="zaner[]" value="Sci-Fi"> Sci-fi
                    </label>
                    <label>
                        <input id="zaner5" type="checkbox" name="zaner[]" value="Thriller"> Thriller
                    </label>
                    <label>
                        <input id="zaner6" type="checkbox" name="zaner[]" value="Historický"> Historicky
                    </label>
                    <label>
                        <input id="zaner7" type="checkbox" name="zaner[]" value="Dobrodružný"> Dobrodružný
                    </label>
                    <label>
                        <input id="zaner8" type="checkbox" name="zaner[]" value="Fantasy"> Fantasy
                    </label>
                    <label>
                        <input id="zaner9" type="checkbox" name="zaner[]" value="Životopisný"> Životopisný
                    </label>
                    <label>
                        <input id="zaner10" type="checkbox" name="zaner[]" value="Animovaný"> Animovaný
                    </label>
                    <input type="Submit" name="Submit_button" value="Upraviť">
                </div>
            </div>
            <input type="hidden" name="filmy_id" value="<?php echo $filmy_id; ?>">
        </form>
        <?php echo '<a href="info.php?id=' . $filmy_id . '"><img src="back_button.png" alt="Sipka_späť"></a>' ?>
    </div>
</body>

</html>