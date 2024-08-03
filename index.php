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
        <h1>PixMira <span class="flicker">- #NoAfD</span></h1>
        <button id="filterButton">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path fill="#fff" fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Zm3 5a1 1 0 0 1 1-1h10a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm3 5a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
            </svg>

        </button>
    </header>


    <div class="filter hidden" id="filterDiv">
        <div class="box filter-links">
            <?php
            $categories = getUniqueSortedCategories($data);
            foreach ($categories as $category) {
                echo '<button data-filter="' . sanitizeString($category) . '">' . $category . '</button>';
            }
            ?>
        </div>
    </div>

    <div class="filterdby">
        <div class="box "></div>
    </div>


    <div class="cards">
        <?php
        foreach ($data as $item) {
            echo '
            <div class="card ' . sanitizeString($item['category']) . '">
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

    <script src="./script.js"></script>

</body>

</html>