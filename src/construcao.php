<?php
session_start();

$title = "Produtos Sustentáveis para Construção Civil";
$logoPath = "alternativelogo.png";
$faviconPath = "faviconum.png";

// Produtos da página de construção civil com identificadores únicos
$produtos = [
    6 => [
        "nome" => "Tubo de Bioplástico para Drenagem",
        "descricao" => "Tubos de drenagem feitos de bioplástico resistente e sustentável.",
        "preco" => 120.00,
        "imagem" => "tubo.webp"
    ],
    7 => [
        "nome" => "Bloco Estrutural de Bioplástico",
        "descricao" => "Bloco estrutural feito com biocompostos, ideal para construções sustentáveis.",
        "preco" => 250.00,
        "imagem" => "bloco.webp"
    ],
    8 => [
        "nome" => "Isolante Térmico de Bioplástico",
        "descricao" => "Material de isolamento térmico feito de bioplástico biodegradável.",
        "preco" => 85.00,
        "imagem" => "isolante.webp"
    ],
    9 => [
        "nome" => "Filme Protetor para Janelas",
        "descricao" => "Filme sustentável para proteção de vidros e janelas durante obras.",
        "preco" => 60.00,
        "imagem" => "filmeprotetor.webp"
    ],
    10 => [
        "nome" => "Formas para Concreto de Bioplástico",
        "descricao" => "Formas reutilizáveis e biodegradáveis para concretagem em obras.",
        "preco" => 200.00,
        "imagem" => "formas.jpeg"
    ]
];

// Inicializa o carrinho, caso não esteja inicializado
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adicionar ao carrinho com controle de quantidade
if (isset($_POST['add_to_cart'])) {
    $idProduto = (int)$_POST['product_id'];
    $quantidade = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 1;

    if (isset($produtos[$idProduto])) { // Verifica se o produto existe
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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo htmlspecialchars($faviconPath); ?>" alt="Favicon">
    <link rel="stylesheet" href="construcao.css">
</head>
<body>
    <header class="home_section">
        <div class="container">
            <nav class="home_logo">
                <a class="logo_menu" href="index.php">
                    <img id="logo" src="<?php echo htmlspecialchars($logoPath); ?>" alt="Logo da Cibele Plastic">
                </a>
            </nav>
            <div class="search_bar">
                <input type="text" placeholder="  Buscar...">
                <a href="carrinho.php" class="cart_icon">
                    <img src="carrinho.png" alt="Carrinho" style="width: 30px; height: 30px;">
                </a>
            </div>
        </div>
    </header>
    
    <nav class="home_nav">
        <a href="embalagens.php" class="nav-item">Embalagens Descartáveis</a>
        <a href="produtos_medicos.php" class="nav-item">Produtos Médicos</a>
        <a href="construcao.php" class="nav-item">Construção Civil</a>
        <a href="index.php" class="nav-item">Página Inicial</a>
    </nav> 

    <main>
        <h1><?php echo htmlspecialchars($title); ?></h1>

        <div class="product-grid">
            <?php foreach ($produtos as $id => $produto): ?>
                <div class="product">
                    <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                    <h2><?php echo htmlspecialchars($produto['nome']); ?></h2>
                    <p><?php echo htmlspecialchars($produto['descricao']); ?></p>
                    <p>Preço: R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                    <form method="post" action="">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        <label>Quantidade:</label>
                        <input type="number" name="quantidade" value="1" min="1">
                        <button type="submit" name="add_to_cart">Comprar</button>
                    </form>
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