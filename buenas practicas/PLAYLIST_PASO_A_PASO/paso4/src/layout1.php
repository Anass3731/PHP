
<?php

// con HEADER DOC  (<<HTML) : PERMITE ESCRIBIR EL HTML TAL CUAL
//con comillas sin escapar e iterpolacion con $variable

// Genera la cabecera HTML.
function renderHeader(string $title): string
{
    $title = e($title);

    return <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{$title} | Mi playlist</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="sobre.php">Sobre mí</a></li>
                </ul>
            </nav>
        </header>
        <main>
HTML;
}

// Genera el pie de página y cierra las etiquetas HTML.
function renderFooter(): string
{
    return <<<HTML
        </main>
        <footer>
            Proven
        </footer>
    </body>
    </html>
HTML;
}
