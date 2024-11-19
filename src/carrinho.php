<?php
session_start();
$title = "Carrinho de Compras";

// Produtos disponíveis (simulação do banco de dados)
$produtos = [
    1 => [
        "nome" => "Copo Descartável 200ml",
        "descricao" => "Copo plástico descartável, ideal para bebidas frias.",
        "preco" => 10.00,
        "imagem" => "Images/copo_img1.jpeg" // Coloque a imagem em uma pasta acessível
    ],
    2 => [
        "nome" => "Prato Descartável 18cm",
        "descricao" => "Prato de plástico resistente, ideal para festas e eventos.",
        "preco" => 15.00,
        "imagem" => "https://via.placeholder.com/200"
    ],
    3 => [
        "nome" => "Talheres Descartáveis (Conjunto)",
        "descricao" => "Kit de garfo, faca e colher descartáveis.",
        "preco" => 8.00,
        "imagem" => "https://via.placeholder.com/200"
    ],
    4 => [
        "nome" => "Embalagem para Comida 500ml",
        "descricao" => "Embalagem térmica para transporte de refeições.",
        "preco" => 20.00,
        "imagem" => "https://via.placeholder.com/200"
    ],
    5 => [
        "nome" => "Guardanapos Descartáveis (Pacote 50 unid.)",
        "descricao" => "Guardanapos de papel, macios e resistentes.",
        "preco" => 5.00,
        "imagem" => "https://via.placeholder.com/200"
    ],

    6 => [
        "nome" => "Tubo de Bioplástico para Drenagem",
        "descricao" => "Tubos de drenagem feitos de bioplástico resistente e sustentável.",
        "preco" => 120.00,
        "imagem" => "Images/Tubo_de_Drenagem.jpg"
    ],
    7 => [
        "nome" => "Bloco Estrutural de Bioplástico",
        "descricao" => "Bloco estrutural feito com biocompostos, ideal para construções sustentáveis.",
        "preco" => 250.00,
        "imagem" => "https://via.placeholder.com/150"
    ],
    8 => [
        "nome" => "Isolante Térmico de Bioplástico",
        "descricao" => "Material de isolamento térmico feito de bioplástico biodegradável.",
        "preco" => 85.00,
        "imagem" => "https://via.placeholder.com/150"
    ],
    9 => [
        "nome" => "Filme Protetor para Janelas",
        "descricao" => "Filme sustentável para proteção de vidros e janelas durante obras.",
        "preco" => 60.00,
        "imagem" => "https://via.placeholder.com/150"
    ],
    10 => [
        "nome" => "Formas para Concreto de Bioplástico",
        "descricao" => "Formas reutilizáveis e biodegradáveis para concretagem em obras.",
        "preco" => 200.00,
        "imagem" => "https://via.placeholder.com/150"
    ],

    11 => [
        "nome" => "Seringa de Bioplástico 5ml",
        "descricao" => "Seringa feita com bioplásticos de fontes renováveis.",
        "preco" => 12.00,
        "imagem" => "https://via.placeholder.com/150"
    ],
    12 => [
        "nome" => "Luva Cirúrgica Biodegradável",
        "descricao" => "Luvas feitas de material biodegradável e compostável.",
        "preco" => 35.00,
        "imagem" => "https://via.placeholder.com/150"
    ],
    13 => [
        "nome" => "Máscara de Bioplástico",
        "descricao" => "Máscara descartável feita de materiais sustentáveis.",
        "preco" => 10.00,
        "imagem" => "https://via.placeholder.com/150"
    ],
    14 => [
        "nome" => "Frasco para Medicamentos 100ml",
        "descricao" => "Frasco reutilizável e reciclável de bioplástico.",
        "preco" => 8.00,
        "imagem" => "https://via.placeholder.com/150"
    ],
    15 => [
        "nome" => "Cápsula de Bioplástico",
        "descricao" => "Cápsulas farmacêuticas feitas com bioplásticos sustentáveis.",
        "preco" => 5.00,
        "imagem" => "https://via.placeholder.com/150"
    ]
];

// Verifica se o carrinho existe e carrega os itens
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];

// Função para remover item do carrinho
if (isset($_POST['remover_item'])) {
    $id = (int)$_POST['produto_id']; // Converte o ID para inteiro
    unset($carrinho[$id]);
    $_SESSION['carrinho'] = $carrinho; // Atualiza o carrinho na sessão
    header("Location: carrinho.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="icon" type="image/x-icon" href="faviconum.png" alt="Favicon"> <!-- Ajuste aqui -->
    <link rel="stylesheet" href="carrinho.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($title); ?></h1>
        <nav>
            <a href="index.php">Voltar para a Página Inicial</a>
            <a href="embalagens.php">Embalagens Descartáveis</a>
            <a href="produtos_medicos.php">Produtos Médicos</a>
            <a href="construcao.php">Construção Civil</a>
        </nav>
    </header>

    <main>
        <?php if (!empty($carrinho)): ?>
            <h2>Itens no seu carrinho:</h2>
            <table>
                <tr>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                <?php
                $total = 0;
                foreach ($carrinho as $idProduto => $item):
                    // Verifica se o ID do produto existe no array de produtos
                    if (isset($produtos[$idProduto])) {
                        $produto = $produtos[$idProduto];
                        $total += $produto['preco'] * $item['quantidade']; // Multiplica pelo número de itens
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                    <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                    <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="produto_id" value="<?php echo $idProduto; ?>">
                            <button type="submit" name="remover_item">Remover</button>
                        </form>
                    </td>
                </tr>
                <?php 
                    } // fim do if
                endforeach; 
                ?>
            </table>
            <p><strong>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></p>
            <button onclick="window.location.href='checkout.php'">Finalizar Compra</button>
        <?php else: ?>
            <p>Seu carrinho está vazio.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Cibele Plastic ©</p>
    </footer>
</body>
</html>
