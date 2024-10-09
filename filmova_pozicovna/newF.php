<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
            <h3>Formulár pre pridanie filmu</h3>
        </div>
        <form method="get" name="form1" action="insF.php">
            <input type="text" id="nazov" name="nazov" placeholder="Názov filmu" required>
            <input type="text" id="popis" name="popis" placeholder="Popis filmu" required>
            <input type="number" id="rok" name="rok" min="1800" max="2023" placeholder="Rok" required>
            <input type="number" id="cena" name="cena" min="1" max="1000" placeholder="Cena" step="0.01" required>
            <input type="text" id="obrazok" name="obrazok" placeholder="Link na obrazok" required>
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
                    <input type="Submit" name="Submit_button" value="Pridať">
                </div>
            </div>
        </form>
        <a href="Zoznam_filmov.php"><img src="back_button.png" alt="Sipka_späť"></a>
    </div>

</body>

</html>