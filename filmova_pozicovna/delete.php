<?php
require_once('spojenie.php');

$id = $_GET['id'];

$query = "SELECT * from zoznam_futbalistov where id=$id";
$sql_predmet = MySQLi_Query($con, $query);
if (!$sql_predmet):
    echo "Doslo k chybe pri vytvarani SQL dotazu 1 !";
else:
    $row = mysqli_fetch_array($sql_predmet, MYSQLI_ASSOC);
    $meno = $row["Meno"];
    $priezvisko = $row["Priezvisko"];
    $plat = $row["Plat"];
    $pozicia = $row["Pozicia"];
endif;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vymazať</title>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vymazať</title>
</head>

<body>
    <header>

        <h2>
            <?php echo 'Vymazanie: ' . $meno . ' ' . $priezvisko; ?>
        </h2>
    </header>

    <div class="delete-bar">
        <div class="center-content">
            <a href=<?php echo 'Futbalisti.php' ?>><img src="back_button.png" alt="Šípka späť" class="back-button"></a>
            <h2>
                <?php echo 'Naozaj chceš vymazať: ' . $meno . ' ' . $priezvisko . ' ?' ?>
            </h2>
            <p style="color:red;">Upozorňujem, že sa to nebude dať vrátiť späť</p>
            <form method="get" name="form7" action="delete_confirm.php">
                <button type="submit" name="deleteButton" class="delete-button"
                    style="margin-top:20px;">Vymazať</button>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </form>
        </div>
    </div>
</body>

</html>