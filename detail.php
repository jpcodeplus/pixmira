<?php
include __DIR__ . '/code/app.php';
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
        <h1 class="header">
            <a href="index.php" class="back">
                <svg viewBox="0 0 472.62 472.62">
                    <path d="M167.16 117.31V39.94L0 193.62 167.16 347.3v-68.56c200.34 0 299.43 153.93 299.43 153.93a317.8 317.8 0 0 0 6.03-61.73c0-174.65-130.82-253.63-305.46-253.63z" />
                </svg>
            </a>
            PixMira <span class="flicker">- #NoAfD</span>
        </h1>
    </header>

    <div class="details">
        <?php
        if (isset($_GET['page'])) {
            $content = ContentFetcher::getContent($_GET['page']);
            echo $content ? $content : 'Keinen Inhalt gefunden!';
        } else {
            echo 'Keinen Inhalt gefunden!';
        }
        ?>
    </div>

</body>

</html>
