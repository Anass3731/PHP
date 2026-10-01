<?php

//aleatorio en 1 y 6
$numero_dado = rand(1,6);
$ruta_imagen = "img/dado_".$numero_dado.".svg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=º, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  require"includes/navbar.php"; ?>

    <h1>Tirada de dados<h1>
        <?php
        echo "Tirada del dado : $numero_dado";
        ?>

    <img src=<?php echo $ruta_imagen;?> alt"Dado <?php echo $numero_dado; ?>">
    <a href="ejercicio1.php" class="boton"> Volver a tirar </a>

    </body>
</html>