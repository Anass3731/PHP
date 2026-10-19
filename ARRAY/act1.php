<?php 
// Inicializamos la variable vacía para que no dé error en el valor del input al cargar la página
$numeroemails = '';
$mensaje_error = '';

$formularioenviado = isset($_POST['numeroemails']);

if ($formularioenviado) {
    $valor_recibido = $_POST['numeroemails'];

    // Comprobamos si lo ingresado es numérico
    if (is_numeric($valor_recibido)) {
        $numeroemails = (int)$valor_recibido;
    } else {
        $mensaje_error = "Por favor, introduce un valor numérico.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Uno</title>
    <style>
        table, th, td {
            border: 3px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Precio de un servicio de newsletter</h1>

    <table style="width:100%">
        <tr>
            <th>De</th>
            <th>A</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td>0</td>
            <td>2000</td>
            <td>0 €</td>
        </tr>
        <tr>
            <td>2001</td>
            <td>10000</td>
            <td>0.7 € unidad</td>
        </tr>
        <tr>
            <td>10001</td>
            <td>Infinito</td>
            <td>0.2 € unidad</td>
        </tr>
    </table>

    <br>

    <?php if (!empty($mensaje_error)): ?>
        <p style="color: red;"><?= $mensaje_error ?></p>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="numeroemails">Número de emails que enviarás:</label><br>
        <input type="number" id="numeroemails" name="numeroemails" min="1" value="<?= htmlspecialchars($numeroemails) ?>">
        <br><br>

        <input type="checkbox" id="seguro" name="seguro" value="1">
        <label for="seguro">Quiero el seguro por 0.1 €/email</label>
        <br><br>

        <input type="submit" name="calcular" value="Calcular">
    </form>
</body>
</html>