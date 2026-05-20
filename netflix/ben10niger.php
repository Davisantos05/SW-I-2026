<?php
// Página individual customizada para o Ben 10 com link corrigido
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ben 10: Invasão Alienígena - Nexus Hub</title>
    <style>
        :root { --bg: #0a0a0c; --ben-green: #00ff66; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; background-color: var(--bg); color: #fff; padding: 40px 6%; }
        
        .btn-back { color: #8a8a98; text-decoration: none; font-weight: bold; font-size: 14px; transition: color 0.2s; display: block; margin-bottom: 20px; }
        .btn-back:hover { color: var(--ben-green); }

        .cinema-screen { width: 100%; aspect-ratio: 16 / 9; background-color: #000; border-radius: 16px; overflow: hidden; border: 1px solid rgba(0, 255, 102, 0.2); box-shadow: 0 0 30px rgba(0, 255, 102, 0.1); }
        .cinema-screen iframe { width: 100%; height: 100%; border: none; }

        .detalhes { margin-top: 30px; }
        .detalhes h1 { font-size: 2.2rem; margin-bottom: 10px; letter-spacing: -0.5px; }
        .detalhes h1 span { color: var(--ben-green); }
        .sinopse { font-size: 16px; color: #a0a0b0; max-width: 700px; line-height: 1.6; }
    </style>
</head>
<body>

    <a href="index.php" class="btn-back">← RETORNAR AO HUB PRINCIPAL</a>

    <div class="cinema-screen">
        <iframe src="https://www.youtube.com/embed/OLv55d-swTo?autoplay=1" allowfullscreen allow="autoplay"></iframe>
    </div>

    <div class="detalhes">
        <h1>Ben 10: <span>Invasão Alienígena</span></h1>
        <p class="sinopse">O planeta corre perigo iminente devido a uma infiltração biológica oculta de alienígenas modulares. Usando o Omnitrix, Ben Tennyson precisa liderar Gwen e Kevin para além dos limites conhecidos e salvar a humanidade.</p>
    </div>

</body>
</html>