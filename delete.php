<?php
include 'db.php'; // Inclui a conexão com o banco de dados

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM corretores WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Registro excluído com sucesso");
    } else {
        header("Location: index.php?message=Erro ao excluir");
    }
    $stmt->close();
}
?>
