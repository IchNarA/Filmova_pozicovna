<?php
require_once('pripojenie.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pridať</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2>Pridať film</h2>
        <ul class="navbar">
            <li><a href="MainPage.php">Domov</a></li>
            <li><a href="Zoznam_filmov.php">Zoznam Filmov</a></li>
            <li><a href="Zoznam_pozicanych.php">Zoznam požičaných</a></li>
        </ul>
    </header>
    <div class="column">
        <div class="header">
            <h3>Formulár pre pridanie požičajúceho</h3>
        </div>
        <form method="get" name="form5" action="insP.php">
            <input type="text" id="meno" name="meno" placeholder="Meno" required>
            <input type="text" id="priezvisko" name="priezvisko" placeholder="Priezvisko" required>
            <select name="film_id" id="film_id" required>
                <option value="" disabled selected>Vybrať film</option>
                <?php
                $query_filmy = "SELECT filmy_id, Nazov FROM filmy";
                $sql_filmy = mysqli_query($con, $query_filmy);
                if ($sql_filmy) {
                    while ($row = mysqli_fetch_array($sql_filmy)) {
                        $filmy_id = $row["filmy_id"];
                        $nazov = $row['Nazov'];
                        echo "<option value='$filmy_id'>$nazov</option>";
                    }
                } else {
                    echo "Chyba pri načítaní filmov";
                }
                ?>
            </select>
            <input type="Submit" name="Submit_button" value="Pridať" style="margin-left:140px;">
        </form>
        <a href="Zoznam_pozicanych.php"><img src="back_button.png" alt="Sipka_späť"></a>
    </div>
</body>

</html>