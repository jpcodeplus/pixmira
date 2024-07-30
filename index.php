<?php
include __DIR__ . '/fx.php';
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixmira</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="main-header">
        <h1>Pixmira</h1>
        <button>Filter</button>
    </header>


    <div class="filter box">
        <?php

        $categories = getUniqueSortedCategories($data);
        foreach ($categories as $category) {
            echo $category . "<br>";
        }

        ?>
    </div>


    <div class="cards">
        <?php
        // Generiere das HTML
        foreach ($data as $item) {
            echo '
            <div class="card '.sanitizeString($item['category']).'">
                <div class="info">
                    <span class="card-date">' . htmlspecialchars($item['date']) . '</span>
                    <span class="category c-1">' . htmlspecialchars($item['category']) . '</span>
                </div>
                <h2>' . htmlspecialchars($item['title']) . '</h2>
                <a class="möööö" href="' . htmlspecialchars($item['link']) . '">Mööööö!!!!</a>
            </div>';
        }
        ?>
    </div>
</body>

</html>