<?php

$zara = [
    123 => [
      'nombre' => 'Camisa a cuadros',
      'precio' => 29.95,
      'sexo' => 'Hombre'
    ],
    234 => [
      'nombre' => 'Falda manga',
      'precio' => 19.95,
      'sexo' => 'Mujer'
    ],
    345 => [
      'nombre' => 'Bolso minúsculo',
      'precio' => 50,
      'sexo' => 'Mujer'
    ]
];

echo($zara[345]['precio']);

echo "<pre>";
echo count($zara);
echo($zara[345]['precio']);
print_r($zara);

echo "</pre>";







// $empleados = [
//     'Juan' => 34,
//     'Luisa' => 56
// ];

// $empleados['Manolo'] = 99;

// echo $empleados['Manolo'];














// $frase = 'En un lugar de la mancha';
// $arrayDeFrase = preg_split('/[\s,]+/', $frase);
// echo $arrayDeFrase[2];

// var_dump($arrayDeFrase);


















// $planetas = ['MArte', 'Tierra', 'Venus'];

// $nuevosPlanetas = array_merge($planetas, ['Mercurio']);
// $masPlanetas = ["Mercurio", "Saturno"];

// $planet = 'Jupiter';

// echo count($nuevosPlanetas);
// echo "<h4>Funcion var_drump con pre</h4>";


// $nuevosPlanetas = [...$planetas, $planet, ...$masPlanetas];
// echo "<pre>";
// var_dump($nuevosPlanetas);
// echo "</pre>";

?>