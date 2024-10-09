<?php
require_once('pripojenie.php');


$zaznamy_na_stranku = 14;


$stranka = isset($_GET['stranka']) ? $_GET['stranka'] : 1;


$offset = ($stranka - 1) * $zaznamy_na_stranku;

if (isset($_GET['vyhladavanieButton'])) {
    $search = $_GET['vyhladavanie'];
    $query = "SELECT * FROM filmy WHERE Nazov LIKE '%$search%' ORDER BY Nazov ASC LIMIT $zaznamy_na_stranku OFFSET $offset";
} else {
    $query = "SELECT * FROM filmy ORDER BY Nazov ASC LIMIT $zaznamy_na_stranku OFFSET $offset";
}

$sql = mysqli_query($con, $query);

if (!$sql) {
    echo "Doslo k chybe pri vykonavani SQL dotazu!";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Zoznam Filmov</title>
    </head>

    <body>
        <header>
            <h2>Zoznam Filmov<h2>
                    <ul class="navbar">
                        <li><a href="MainPage.php">Domov</a></li>
                        <li><a href="Zoznam_filmov.php">Zoznam Filmov</a></li>
                        <li><a href="Zoznam_pozicanych.php">Zoznam požičaných</a></li>
                    </ul>
        </header>
        <div class="Filmy">
            <form action="Zoznam_filmov.php" method="GET">
                <div class="vyhladavanie_sekcia">
                    <input type="text" id="vyhladavanie" name="vyhladavanie" placeholder="Vyhľadávať">
                    <button id="vyhladavanieButton" type="submit" name="vyhladavanieButton">Vyhľadať</button>
                    <a href="newF.php"><button type="button" id="pridatButton">Pridať</button></a>
                </div>
            </form>
            <div class="zoznam_obrazky">
                <?php
                while ($row = mysqli_fetch_assoc($sql)) {
                    $id = $row['filmy_id'];
                    $obrazok = $row['Obrazok'];
                    $nazov = $row['Nazov'];

                    echo '<div class="film">';
                    echo '<a href="info.php?id=' . $id . '"><img src="' . $obrazok . '" alt="' . $nazov . '"></a>';
                    echo '<p class="nazov_filmu">' . $nazov . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="strankovanie">
                <?php
                $celkovy_pocet_zaznamov_query = isset($search) ? "SELECT COUNT(*) AS pocet FROM filmy WHERE Nazov LIKE '%$search%'" : "SELECT COUNT(*) AS pocet FROM filmy";
                $pocet_sql = mysqli_query($con, $celkovy_pocet_zaznamov_query);
                $pocet_zaznamov = mysqli_fetch_assoc($pocet_sql)['pocet'];

                $celkovy_pocet_stranok = ceil($pocet_zaznamov / $zaznamy_na_stranku);



                if ($stranka > 1) {
                    $predchadzajuca_stranka = $stranka - 1;
                    echo "<a href='Zoznam_filmov.php?stranka=$predchadzajuca_stranka' class='sipka'>&#10094</a> ";
                }

                if ($stranka < $celkovy_pocet_stranok) {
                    $nasledujuca_stranka = $stranka + 1;
                    echo "<a href='Zoznam_filmov.php?stranka=$nasledujuca_stranka' class='sipka'>&#10095</a> ";
                }
                ?>
            </div>
        </div>
    </body>

    </html>
    <?php
}
?>