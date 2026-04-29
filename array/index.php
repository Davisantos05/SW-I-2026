<?php
$_MENU = [
    'Home' => 'home.php',
    'Sobre' => 'sobre.php',
    'Contato' => 'contato.php',
    'Experiencias' => 'experiencias.php',
    'Projetos' => 'projetos.php'
];

$pagina = $_GET['page'] ?? 'Home';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Meu Streaming</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #0d0d0d;
    color: #fff;
}

header {
    background: #141414;
    padding: 15px;
    display: flex;
    justify-content: center;
}

nav {
    display: flex;
    gap: 20px;
    align-items: center;
}

.logo img {
    height: 40px;
}

a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    color: red;
}

/* Netflix style */
.container {
    padding: 20px;
}

.linha {
    display: flex;
    gap: 15px;
    overflow-x: auto;
}

.card {
    min-width: 180px;
    transition: 0.3s;
}

.card img {
    width: 100%;
    border-radius: 8px;
}

.card:hover {
    transform: scale(1.1);
}
/* 🎥 BANNER */
.banner {
    height: 400px;
    background: url('img/1.jpg') center/cover no-repeat;
    display: flex;
    align-items: center;
    padding: 40px;
}

.banner-content {
    max-width: 400px;
}

.play-btn {
    background: red;
    border: none;
    padding: 10px 20px;
    color: white;
    cursor: pointer;
    font-size: 16px;
}

/* 🔍 busca */
form {
    margin: 20px 0;
}

input {
    padding: 8px;
    border-radius: 5px;
    border: none;
}

/* 🎬 CARDS estilo Netflix */
.linha {
    display: flex;
    gap: 12px;
    overflow-x: auto;
}

.card {
    position: relative;
    min-width: 140px; /* 👈 menor */
    transition: 0.3s;
}

.card img {
    width: 100%;
    border-radius: 6px;
}

/* ▶ overlay play */
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0,0,0,0.5);
    opacity: 0;
    transition: 0.3s;
    border-radius: 6px;
}

.overlay button {
    background: red;
    border: none;
    color: white;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
}

.card:hover .overlay {
    opacity: 1;
}

.card:hover {
    transform: scale(1.08);
}
</style>
</head>

<body>

<header>
<nav>
<a class="logo" href="?page=Home">
    <img src="img/logo.png">
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
if(array_key_exists($pagina, $_MENU)){
    include $_MENU[$pagina];
} else {
    echo "<h1>Página não encontrada</h1>";
}
?>
</div>

</body>
</html>