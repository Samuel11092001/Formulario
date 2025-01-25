
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Corretores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Cadastro de Corretores</h1>

        <!-- Formulário -->
        <form id="corretorForm" action="process.php" method="POST" class="space-y-4">
            <div>
                <label for="cpf" class="block text-gray-700">CPF</label>
                <input type="text" id="cpf" name="cpf" class="w-full border-gray-300 rounded-lg shadow-sm" required minlength="11" maxlength="11">
            </div>
            <div>
                <label for="creci" class="block text-gray-700">Creci</label>
                <input type="text" id="creci" name="creci" class="w-full border-gray-300 rounded-lg shadow-sm" required minlength="2">
            </div>
            <div>
                <label for="name" class="block text-gray-700">Nome</label>
                <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-lg shadow-sm" required minlength="2">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Enviar</button>
        </form>

        <!-- Mensagens de Operação -->
        <?php if (isset($_GET['message'])): ?>
            <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                <?= htmlspecialchars($_GET['message']) ?>
            </div>
        <?php endif; ?>

        <!-- Tabela de Corretores -->
        <div class="mt-6">
            <h2 class="text-xl font-bold mb-2">Corretores Cadastrados</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Nome</th>
                        <th class="border border-gray-300 p-2">CPF</th>
                        <th class="border border-gray-300 p-2">Creci</th>
                        <th class="border border-gray-300 p-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Conexão ao banco e exibição dos registros
                    include 'db.php';
                    $query = "SELECT * FROM corretores";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="border border-gray-300 p-2 text-center"><?= $row['id'] ?></td>
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($row['name']) ?></td>
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($row['cpf']) ?></td>
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($row['creci']) ?></td>
                            <td class="border border-gray-300 p-2 text-center">
                                <a href="edit.php?id=<?= $row['id'] ?>" class="text-blue-500">Editar</a> |
                                <a href="delete.php?id=<?= $row['id'] ?>" class="text-red-500">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('corretorForm').addEventListener('submit', function (event) {
            const cpf = document.getElementById('cpf').value;
            const creci = document.getElementById('creci').value;
            const name = document.getElementById('name').value;

            if (cpf.length !== 11) {
                alert('O CPF deve ter 11 caracteres.');
                event.preventDefault();
            }

            if (creci.length < 2 || name.length < 2) {
                alert('Creci e Nome devem ter pelo menos 2 caracteres.');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
