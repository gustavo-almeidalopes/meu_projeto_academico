<?php
// Início da sessão
session_start();
$faviconPath = "faviconum.png";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membros do Grupo</title>
    <link rel="icon" type="image/x-icon" href="<?php echo htmlspecialchars($faviconPath); ?>" alt="Favicon">
    <link rel="stylesheet" href="membros.css">
</head>
<body>
    <header class="home_section">
        <div class="container">
            <nav class="home_logo">
                <a class="logo_menu" href="index.php">
                    <img id="logo" src="alternativelogo.png" alt="Logo da Cibele Plastic">
                </a>
            </nav>
        </div>
    </header>
    
    <main>
        <h1>Membros do Grupo</h1>
        <div class="members">
            <div class="member">
                <img src="gustavo.jpg" alt="Gustavo Lopes">
                <h2>Gustavo Lopes</h2>
                <h3>RGM: 3XX83XX8</h3>
                <p><strong>Desenvolvedor Front-end e Back-end</strong></p>
                <p><strong>Funções:</strong></p>
                <ul>
                    <li>Implementação de códigos PHP nas páginas principais do site: index.php, embalagens.php, construcao.php e produtos_medicos.php, incluindo configuração do carrinho de compras e gestão de sessões.</li>
                    <li>Criação e estilização de arquivos CSS e JavaScript para a página index.php, assegurando uma apresentação visual atraente.</li>
                    <li>Desenvolvimento do sistema de carrinho de compras, integrando funcionalidades como adicionar, remover e atualizar produtos.</li>
                    <li>Integração do carrinho.php com checkout.php, garantindo a correta passagem de dados durante a finalização da compra.</li>
                </ul>
                <p><strong>Estruturas e Ferramentas Utilizadas:</strong></p>
                <ul>
                    <li>PHP para lógica de servidor e manipulação de dados.</li>
                    <li>HTML e CSS para estrutura e estilo das páginas.</li>
                    <li>JavaScript para interatividade em tempo real.</li>
                </ul>
            </div>
            <div class="member">
                <img src="matheus.webp" alt="Matheus Souza">
                <h2>Matheus Souza</h2>
                <h3>RGM: 3XX14XX3</h3>
                <p><strong>Desenvolvedor Back-end e Revisor de Código</strong></p>
                <p><strong>Funções:</strong></p>
                <ul>
                    <li>Implementação de códigos PHP nas páginas carrinho.php, membros.php e checkout.php, contribuindo para a funcionalidade geral do sistema de e-commerce.</li>
                    <li>Criação de arquivos CSS para garantir consistência visual e responsividade em todas as páginas.</li>
                    <li>Revisão minuciosa das variáveis e lógica de todas as páginas, assegurando interações corretas entre os componentes do site.</li>
                </ul>
                <p><strong>Estruturas e Ferramentas Utilizadas:</strong></p>
                <ul>
                    <li>PHP para lógica de negócios e manipulação de sessões.</li>
                    <li>HTML e CSS para apresentação dos produtos e layout geral do site.</li>
                    <li>Controle de Versão (Git) para gerenciamento de alterações no código.</li>
                </ul>
            </div>
        </div>
    </main>

    <footer class="footer_informs">
        <nav class="most_informs">
            <div class="footer_category">
                <label class="category"><h3>Categorias</h3></label>
                <section class="category_footer">
                    <aside class="categorys">
                        <a class="utensils" href="#"><h4>Utensílios</h4></a>
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