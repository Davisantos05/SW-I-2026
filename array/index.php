<?php

$_MENU = [
    'Home' => '<h1>Página Inicial</h1><p>Bem-vindo ao meu site!</p>',
    'Sobre' => '<h1>Sobre</h1><p>Informações sobre mim.</p>',
    'Contato' => '<h1>Contato</h1><p>Email: contato@email.com</p>',
    'Experiencias' => '<h1>Experiências</h1><p>Minhas experiências profissionais.</p>',
    'Projetos' => '<h1>Projetos</h1><p>Lista de projetos desenvolvidos.</p>'
];

$_pagina = isset($_GET['page']) ? $_GET['page'] : 'Home';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Site Dinâmico PHP</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #0d0d0d;
            color: #fff;
        }

        header {
            background: #1a1a1a;
            padding: 15px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }   

        nav {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .logo img {
            height: 40px;
        }

        header a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            transition: 0.3s;
            border-radius: 5px;
        }

        header a:hover {
            background: #eb0000;
            color: #fff;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #1a1a1a;
            border-radius: 10px;

        }

        h1 {
            color: #eb0000;
        }   
    </style>
</head>

<body>

<header>
    <nav>
        <a class="logo" href="?page=Home">
            <img src="img/logo.png" alt="Logo">
        </a>

        <?php
        foreach($_MENU as $key => $value){
            echo '<a href="?page='.$key.'">'.$key.'</a>';
        }
        ?>
    </nav>
</header>

<div class="container">
    <?php
    if(array_key_exists($_pagina, $_MENU)){
        echo $_MENU[$_pagina];
    } else {
        echo '<h1>Página não encontrada</h1>';
    }
    ?>
</div>

</body>
</html>