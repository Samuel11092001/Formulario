<?php
include 'db.php'; // Inclui a conexão com o banco de dados

// Verifica se o id foi passado e é válido
if (isset($_GET['id']) ) {
    $id = (int) $_GET['id'];
    $query = "SELECT * FROM corretores WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $corretor = $result->fetch_assoc();
    } else {
        header("Location: index.php?message=Erro ao carregar dados");
        exit();
    }
} else {
    header("Location: index.php?message=ID inválido");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Corretor</title>

    <!-- Link para o Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <!-- Cabeçalho -->
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Editar Corretor</h1>

        <!-- Formulário de edição -->
        <form action="edit.php" method="POST" class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            <input type="hidden" name="id" value="<?= $corretor['id'] ?>">

            <!-- Campo CPF -->
            <div class="mb-4">
                <label for="cpf" class="block text-gray-700 font-medium mb-2">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?= $corretor['cpf'] ?>" required 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Campo CRECI -->
            <div class="mb-4">
                <label for="creci" class="block text-gray-700 font-medium mb-2">CRECI:</label>
                <input type="text" id="creci" name="creci" value="<?= $corretor['creci'] ?>" required 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Campo Nome -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nome:</label>
                <input type="text" id="name" name="name" value="<?= $corretor['name'] ?>" required 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Botão de Salvar -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Salvar
                </button>
            </div>
        </form>

    </div>
</body>
</html>