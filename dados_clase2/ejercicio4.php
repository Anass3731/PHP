<?php
/*$a = array(2,4,6,8);
$a1 =[2,4,6,8];
echo "sum(a) = " .array_sum($a)."\n";
echo "max(a) = " .max($a)."\n";
var_dump($a);


$b = ["a" => 1.2, "b" => 2.3, "c=>3.4"];
*/

/*SIMULA UN NUMERO DE TIRADAS GUARDANDO CADA RESULTADO EN UN ARRAY Y MUESTRA
ESTADISTACAS CON ARRAY
*/
require 'includes/navbar.php'; 
$historial =[];
$cantidad_tiradas =rand(1,20);
$i = 0;
while ($i <= $cantidad_tiradas) {
    $historial[$i]=rand(1,6);
    $i++;

    }

echo "<pre>";
    var_dump($historial);
echo "<pre>";

//CALCULO DE ESTADISTICAS
$suma = array_sum($historial);
$min = min($historial);
$max = max($historial);

echo "La suma total es $suma, minimo es $min y el maximo es $max";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  rel ="stylesheet" href="css/estilos.css">
</head>
<body>
    <main class="contenedor">
    <table>
        <tr>
            <th>TIRADA</th>  
            <th>VALOR</th>  
</tr>
            <?php 
            $contador=0;
            foreach($historial as $tirada){
               
            echo "<tr>
            <td> $contador</td>
            <td> $tirada</td>
            </tr>
            ";
                $contador++;
            }
            
            ?>
    </table>

    <H3>ESTADISTRICA DEL HISTORIAL</H3>
<table>
    <tr>
    <th>SUMA</th>
    <th>MIN</th>
    <th>MAX</th>
    </tr>
    <tr>
        <td><?php echo $suma  ?></td>
        <td><?php echo $min?></td>
        <td><?php echo $max ?></td>

    </tr>

</table>


    </main>
    
</body>
</html>