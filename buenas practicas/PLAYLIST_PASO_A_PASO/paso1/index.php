<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    
    <h1>Mi playlist</h1>
<header>
<nav><a href="index.php">Inicio</a> | <a href="sobre.php">Sobre mi</a></nav>
</header>

<main> 

 <?php 
    $songs = ['Bombo', 'Leto', 'Neu', 'Fiu Fiu'];
    foreach ($songs as $song) {
        echo '<p>' . $song . '</p>';
    }
    ?> 
</main>
   
    
    <footer>proven</footer>
</body>
</html>