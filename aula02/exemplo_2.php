<?php
   $nome = "João";
   $idade = 25;
   $altura = 1.75;
   $status = true;

   //exibir valores na tela
   echo "O nome é: $nome"; //1ªforma
   echo "<br>";
   echo "O nome é: " . $nome; //2ªforma
   echo "<br>";
   echo $nome;

   //VERIFICAR TIPO E VALOR DE UMA VARIÁVEL
   var_dump($altura);
   echo "<br>";
   print_r($altura);
   echo "<br>";

   //CURIOSIDADE DO PHP A RESPEITO DE VALORES BOOLEANOS
   echo "O status é: $status"; //falso em php = nada




?>