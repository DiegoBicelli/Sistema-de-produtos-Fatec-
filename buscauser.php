<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    
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

 <!-- Exibe resultados da busca -->
<?php if (isset($usuarios)): ?>
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
<script>
    function preencherCampos(perfilid, nome, email) {
        document.getElementById('nome_usuario').value = nome;
        document.getElementById('inputEmail').value = email;
        document.getElementById('perfilidEditar').value = perfilid;
    }
</script>

<script>
    function editarUsuario(perfilid) {
        window.location.href = "editar.php?editar_perfilid=" + perfilid;
    }
</script>



   

    <script>
        function preencherCampos(perfilid, nome, email) {
            document.getElementById('inpuNome').value = nome;
            document.getElementById('inputEmail').value = email;
            document.getElementById('perfilidEditar').value = perfilid;
        }
    </script>

</body>
</html>
