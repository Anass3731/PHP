<?php
declare(strict_types=1);
session_start();



//-------------------------------------------------
//CONFIGURACION y HEPERS
//-------------------------------------------------

const MODULOS = [
    'DWES' => 'Desarollo web en entorno servidor',
    'DWEC' => 'Desarollo web en entorno cliente'
];

const NOMBRE_MAX = 60;

function e(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');    
}

//-----------------------------------------
//TOKEN CSRF (se genera una vez por sesion)
//------------------------------------------


if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}






//------------------------------------------------
//Logica: procesar solo si es la petición es POST
//------------------------------------------------

$nombre = '';
$modulos = [];
$errores = [];
$exito = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //1. Proteccion CSFR
    $token = $_POST['csfr'] ?? '';

    if (!is_string($token) || !hash_equals($_SESSION['csrf'], $token)) {
        http_response_code(403);
        exit('Solicitud no valida.');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
<?php if ($exito) ?>
    <h1>Datos recibidos</h1>
    <p>Alumno: <strong><?= e($nombre) ?></strong></p>
    <ul>
        <?php foreach ($modulos as $codigo):?>
            <li><?=  e(MODULOS[$codigo]) ?></li>
            <?php endforeach; ?>
            
    </ul>

<?php else:  ?>

<?php endif;  ?>
    </main>
</body>
</html>