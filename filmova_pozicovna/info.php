<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


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

    echo '<div class="film">';
    echo '<div class="buttons-above-image">';
    echo '<a href="editF.php?id=' . $filmy_id . '"><button class="edit-button">Upraviť</button></a>';
    echo '<a href="deleteF.php?id=' . $filmy_id . '"><button class="delete-button">Zmazať</button></a>';
    echo '</div>';
    echo '<img src="' . $obrazok . '" alt="' . $nazov . '">';
    echo '<p class="nazov_filmu">' . $nazov . '</p>';
    echo '<p class="zanre_filmu">Žánre: ' . $zanre . '</p>';
    echo '<p class="zanre_filmu">Rok vydania: ' . $rok . '</p>';
    echo '<p class="zanre_filmu">Cena požičania: ' . $cena . ' €' . '</p>';
    echo '<p class="popis_filmu">' . 'Popis: ' . $popis . '</p>';
    echo '<a href="pozicat.php?id=' . $filmy_id . '"><button class="pozicat-button">Požičať</button></a>';
    echo '</div>';
    echo '<a href="Zoznam_filmov.php"><img src="back_button.png" alt="Šípka späť" class="back-button"></a>';




    ?>
</body>

</html>