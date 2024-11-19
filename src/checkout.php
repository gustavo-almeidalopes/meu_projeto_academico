<?php
session_start();

$title = "Finalizar Compra";

// Verifica se o carrinho está vazio
if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php");
    exit;
}

// Lista de produtos no carrinho
$carrinho = $_SESSION['carrinho'];
$total = 0;

foreach ($carrinho as $item) {
    $total += $item['preco'] * $item['quantidade'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="icon" type="image/x-icon" href="faviconum.png" alt="Favicon"> <!-- Ajuste aqui -->
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($title); ?></h1>
        <nav>
            <a href="carrinho.php">Voltar para o Carrinho</a>
            <a href="index.php">Voltar para a Página Inicial</a>
        </nav>
    </header>

    <main>
        <h2>Resumo da Compra</h2>
        <table>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>
            <?php foreach ($carrinho as $idProduto => $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['nome']); ?></td>
                <td><?php echo htmlspecialchars($item['quantidade']); ?></td>
                <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><strong>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></p>

        <h2>Escolha a Forma de Pagamento</h2>
        <form method="post" action="processar_pagamento.php">
            <label>
                <input type="radio" name="pagamento" value="pix" required>
                Pagar com Pix
            </label><br>
            <label>
                <input type="radio" name="pagamento" value="cartao" required>
                Pagar com Cartão de Crédito
            </label><br>
            <label>
                <input type="radio" name="pagamento" value="boleto" required>
                Pagar com Boleto
            </label><br>
            <button type="submit">Finalizar Pagamento</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Cibele Plastic ©</p>
    </footer>
</body>
</html>