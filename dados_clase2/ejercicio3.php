
<?php 


$tiradas = [];
$suma_total = 0;
$mensaje = "";

for ($i=0; $i<=1; $i++) { 
    $numero_dado = rand(1,6);
    $tiradas[$i] = $numero_dado;
    $suma_total = $suma_total + $numero_dado;
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 — Dado doble</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php require 'includes/navbar.php'; ?> 
    <h3>tirada doble</h3>


    
<main class="contenedor">
        

        <?php foreach ($tiradas as $tirada) {
         $ruta_imagen = "img/dado_".$tirada.".svg";
         echo "<img src = '$ruta_imagen' alt='Dado $tirada'>" ;
        }
         ?>

         <p>Suma total de las tiradas -> <?php echo $suma_total ?></p>
    
    <?php 
    
        if ($suma_total == 2) {
            $mensaje = "<p class='mensaje-tirada-minima'>Has tirado la minima</p>";
        } elseif ($suma_total == 12) {
            $mensaje = "<p class='mensaje-tirada-maxima'>Has tirado la maxima</p>";
        }
        echo $mensaje;
    ?>
    <a href="ejercicio3.php" class="boton">🔄 Volver a tirar</a>
</main>
   
</body>
</html>