<?php
require_once('pripojenie.php');
$zaznamy_na_stranku = 8;
$stranka = isset($_GET['stranka']) ? $_GET['stranka'] : 1;
$offset = ($stranka - 1) * $zaznamy_na_stranku;
if (isset($_GET['vyhladavanieButton'])) {
    $search = $_GET['vyhladavanie'];
    $query = "SELECT * from zoznam_pozicanych WHERE Meno LIKE '%$search%' ORDER BY Meno ASC LIMIT $zaznamy_na_stranku OFFSET $offset";
} else {
    $query = "SELECT * FROM zoznam_pozicanych ORDER BY Meno ASC LIMIT $zaznamy_na_stranku OFFSET $offset";
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
        <title>Zoznam požičaných</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <h2>Zoznam Požičaných</h2>
            <ul class="navbar">
                <li><a href="MainPage.php">Domov</a></li>
                <li><a href="Zoznam_filmov.php">Zoznam Filmov</a></li>
                <li><a href="Zoznam_pozicanych.php">Zoznam požičaných</a></li>
            </ul>
        </header>
        <div class="Pozadie">
            <img src="pozadie.jpg" alt="Pozadie" class="Rozmazane_pozadie">
            <div class="Zoznam_pozicanych_tabulka">
                <<form action="Zoznam_pozicanych.php" method="GET">
                    <div class="vyhladavanie_sekcia">
                        <input type="text" id="vyhladavanie" name="vyhladavanie" placeholder="Vyhľadávať">
                        <button id="vyhladavanieButton" type="submit" name="vyhladavanieButton">Vyhľadať</button>
                        <a href="newP.php"><button type="button" id="pridatButton">Pridať</button></a>
                    </div>
                    </form>

                    <table class="Zoznam_pozicanych">
                        <thead>
                            <tr>
                                <th>Meno</th>
                                <th>Priezvisko</th>
                                <th>Názov filmu</th>
                                <th>Dátum požičania</th>
                                <th>Upraviť</th>
                                <th>Zmazať</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($sql)) {
                                $id = $row["ID"];
                                $filmy_id = $row["filmy_id"];
                                $meno = $row["Meno"];
                                $priezvisko = $row["Priezvisko"];
                                $datum = $row["Kedy"];

                                $sql2 = mysqli_query($con, "SELECT * FROM filmy WHERE filmy_id=$filmy_id");

                                if (!$sql2) {
                                    echo "Doslo k chybe pri vykonavani SQL dotazu!";
                                } else {
                                    while ($row2 = mysqli_fetch_array($sql2)) {
                                        $nazov = $row2["Nazov"];

                                        echo "<tr>";
                                        echo "<td>$meno</td>";
                                        echo "<td>$priezvisko</td>";
                                        echo "<td>$nazov</td>";
                                        echo "<td>$datum</td>";
                                        echo '<td><a href="editP.php?id=' . $id . '"><img src="Btn_edit.png" class="edit_btn normal"></a></td>';
                                        echo '<td><a href="deleteP.php?id=' . $id . '"><img src="Btn_drop.png" class="delete_btn normal"></a></td>';
                                        echo "</tr>";
                                    }
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                    <div class="strankovanie">
                        <?php
                        $celkovy_pocet_zaznamov_query = isset($search) ? "SELECT COUNT(*) AS pocet FROM zoznam_pozicanych WHERE Meno LIKE '%$search%'" : "SELECT COUNT(*) AS pocet FROM zoznam_pozicanych";
                        $pocet_sql = mysqli_query($con, $celkovy_pocet_zaznamov_query);
                        $pocet_zaznamov = mysqli_fetch_assoc($pocet_sql)['pocet'];

                        $celkovy_pocet_stranok = ceil($pocet_zaznamov / $zaznamy_na_stranku);



                        if ($stranka > 1) {
                            $predchadzajuca_stranka = $stranka - 1;
                            echo "<a href='Zoznam_pozicanych.php?stranka=$predchadzajuca_stranka' class='sipka2'>&#10094</a> ";
                        }

                        if ($stranka < $celkovy_pocet_stranok) {
                            $nasledujuca_stranka = $stranka + 1;
                            echo "<a href='Zoznam_pozicanych.php?stranka=$nasledujuca_stranka' class='sipka2'>&#10095</a> ";
                        }
                        ?>
                    </div>

            </div>

        </div>

    </body>

    </html>
    <?php
}
?>