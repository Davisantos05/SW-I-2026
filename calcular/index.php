<?php

require_once 'autoload.php';

$texto = new Texto();
$calc = new Calcular();


echo $calc->somar(10, 20);
echo "<br><br>";

echo $texto->maiusculo("etec mcm");
echo "<br><br>";

echo $calc->multiplicar(10, 20);
echo "<br><br>";

