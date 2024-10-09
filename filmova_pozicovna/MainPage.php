<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Filmová požičovňa</title>
</head>

<body>
    <header>
        <h2>FilmováPožičovňa<h2>
                <ul class="navbar">
                    <li><a href="MainPage.php">Domov</a></li>
                    <li><a href="Zoznam_filmov.php">Zoznam Filmov</a></li>
                    <li><a href="Zoznam_pozicanych.php">Zoznam požičaných</a></li>
                </ul>
    </header>
    <div class="titulne_obrazky">
        <div class="obrazky-container">
            <img src="titulny_obrazok_1.jpg" alt="Spider-man" id="Image">
            <div class="text-top-left">Novinky</div>
            <div class="text-bottom-right">IT - Denis Hrica</div>
        </div>
        <span class="prev" onclick="changeImage('prev')">&#10094;</span>
        <span class="next" onclick="changeImage('next')">&#10095;</span>
    </div>

    <script>
        let imageIndex = 1;
        const totalImages = 3;
        function changeImage(direction) {
            const Image = document.getElementById('Image');
            if (direction == 'next') {
                imageIndex = (imageIndex % totalImages) + 1;
            } else if (direction == 'prev') {
                imageIndex = (imageIndex - 1 + totalImages) % totalImages || totalImages;
            }
            Image.src = `titulny_obrazok_${imageIndex}.jpg`;
        }
    </script>
    </div>
</body>

</html>