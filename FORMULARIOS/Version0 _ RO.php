<?php
declare(strict_types=1);
session_start();

// CONFIGURACIÓN Y HELPERS

const MODULOS = [
    'DWES' => 'Desarrollo web en entorno servidor',
    'DWEC' => 'Desarrollo web en entorno cliente'
];

const NOMBRE_MAX = 60;

function e(string|int|float|null $value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

// TOKEN CSRF

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

// VARIABLES

$nombre = '';
$modulos = [];
$errores = [];
$exito = false;

// PROCESAR FORMULARIO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Protección CSRF
    $token = $_POST['csrf'] ?? '';

    if (
        !is_string($token) ||
        !hash_equals($_SESSION['csrf'], $token)
    ) {
        http_response_code(403);
        exit('Solicitud no válida.');
    }

    // 2. Saneamiento del nombre
    $nombreRaw = $_POST['nombre'] ?? '';
    $nombre = is_string($nombreRaw)
        ? trim($nombreRaw)
        : '';

    // 3. Validación del nombre
    if ($nombre === '') {
        $errores[] = 'El nombre es obligatorio.';
    } elseif (mb_strlen($nombre) > NOMBRE_MAX) {
        $errores[] = 'El nombre no puede superar los ' . NOMBRE_MAX . ' caracteres.';
    }
    if ($modulos === []) {
        $errores[] = 'Debes selecciona almenos un modulo';
    }

    // 4. Lista blanca de módulos
    $modulosRaw = $_POST['modulos'] ?? [];

    $modulos = is_array($modulosRaw)
        ? array_values(array_intersect(
            array_keys(MODULOS),
            array_filter($modulosRaw, 'is_string')
        ))
        : [];

    // 5. Resultado
    if ($errores === []) {
        $exito = true;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula de módulos</title>
</head>
<body>
<main>

<?php if ($exito): ?>

    <h1>Datos recibidos</h1>

    <p>Alumno: <strong><?= e($nombre) ?></strong></p>

    <h2>Módulos seleccionados</h2>
    <ul>
        <?php foreach ($modulos as $codigo): ?>
            <li><?= e(MODULOS[$codigo]) ?></li>
        <?php endforeach; ?>
    </ul>

<?php else: ?>

    <h1>Matrícula de módulos</h1>

    <?php if ($errores !== []): ?>
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?= e($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form
        action="<?= e($_SERVER['SCRIPT_NAME']) ?>"
        method="post"
        novalidate
    >
        <input
            type="hidden"
            name="csrf"
            value="<?= e($_SESSION['csrf']) ?>"
        >

        <p>
            <label for="nombre">Nombre del alumno:</label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                value="<?= e($nombre) ?>"
                maxlength="<?= NOMBRE_MAX ?>"
                required
            >
        </p>

        <fieldset>
            <legend>Módulos</legend>

            <?php foreach (MODULOS as $codigo => $etiqueta): ?>
                <p>
                    <input type="checkbox" name="modulos[]"
                        id="modulos<?= e($codigo) ?>" value="<?= e($codigo) ?>"
                        <?= in_array($codigo, $modulos, true) ? 'checked' : '' ?>
                    >

                    <label for="modulos<?= e($codigo) ?>"> <?= e($etiqueta) ?> </label>
                </p>
            <?php endforeach; ?>
        </fieldset>

        <button type="submit">Enviar</button>
    </form>

<?php endif; ?>

</main>
</body>
</html>
