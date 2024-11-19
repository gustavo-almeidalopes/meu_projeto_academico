<?php
// Ativar a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura e sanitiza os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Configuração do destinatário e conteúdo do email
    $to = "seuemail@dominio.com"; // Altere para seu e-mail
    $subject = "Contato de: $nome";
    $body = "Nome: $nome\nE-mail: $email\nMensagem: $mensagem";
    $headers = "From: $email";

    // Exibe uma página de resposta com os dados recebidos
    if (mail($to, $subject, $body, $headers)) {
        echo "<!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Contato Enviado</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #252525; color: #f5f5f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .message { text-align: center; max-width: 400px; padding: 20px; background-color: #333; border-radius: 8px; }
                a { color: #007BFF; text-decoration: none; }
                a:hover { text-decoration: underline; }
            </style>
        </head>
        <body>
            <div class='message'>
                <h1>Mensagem enviada com sucesso!</h1>
                <p>Obrigado por entrar em contato, <strong>$nome</strong>!</p>
                <p><strong>E-mail:</strong> $email</p>
                <p><strong>Mensagem:</strong> $mensagem</p>
                <p>Sua mensagem foi enviada e será respondida em breve.</p>
                <p><a href='form.php'>Voltar ao formulário</a></p>
            </div>
        </body>
        </html>";
    } else {
        echo "<!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Erro ao Enviar</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #252525; color: #f5f5f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .message { text-align: center; max-width: 400px; padding: 20px; background-color: #333; border-radius: 8px; }
                a { color: #007BFF; text-decoration: none; }
                a:hover { text-decoration: underline; }
            </style>
        </head>
        <body>
            <div class='message'>
                <h1>Erro ao enviar a mensagem</h1>
                <p>Desculpe, <strong>$nome</strong>. Ocorreu um problema ao enviar sua mensagem. Por favor, tente novamente mais tarde.</p>
                <p><a href='form.php'>Voltar ao formulário</a></p>
            </div>
        </body>
        </html>";
    }
}
?>