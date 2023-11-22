<?php
// Configurações do banco de dados
$servername = "172.17.239.20";
$username = "root";
$password = "12345digaz";
$dbname = "PowerStar";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['editar_perfilid'])) {
    $editar_perfilid = $_GET['editar_perfilid'];

    // Consulta para obter os dados do usuário com base no perfilid
    $sql = "SELECT perfilid, Nome, senha, resenha, email FROM Usuario WHERE perfilid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $editar_perfilid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Usuário não encontrado.";
        exit;
    }

    $stmt->close();
} else {
    echo "ID de usuário não especificado.";
    exit;
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <title>Edição de Usuário</title>
    
</head>
<body>


    <div>
    <div class="card">
        <a href="buscauser.php">Voltar</a>
        
        <h3>Editar Usuário</h3>
        <!-- Adicione a tag de abertura do formulário -->
        <form action="processar_edicao.php" method="POST">
            <input type="hidden" name="perfilid" value="<?= $usuario['perfilid'] ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome_usuario" value="<?= $usuario['Nome'] ?>">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?= $usuario['email'] ?>">

            <!-- Adicione outros campos conforme necessário -->

            <button type="submit">Salvar Alterações</button>
        </form> <!-- Adicione a tag de fechamento do formulário -->
    </div>
</div>
</body>
</html>
