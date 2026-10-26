<?php 
declare(strict_types=1);
require_once __DIR__ . '/src/helpers.php';
require_once __DIR__ . '/src/components.php';


$songs = require __DIR__ . '/data/songs.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi playlist</title>
</head>
<body>


<nav><a href="index.php">Inicio</a> | <a href="sobre.php">Sobre mi</a></nav>
    <h1>MI PLAYLIST</h1>
    <?php echo renderSongList($songs) ?> 

    <footer>proven</footer>
</body>
</html>