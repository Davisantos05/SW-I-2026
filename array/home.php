<?php
$filmes = [
    ['titulo' => 'Projeto 1', 'img' => 'img/1.jpg'],
    ['titulo' => 'Projeto 2', 'img' => 'img/2.jpg'],
    ['titulo' => 'Projeto 3', 'img' => 'img/3.jpg'],
    ['titulo' => 'Projeto 4', 'img' => 'img/4.jpg'],
];

$busca = $_GET['busca'] ?? '';

$filtrados = array_filter($filmes, function($f) use ($busca){
    return stripos($f['titulo'], $busca) !== false;
});
?>

<!-- 🎥 BANNER -->
<div class="banner">
    <div class="banner-content">
        <h1>Meu Projeto Destaque</h1>
        <p>Um dos meus melhores trabalhos</p>
        <button class="play-btn">▶ Assistir</button>
    </div>
</div>

<!-- 🔍 BUSCA -->
<form method="GET">
    <input type="hidden" name="page" value="Home">
    <input type="text" name="busca" placeholder="Buscar..." value="<?= $busca ?>">
    <button>Buscar</button>
</form>

<h2>Catálogo</h2>

<div class="linha">
<?php foreach($filtrados as $f): ?>
    <div class="card">
        <img src="<?= $f['img'] ?>">
        
        <div class="overlay">
            <button>▶</button>
        </div>

        <p><?= $f['titulo'] ?></p>
    </div>
<?php endforeach; ?>
</div>