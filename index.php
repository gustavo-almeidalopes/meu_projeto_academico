<?php
session_start();

// Inicialize o carrinho, caso não esteja inicializado
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Produtos simulados
$produtos = [
    1 => [
        'id' => 1,
        'nome' => 'Produto 1',
        'descricao' => 'Bloco estrutural feito com biocompostos, ideal para construções sustentáveis.',
        'imagem' => 'blocodois.jpeg',
        'preco' => 250.00
    ],
    2 => [
        'id' => 2,
        'nome' => 'Produto 2',
        'descricao' => 'Embalagem térmica para transporte de refeições.',
        'imagem' => 'embalagemdois.jpeg',
        'preco' => 20.00
    ],
    3 => [
        'id' => 3,
        'nome' => 'Produto 3',
        'descricao' => 'Máscara descartável feita de materiais sustentáveis.',
        'imagem' => 'mascaradois.jpeg',
        'preco' => 10.00
    ]
];

// Funções para adicionar, remover ou atualizar o carrinho
if (isset($_POST['add_to_cart'])) {
    $idProduto = (int)$_POST['product_id'];
    $quantidade = (int)($_POST['quantidade'] ?? 1); // Converte quantidade para inteiro

    if (isset($produtos[$idProduto])) {
        if (isset($_SESSION['carrinho'][$idProduto])) {
            $_SESSION['carrinho'][$idProduto]['quantidade'] += $quantidade;
        } else {
            $_SESSION['carrinho'][$idProduto] = [
                'nome' => $produtos[$idProduto]['nome'],
                'preco' => $produtos[$idProduto]['preco'],
                'quantidade' => $quantidade
            ];
        }
    }
}

if (isset($_POST['remove_from_cart'])) {
    $idProduto = (int)$_POST['product_id'];
    if (isset($_SESSION['carrinho'][$idProduto])) {
        unset($_SESSION['carrinho'][$idProduto]);
    }
}

if (isset($_POST['update_cart'])) {
    $idProduto = (int)$_POST['product_id'];
    $quantidade = (int)$_POST['quantidade'];
    if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto]['quantidade'] = $quantidade;
    }
}

// Total do carrinho
$totalCarrinho = 0;
foreach ($_SESSION['carrinho'] as $item) {
    $totalCarrinho += $item['preco'] * $item['quantidade'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cibele Plastic</title>
    <link rel="icon" type="image/x-icon" href="Faviconn.ico" alt="Favicon">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header class="home_section">
        <div class="container">
            <nav class="home_logo">
                <a class="logo_menu" href="index.php">
                    <img id="logo" src="alternativelogo.png" alt="Logo da Cibele Plastic">
                </a>
            </nav>
            <div class="search_bar">
                <input type="text" placeholder="  Buscar produtos...">
            </div>
        </div>
    </header>
    
    <nav class="home_nav">
        <a href="embalagens.php" class="nav-item">Embalagens Descartáveis</a>
        <a href="produtos_medicos.php" class="nav-item">Produtos Médicos</a>
        <a href="construcao.php" class="nav-item">Construção Civil</a>
        <a href="form.php" class="nav-item">Contato</a>
        <a href="membros.php" class="nav-item">Sobre Nós</a>
    </nav>

    <div class="white_rectangle"></div>
    <main>
        <div class="slider">
            <?php foreach ($produtos as $produto): ?>
                <div class="slide">
                    <div class="content">
                        <h1><?php echo htmlspecialchars($produto['nome']); ?></h1>
                        <p><?php echo htmlspecialchars($produto['descricao']); ?></p>
                        <div class="buttons">
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="<?php echo $produto['id']; ?>">
                                <button class="btn-primary" type="submit" name="add_to_cart">Comprar</button>
                            </form>
                            <button class="btn-secondary">Saiba mais</button>
                        </div>
                    </div>
                    <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="footer_informs">
        <nav class="most_informs">
            <div class="footer_category">
                <label class="category"><h3>Categorias</h3></label>
                <section class="category_footer">
                    <aside class="categorys">
                        <a class="disposable_packaging" href="embalagens.php"><h4>Embalagens Descartáveis</h4></a>
                        <a class="medical_products" href="produtos_medicos.php"><h4>Produtos Médicos</h4></a>
                        <a class="civil_construction" href="construcao.php"><h4>Construção Civil</h4></a>
                    </aside>
                </section>
                <label class="information"><h3>Informações</h3></label>
                <section class="cookies_policy">
                    <a class="cookies" href="cookiesphp.pdf"><h4>Política de Cookies</h4></a>
                </section>
                <label class="service"><h3>Atendimento</h3></label>
                <section class="cookies_policy">
                    <div class="social_networks">
                        <a class="instagram" href="https://www.instagram.com/cibeleplastic/" target="_blank"><h4>Instagram</h4></a>
                        <a class="youtube" href="https://www.youtube.com/@CibelePlastic-VendcreShop" target="_blank"><h4>YouTube</h4></a>
                        <a class="email" href="https://mail.google.com/mail/?view=cm&fs=1&to=vendcreshop@gmail.com&subject=Assunto%20do%20E-mail" target="_blank"><h4>Email</h4></a>
                    </div>
                </section>
            </div>
        </nav>
    </footer>
</body>
</html>