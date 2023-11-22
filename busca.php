<?php
$servername = "172.17.239.20";
$username = "root";
$password = "12345digaz";
$dbname = "PowerStar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se há um parâmetro de busca
if (isset($_GET['nome_usuario'])) {
    $nome = "%" . trim($_GET['nome_usuario']) . "%";

    // Utilizando prepared statement para prevenir SQL injection
    $sql = "SELECT perfilid, Nome, senha, resenha, email FROM Usuario WHERE Nome LIKE ?";
    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $conn->error);
    }

    // Associa a variável $nome ao parâmetro da consulta
    $stmt->bind_param('s', $nome);

    // Executa a consulta
    $stmt->execute();

    // Obtém os resultados da consulta
    $result = $stmt->get_result();

    $usuarios = array();

    if ($result->num_rows > 0) {
        // Armazena os resultados em um array
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }

    // Fecha o statement
    $stmt->close();
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Gerenciamento de Usuários</title>
</head>
<body>

    <div class="card">
        <a href="../">Voltar</a>
        
        <h3>Buscar Usuário</h3>
        <form action="busca.php" method="GET">
            <label for="nome_usuario">Nome do usuário:</label>
            <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Insira um nome">
            <button id="botaobuscar">Buscar</button>
        </form>

        <?php if (isset($usuarios)): ?>
            <!-- Exibe resultados da busca -->
            <h3>Resultados da Busca</h3>
            <table>
                <tr>
                    <th>Perfil ID</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Resenha</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario["perfilid"] ?></td>
                        <td><?= $usuario["Nome"] ?></td>
                        <td><?= $usuario["senha"] ?></td>
                        <td><?= $usuario["resenha"] ?></td>
                        <td><?= $usuario["email"] ?></td>
                        <td>
                            <a href="editar.php?editar_perfilid=<?= $usuario['perfilid'] ?>">Editar</a>
                            <form style="display:inline;" action="busca.php" method="POST">
                                <input type="hidden" name="excluir_perfilid" value="<?= $usuario['perfilid'] ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

    </div>

</body>
</html>
