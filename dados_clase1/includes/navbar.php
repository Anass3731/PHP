<?php
//esto es la barra de navegacion que te la vas a poder pod¡nienjdo en cadsa sitio de clases
$opciones_menu =[

    "index.php"=> "index",
    "ejercicio1.php"=> "Ejercicio 1. Dado simple",
    "ejercicio2.php"=> "Ejercicio 2. Dado con mensaje",
    "ejercicio3.php"=> "Ejercicio 3",
    "ejercicio4.php"=> "Ejercicio 4",

]
?>
 <nav class"navbar"
 <span class="navbar_titulo"> Practicas PHP . Dado Virtual </span>
  <ul class="navbar-menu">
    <li><a href="index.php"><?=$opciones_menu["index.php"]?></a></li>
    <li><a href="ejercicio1.php"><?php echo $opciones_menu["ejercicio1.php"]?></a></li>
    <li><a href="ejercicio2.php"><?php echo $opciones_menu["ejercicio2.php"]?></a></li>

  </ul> 
 </nav>
