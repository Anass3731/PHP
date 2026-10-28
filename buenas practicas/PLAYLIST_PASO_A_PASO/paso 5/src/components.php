<?php 

declare(strict_types=1);

function renderSongList(array $songs): string
    {
        $html = '<ul>';
        foreach ($songs as $song) {
            $html .= '<li>' . e($song['title']) . '- (' .  
            e($song['artist']) . '-' . 
            e($song['minutes']) . ' min)</li>';
        }
    return $html . '</ul>';
}

//devuelve en HTML el formulario de contactos
function renderContactForm(): string
{
    $nombre = e($datos['nombre'] ?? '');
    $email = e($datos['email'] ?? '');
    $telefono = e($datos['telefono'] ?? '');

    $html = <<<HTML
            <form action="recibir_contacto.php" method="post">
                    <p>
                        <label for="nombre">Tu nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </p>

                    <p>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </p>
                    <p>
                        <label for="telefono">Telefono</label>
                        <input type="tel" id="telefono" name="telefono">

                    </p>
                    <p>
                        <button type="submit">Enviar</button>
                    </p>

                </form>
        HTML;
    
        return $html;
}
?>