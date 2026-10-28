<?php

// Genera la cabecera HTML.
function renderHeader(string $title): string
{
    
    $title = e($title);

    $menu = '';

    foreach (APP_MENU as $file => $label) {
        $menu .= '<li><a href="' . e($file) . '">' . e($label) . '</a></li>';
    }

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
                    {$menu}
                </ul>
            </nav>
        </header>
        <main>
HTML;
}

// Genera el pie de página y cierra las etiquetas HTML.
function renderFooter(): string
{
    $owner = e(AP_OWNER);

    return <<<HTML
        </main>
        <footer>
            2026 Mi web - Autor: {$owner}
        </footer>
    </body>
    </html>
HTML;

// implementar cookies y sesion 
}