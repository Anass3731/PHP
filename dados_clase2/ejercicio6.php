<?php 

$marcador = [
    'Ana' => 0, 
    'Luis' => 0, 
    'Marta' => 0
];


for ($i = 1; $i <= 5; $i++) {
    foreach ($marcador as $jugador => $puntos) {
        $tirada = rand(1, 6);
        $marcador[$jugador] += $tirada; 
    }
}


arsort($marcador);

$ganador = array_key_first($marcador);
$nombres = array_keys($marcador);
$puntuaciones = array_values($marcador);

$empate = false;
if ($puntuaciones[0] === $puntuaciones[1]) {
    $empate = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 — Marcador</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php require 'includes/navbar.php'; ?> 
    
    <main class="contenedor">
        <h1>Ejercicio 6 — Marcador de jugadores</h1>

        <?php if ($empate): ?>
            <p><strong>¡Ha habido un empate en la primera posición!</strong></p>
        <?php else: ?>
            <p><strong>El ganador es: <?php echo $ganador; ?></strong></p>
        <?php endif; ?>

        <table border="1">
            <tr>
                <th>Jugador</th>
                <th>Puntos totales</th>
            </tr>
            <?php foreach ($marcador as $jugador => $puntos): ?>
                <tr>
                    <td><?php echo $jugador; ?></td>
                    <td><?php echo $puntos; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <a href="ejercicio6.php" class="boton">🔄 Volver a tirar</a>
    </main>
</body>
</html>