<?php

$_MENU = [
    'Home' => 'home.php',
    'Séries' => 'series.php',
    'Filmes' => 'filmes.php',
    'Bombando' => 'em_alta.php',
    'Minha Lista' => 'lista.php'
];


$links_videos = [
    'ben10niger.php',
    'https://www.tiktok.com/@desenhos20.25/video/7577016103105285377',
    'https://www.youtube.com/watch?v=xBkXGUmYlA0',
    'https://www.youtube.com/watch?v=bBf_FDKDeeo'
    
];


$pagina = $_GET['page'] ?? 'Home';
$erro_404 = false;


if (!array_key_exists($pagina, $_MENU)) {
    $erro_404 = true;
} else if ($pagina !== 'Home' && !file_exists($_MENU[$pagina])) {

    $erro_404 = true;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pagina) ?> - Meu Streaming</title>

    <style>

        :root {
            --bg-color: #141414;
            --primary-red: #E50914;
            --text-light: #e5e5e5;
            --font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--bg-color);
            color: #fff;
            overflow-x: hidden;
        }


        header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 4%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
            display: flex;
            align-items: center;
            z-index: 1000;
            transition: background 0.3s ease;
        }

        header:hover {
            background: var(--bg-color); 
        }

        .logo img {
            height: 30px;
            margin-right: 40px;
    
            color: var(--primary-red);
            font-size: 28px;
            font-weight: 900;
            text-transform: uppercase;
        }

        nav {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        nav a {
            color: var(--text-light);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav a:hover, nav a.active {
            color: #fff;
            font-weight: bold;
        }

        .banner {
            height: 80vh;
            background: url('img/1.jpg') center/cover no-repeat; 
            background-color: #333; 
            display: flex;
            align-items: center;
            padding: 0 4%;
            position: relative;
        }

   
        .banner::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: linear-gradient(to top, var(--bg-color) 0%, transparent 100%);
        }

        .banner-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.45);
        }

        .banner-content h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
        }

        .banner-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .botoes-banner {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 25px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: transform 0.2s, background 0.2s;
        }

        .btn-play {
            background-color: #fff;
            color: #000;
        }

        .btn-play:hover {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .btn-info {
            background-color: rgba(109, 109, 110, 0.7);
            color: #fff;
        }

        .btn-info:hover {
            background-color: rgba(109, 109, 110, 0.4);
        }

        .container {
            padding: 20px 4%;
            position: relative;
            z-index: 5;
            margin-top: -80px; 
        }

        h2 {
            font-size: 1.4vw;
            color: #e5e5e5;
            margin: 30px 0 10px 0;
            font-weight: bold;
        }

        .linha {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 20px 0;
            scroll-behavior: smooth;
        }


        .linha::-webkit-scrollbar {
            display: none;
        }
        .linha {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .card {
            position: relative;
            min-width: 250px;
            aspect-ratio: 16/9;
            background-color: #222;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.3s;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .card:hover {
            transform: scale(1.15);
            z-index: 10;
            box-shadow: 0 10px 20px rgba(0,0,0,0.8);
            border-radius: 6px;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card:hover .overlay {
            opacity: 1;
        }

   
        .play-icon {
            font-size: 40px;
            color: white;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .link-card {
            display: block;
            width: 100%;
            height: 100%;
        }

      

        .error-page {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: radial-gradient(circle, #333 0%, var(--bg-color) 70%);
            padding: 20px;
        }

        .error-page h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
        }

        .error-page p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            color: var(--text-light);
        }

        .btn-vermelho {
            background-color: var(--primary-red);
            color: white;
            padding: 15px 30px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 4px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-vermelho:hover {
            background-color: #f40612;
        }
    </style>
</head>

<body>

<header>
    <a href="?page=Home" class="logo" style="text-decoration: none;">
        <img src="img/logo.png" alt="NETFLIX" onerror="this.style.display='none'; this.parentNode.innerHTML='STREAMING';">
    </a>

    <nav>
        <?php foreach($_MENU as $nome_menu => $link_arquivo): ?>
            <a href="?page=<?= $nome_menu ?>" class="<?= ($pagina == $nome_menu) ? 'active' : '' ?>">
                <?= $nome_menu ?>
            </a>
        <?php endforeach; ?>
    </nav>
</header>

<?php if ($erro_404): ?>
    <main class="error-page">
        <h1>Perdeu o caminho?</h1>
        <p>Infelizmente, não localizamos essa página. Você encontra muitos outros títulos na página inicial.</p>
        <a href="?page=Home" class="btn-vermelho">Página inicial da Netflix</a>
    </main>

<?php else: ?>
    
    <?php if($pagina == 'Home'): ?>
        <section class="banner">
            <div class="banner-content">
                <h1>Destaque da Semana</h1>
                <p>Assista agora ao conteúdo mais popular da nossa plataforma. Ação, aventura e muito mais esperando por você.</p>
                <div class="botoes-banner">
                    <a href="<?= $links_videos[0] ?>" target="_blank" class="btn btn-play">▶ Assistir</a>
                    <a href="#" class="btn btn-info">ⓘ Mais Informações</a>
                </div>
            </div>
        </section>

        <main class="container">
            <h2>Populares</h2>
            <div class="linha">
                <?php for($i=1; $i<=4; $i++): ?>
                <div class="card">
                    <a href="<?= $links_videos[$i-1] ?>" target="_blank" class="link-card">
                        <img src="img/<?= $i ?>.jpg" alt="Capa do Filme <?= $i ?>">
                        <div class="overlay">
                            <span class="play-icon">▶</span>
                        </div>
                    </a>
                </div>
                <?php endfor; ?>
            </div>

            <h2>Recomendados para Você</h2>
            <div class="linha">
                <?php for($i=4; $i>=1; $i--): ?>
                <div class="card">
                    <a href="<?= $links_videos[$i-1] ?>" target="_blank" class="link-card">
                        <img src="img/<?= $i ?>.jpg" alt="Capa do Filme <?= $i ?>">
                        <div class="overlay">
                            <span class="play-icon">▶</span>
                        </div>
                    </a>
                </div>
                <?php endfor; ?>
            </div>

            <h2>Em Alta</h2>
            <div class="linha">
                <?php for($i=1; $i<=4; $i++): ?>
                <div class="card">
                    <a href="<?= $links_videos[$i-1] ?>" target="_blank" class="link-card">
                        <img src="img/<?= $i ?>.jpg" alt="Capa do Filme <?= $i ?>">
                        <div class="overlay">
                            <span class="play-icon">▶</span>
                        </div>
                    </a>
                </div>
                <?php endfor; ?>
            </div>
        </main>
    <?php 
    else: 
        include $_MENU[$pagina];
    endif; 
    ?>

<?php endif; ?>

</body>
</html>