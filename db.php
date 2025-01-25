<?php
$host = 'localhost';       // Endereço do servidor MySQL (geralmente "localhost" em ambiente local)
$user = 'root';            // Usuário do MySQL (padrão "root" no XAMPP)
$password = '';            // Senha do MySQL (geralmente em branco no XAMPP)
$database = 'corretores_db'; // Nome do banco de dados que você criou no phpMyAdmin

// Criando a conexão com o MySQL
$conn = new mysqli($host, $user, $password, $database);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Mensagem opcional para confirmar que a conexão foi bem-sucedida
// echo "Conexão bem-sucedida!";
?>
