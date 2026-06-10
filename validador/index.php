<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]);

    function validarCPF($cpf) {
        if (strlen($cpf) != 11) return false;

        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        for ($t = 9; $t < 11; $t++) {
            $soma = 0;

            for ($c = 0; $c < $t; $c++) {
                $soma += $cpf[$c] * (($t + 1) - $c);
            }

            $digito = ((10 * $soma) % 11) % 10;

            if ($cpf[$c] != $digito) {
                return false;
            }
        }

        return true;
    }

    $mensagem = validarCPF($cpf)
        ? "$nome, CPF válido."
        : "$nome, CPF inválido.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Validador de CPF</title>
<style>
body{
    font-family:Arial,sans-serif;
    background:#f4f4f4;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.container{
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.1);
    width:300px;
}
h2{
    text-align:center;
}
input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:1px solid #ccc;
    border-radius:5px;
}
button{
    width:100%;
    padding:10px;
    background:#007bff;
    color:#fff;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
button:hover{
    background:#0056b3;
}
.mensagem{
    margin-top:15px;
    text-align:center;
    font-weight:bold;
}
</style>
</head>
<body>
<div class="container">
    <h2>Validador de CPF</h2>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cpf" placeholder="CPF" required>
        <button type="submit">Validar</button>
    </form>

    <?php if($mensagem): ?>
        <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>
</div>
</body>
</html>