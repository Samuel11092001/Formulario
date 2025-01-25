<?php
include 'db.php'; // Inclui a conexão com o banco de dados

// Para carregar os dados no formulário
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $query = "SELECT * FROM corretores WHERE id = $id";
    $result = $conn->query($query);
    $corretor = $result->fetch_assoc();
}

// Para salvar alterações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
    $creci = $_POST['creci'];
    $name = $_POST['name'];

    $stmt = $conn->prepare("UPDATE corretores SET cpf = ?, creci = ?, name = ? WHERE id = ?");
    $stmt->bind_param("sssi", $cpf, $creci, $name, $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Registro atualizado com sucesso");
    } else {
        header("Location: index.php?message=Erro ao atualizar registro");
    }
    $stmt->close();
}
?>
