<?php
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "172.17.239.20";
    $username = "root";
    $password = "12345digaz";
    $dbname = "PowerStar";

    // Criação da conexão
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verificar se as variáveis estão definidas e não são vazias
    if (isset($_POST['perfilid'], $_POST['nome_usuario']) && !empty($_POST['nome_usuario'])) {
        $perfilid = $_POST['perfilid'];
        $nome = $_POST['nome_usuario'];

        // Utilizando prepared statement para prevenir SQL injection
        $sql = "UPDATE Usuario SET Nome = ? WHERE perfilid = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $conn->error);
        }

        $stmt->bind_param('si', $nome, $perfilid);
        $stmt->execute();

        // Verifica se a atualização foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            $success_message = "Alteração realizada com sucesso!";
        } else {
            $success_message = "Nenhuma alteração realizada. Verifique se os dados são diferentes.";
        }

        $stmt->close();
        $conn->close();
    } else {
        $success_message = "Parâmetros inválidos para a edição.";
    }
}
?>

<!-- Adicione a exibição da mensagem de sucesso no HTML -->
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Edição de Usuário</title>
</head>
<body>

    <div class="card">
        <a href="buscauser.php">Voltar</a>
        
        <h3>Editar Usuário</h3>
        <form action="processar_edicao.php" method="POST">
            <input type="hidden" name="perfilid" value="<?= $usuario['perfilid'] ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome_usuario" value="<?= $usuario['Nome'] ?>">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?= $usuario['email'] ?>">

            <!-- Adicione outros campos conforme necessário -->

            <button type="submit">Salvar Alterações</button>
        </form>

        <!-- Adicione a exibição da mensagem de sucesso -->
        <?php if (!empty($success_message)): ?>
            <script>
                alert("<?= $success_message ?>");
                window.location.href = 'buscauser.php';
            </script>
        <?php endif; ?>
    </div>

</body>
</html>
