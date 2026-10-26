<?php

declare(strict_types=1);

session_start();

// ---------------------------------------------------------------------------
// Configuración y helpers
// ---------------------------------------------------------------------------
const MODULOS    = [
    'DWES' => 'Desarrollo web en entorno servidor',
    'DWEC' => 'Desarrollo web en entorno cliente',
];
const NOMBRE_MAX = 60;

/** Escapa un valor para imprimirlo de forma segura en HTML. */
function e(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// ---------------------------------------------------------------------------
// Token CSRF (se genera una vez por sesión) ej: cu3hanvoedkrfmo15p31dkhct8
// ---------------------------------------------------------------------------
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}


// ---------------------------------------------------------------------------
// Lógica: procesar solo si la petición es POST
// ---------------------------------------------------------------------------
$nombre  = '';
$modulos = [];
$errores = [];
$exito   = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Protección CSRF
    $token = $_POST['csrf'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['csrf'], $token)) {
        http_response_code(403);
        exit('Solicitud no válida.');
    }

    // 2. Saneamiento: nunca se asume el tipo de lo que llega en $_POST
    $nombreRaw  = $_POST['nombre'] ?? '';
    $nombre     = is_string($nombreRaw) ? trim($nombreRaw) : '';

    $modulosRaw = $_POST['modulos'] ?? [];
    $modulos    = is_array($modulosRaw)
        // Lista blanca: solo se aceptan módulos que existen en MODULOS
        ? array_values(array_intersect(array_keys(MODULOS), array_filter($modulosRaw, 'is_string')))
        : [];

    // 3. Validación
    if ($nombre === '') {
        $errores[] = 'El nombre es obligatorio.';
    } elseif (mb_strlen($nombre) > NOMBRE_MAX) {
        $errores[] = 'El nombre no puede superar los ' . NOMBRE_MAX . ' caracteres.';
    }
    if ($modulos === []) {
        $errores[] = 'Debes seleccionar al menos un módulo.';
    }

    // 4. Datos correctos: aquí va el código a ejecutar (guardar en BD, etc.)
    if ($errores === []) {
        $exito = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matrícula de módulos</title>
</head>
<body>
<main>
<?php if ($exito): ?>
    <h1>Datos recibidos</h1>
    <p>Alumno: <strong><?= e($nombre) ?></strong></p>
    <ul>
        <?php foreach ($modulos as $codigo): ?>
            <li><?= e(MODULOS[$codigo]) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <h1>Matrícula de módulos</h1>

    <!-- gestion de errores -->
    <?php if ($errores !== []): ?>
        <ul role="alert">
            <?php foreach ($errores as $error): ?>
                <li><?= e($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= e($_SERVER['SCRIPT_NAME']) ?>" method="post" novalidate>
        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">

        <p>
            <label for="nombre">Nombre del alumno:</label>
            <input type="text" name="nombre" id="nombre"
                   value="<?= e($nombre) ?>"
                   maxlength="<?= NOMBRE_MAX ?>" required>
        </p>

        <fieldset>
            <legend>Módulos</legend>
            <?php foreach (MODULOS as $codigo => $etiqueta): ?>
                <p>
                    <input type="checkbox" name="modulos[]"
                           id="modulos<?= e($codigo) ?>" value="<?= e($codigo) ?>"
                           <?= in_array($codigo, $modulos, true) ? 'checked' : '' ?>>
                           <!-- si este código está en la lista de módulos elegidos, 
                           escribe checked; si no, no escribas nada -->
                    <label for="modulos<?= e($codigo) ?>"><?= e($etiqueta) ?></label>
                </p>
            <?php endforeach; ?>
        </fieldset>

        <button type="submit">Enviar</button>
    </form>
<?php endif; ?>
</main>
</body>
</html>