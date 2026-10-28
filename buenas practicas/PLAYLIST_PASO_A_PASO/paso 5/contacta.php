<?php

declare(strict_types=1);

require_once __DIR__ . '/src/bootstrap1.php';

echo renderHeader('Contacta');


// echo '<h1>'Contacta con nosotros'</h1>';


echo renderContactForm();

// <!-- <form action="recibir_contacto.php" method="post">
//     <p>
//         <label for="nombre">Tu nombre</label>
//         <input type="text" id="nombre" name="nombre" required>
//     </p>

//     <p>
//         <label for="email">Email</label>
//         <input type="email" id="email" name="email" required>
//     </p>
//     <p>
//         <label for="telefono">Telefono</label>
//         <input type="tel" id="telefono" name="telefono" required>

//     </p>
//     <p>
//         <button type="submit">Enviar</button>
//     </p>

// </form> -->

echo renderFooter();
?>