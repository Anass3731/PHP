<?php 
declare(strict_types=1);

require_once __DIR__ . '/src/bootstrap1.php';

echo renderHeader('Datos de contacto');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefono = $_POST['telefono'] ?? '';
    }
?>

    <h1>Datos de contacto</h1>

    <p>Nombre-> <?= e($nombre) ?></p>
    <p>Email-> <?= e($email) ?></p>
    <p>Telefono-> <?= e($telefono) ?></p>

    <p>Contactaremos contigo en la menor brevedad posible.</p>

<?php 
 echo renderFooter();
?>