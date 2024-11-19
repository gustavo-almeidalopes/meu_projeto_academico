<?php
$host = 'localhost';
$db = 'seu_banco_de_dados'; // Substitua pelo nome do seu banco de dados
$user = 'seu_usuario'; // Substitua pelo seu usuário do banco de dados
$pass = 'sua_senha'; // Substitua pela sua senha do banco de dados

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4"; // Define o charset
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Opcional: Define o modo de emulação de prepared statements
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // Em produção, considere logar o erro em vez de exibi-lo
    echo "Erro na conexão: " . $e->getMessage();
}
?>