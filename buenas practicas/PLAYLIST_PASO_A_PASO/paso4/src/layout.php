<?php 

//LAYOUT -> PLANTILLA
declare(strict_types=1);
function renderHeader(string $title): void
 {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= e($title) ?> | Mi playList</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <header>
        <nav>
            <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="sobre.php"></a>Sobre mi</li>
            </ul>
        </nav>

    </header>
    <main>
 <?php 
}


function renderFooter(): void
    {
    ?>
    </main>
    <footer>
        Proven
    </footer>

    </body>
    </html>

    <?php 
}
?>