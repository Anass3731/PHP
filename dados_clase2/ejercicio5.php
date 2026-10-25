<?php 
$caras = [
    1 => ['nombre' => 'Uno', 'imagen' => 'img/dado_1.svg', 'mensaje' => '¡Unidad inicial, el punto de partida!'],
    2 => ['nombre' => 'Dos', 'imagen' => 'img/dado_2.svg', 'mensaje' => '¡Par y simétrico!'],
    3 => ['nombre' => 'Tres', 'imagen' => 'img/dado_3.svg', 'mensaje' => '¡Impar con buena energía!'],
    4 => ['nombre' => 'Cuatro', 'imagen' => 'img/dado_4.svg', 'mensaje' => '¡Un número par y equilibrado! '],
    5 => ['nombre' => 'Cinco', 'imagen' => 'img/dado_5.svg', 'mensaje' => '¡Impar y dinámico!'],
    6 => ['nombre' => 'Seis', 'imagen' => 'img/dado_6.svg', 'mensaje' => '¡La puntuación máxima, excelente!'],
];

$numero = rand(1, 6);
$resultado = $caras[$numero];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php require 'includes/navbar.php'; ?> 
    
    <main class="contenedor">
        <h1>Ejercicio 5 — Diccionario de dados</h1>

        <p>Has sacado un <?php echo $resultado['nombre']; ?></p>
        <img src="<?php echo $resultado['imagen']; ?>" width="80" alt="Dado">
        <p><?php echo $resultado['mensaje']; ?></p>

        <br>
        <a href="ejercicio5.php" class="boton">Volver a tirar</a>

        <hr>

        <h3>Todas las caras</h3>
        <table border="1">
            <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th>Mensaje</th>
            </tr>
            <?php foreach ($caras as $key => $datos): ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $datos['nombre']; ?></td>
                    <td><?php echo $datos['mensaje']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>
</html>