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

?>