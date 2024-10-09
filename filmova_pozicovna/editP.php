<?php
require_once('pripojenie.php');

$id = $_GET['id'];

$query = "SELECT * from zoznam_pozicanych where ID=$id";
$sql_predmet = MySQLi_Query($con, $query);
if (!$sql_predmet):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    $row = mysqli_fetch_array($sql_predmet, MYSQLI_ASSOC);
    $meno = $row["Meno"];
    $priezvisko = $row["Priezvisko"];
    $datum = $row["Kedy"];
    $filmy_id = $row["filmy_id"];
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
    <header>

        <h2>
            <?php echo 'Upraviť: ' . $meno; ?>
        </h2>
        <ul class="navbar">
            <li><a href="MainPage.php">Domov</a></li>
            <li><a href="Zoznam_filmov.php">Zoznam Filmov</a></li>
            <li><a href="Zoznam_pozicanych.php">Zoznam požičaných</a></li>
        </ul>
    </header>
    <div class="column">
        <div class="header">
            <h3>Formulár pre upravenie</h3>
        </div>
        <form method="get" name="form6" action="upP.php">
            <input type="text" id="nazov" name="Meno" placeholder="Meno" required>
            <input type="text" id="popis" name="Priezvisko" placeholder="Priezvisko" required>
            <input type="date" id="datum" name="datum" placeholder="Datum" required>
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
                <input type="Submit" name="Submit_button" value="Upraviť" style="margin-left:140px;">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
        <?php echo '<a href="Zoznam_pozicanych.php"><img src="back_button.png" alt="Sipka_späť"></a>' ?>
</body>

</html>