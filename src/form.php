<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    <link rel="icon" type="image/x-icon" href="faviconum.png" alt="Favicon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            font-family: "Montserrat", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000000; /* Fundo preto */
            color: #f5f5f5; /* Texto em cinza claro */
        }

        .container {
            max-width: 400px; /* Largura reduzida do formulário */
            margin: 50px auto;
            padding: 20px;
            background-color: #252525; /* Cor da carta */
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
            text-align: left; /* Alinhamento à esquerda para o texto */
        }

        h1 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 20px;
            color: #f5f5f5; /* Título em cinza claro */
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 700;
            color: #f5f5f5; /* Labels em cinza claro */
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #444; /* Borda cinza escura */
            border-radius: 4px;
            background-color: #333; /* Fundo dos campos */
            color: #f5f5f5; /* Texto em cinza claro */
            font-size: 14px; /* Tamanho de fonte menor */
        }

        input[type="submit"] {
            background-color: #007BFF; /* Cor do botão de envio */
            color: #f5f5f5; /* Texto do botão em cinza claro */
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 700;
            transition: background-color 0.3s ease;
            width: 100%; /* Botão ocupa toda a largura do formulário */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Cor do botão ao passar o mouse */
        }

        .message {
            display: none; /* Inicialmente escondida */
            margin-top: 20px;
            text-align: center; /* Centraliza o texto da mensagem */
            font-size: 20px; /* Tamanho da fonte da mensagem de agradecimento */
            color: #f5f5f5; /* Cor da mensagem */
            width: 100%; /* Largura total */
        }

        .home_section {
    padding: 10px 0;
    text-align: center;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 960px;
        margin: 0 auto;
    }

    .logo_menu {
        display: inline-block;
        margin-right: 20px; /* Ajuste a margem conforme necessário */
    }

    .logo_menu img {
        max-width: 200px; /* Define a largura máxima do logo */
        height: auto; /* Mantém a proporção da altura conforme a largura */
    }
    </style>
</head>
<body>
<header class="home_section">
        <div class="container">
            <nav class="home_logo">
                <a class="logo_menu" href="index.php">
                    <img id="logo" src="alternativelogo.png" alt="Logo da Cibele Plastic">
                </a>
            </nav>
    </header>

    <div class="container">
        <h1>Contato</h1>
        <form id="contactForm" action="processa_contato.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mensagem:</label>
            <textarea id="message" name="mensagem" required></textarea>

            <input type="submit" value="Enviar">
        </form>
        <div class="message" id="thankYouMessage">
            Agradecemos sinceramente pelo seu contato! Sua mensagem é muito importante para nós e será respondida o mais breve possível.
        </div>
    </div>

    <script>
        const form = document.getElementById('contactForm');
        const thankYouMessage = document.getElementById('thankYouMessage');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio real do formulário
            form.style.display = 'none'; // Oculta o formulário
            thankYouMessage.style.display = 'block'; // Exibe a mensagem de agradecimento
            form.reset(); // Opcional: limpa os campos do formulário
        });
    </script>
</body>
</html>