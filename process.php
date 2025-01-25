<?php
include 'db.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $creci = $_POST['creci'];
    $name = $_POST['name'];

    // Validação dos dados
    if (strlen($cpf) === 11 && strlen($creci) >= 2 && strlen($name) >= 2) {
        $stmt = $conn->prepare("INSERT INTO corretores (cpf, creci, name) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $cpf, $creci, $name);
        if ($stmt->execute()) {
            header("Location: index.php?message=Cadastro realizado com sucesso");
        } else {
            header("Location: index.php?message=Erro ao cadastrar");
        }
        $stmt->close();
    } else {
        header("Location: index.php?message=Dados inválidos");
    }
}
?>
