<?php
include 'db.php'; // Inclui a conexão com o banco de dados

// Para carregar os dados no formulário
if (isset($_GET['id']) ) {
    $id = (int) $_GET['id'];
    $query = "SELECT * FROM corretores WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $corretor = $result->fetch_assoc();
        // Redireciona para edit_form.php com os dados carregados
        header("Location: edit_form.php?id=$id");
        exit();
    } else {
        header("Location: index.php?message=Erro ao carregar dados");
        exit();
    }
} else {
    header("Location: index.php?message=ID inválido");
    exit();
}
?>