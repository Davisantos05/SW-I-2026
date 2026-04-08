<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cálculo de Salário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Calculadora de Salário</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="number" step="0.01" name="salario" placeholder="Salário bruto" required>
        <input type="number" name="faltas" placeholder="Quantidade de faltas" required>

        <button type="submit">Calcular</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $salario = floatval($_POST["salario"]);
    $faltas = intval($_POST["faltas"]);


    function calcularINSS($salario) {
        $inss = 0;

        if ($salario > 8475.55) {
            return 2034.13; // teto
        }

        if ($salario > 4354.27) {
            $inss += (min($salario, 8475.55) - 4354.27) * 0.14;
        }
        if ($salario > 2902.84) {
            $inss += (min($salario, 4354.27) - 2902.84) * 0.12;
        }
        if ($salario > 1621.00) {
            $inss += (min($salario, 2902.84) - 1621.00) * 0.09;
        }

        $inss += min($salario, 1621.00) * 0.075;

        return $inss;
    }

    $inss = calcularINSS($salario);


    $valorFalta = ($salario / 30) * $faltas;

    $vt = $salario * 0.06;


    $totalDescontos = $inss + $valorFalta + $vt;


    $salarioLiquido = $salario - $totalDescontos;

    echo "<div class='resultado'>";
    echo "<h2>Resultado</h2>";
    echo "<p><strong>$nome</strong>, seu salário líquido é:</p>";
    echo "<p class='valor'>R$ " . number_format($salarioLiquido, 2, ',', '.') . "</p>";

    echo "<hr>";
    echo "<p>INSS: R$ " . number_format($inss, 2, ',', '.') . "</p>";
    echo "<p>Faltas: R$ " . number_format($valorFalta, 2, ',', '.') . "</p>";
    echo "<p>Vale Transporte: R$ " . number_format($vt, 2, ',', '.') . "</p>";
    echo "</div>";
}
?>

</div>

</body>
</html>