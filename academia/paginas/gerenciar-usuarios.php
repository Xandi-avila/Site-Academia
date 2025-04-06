<?php

require_once '../banco/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_nome = $_SESSION['usuario_nome'];
$usuario_email = $_SESSION['usuario_email'];


if (isset($_POST['adicionar_usuario'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel_acesso = $_POST['nivel_acesso'];


    $sql_check_email = "SELECT id FROM usuarios WHERE email = '$email'";
    $resultado_check = $conn->query($sql_check_email);

    if ($resultado_check->num_rows > 0) {
        echo "<div class='alert alert-danger'>O email '$email' já está cadastrado!</div>";
    } else {

        $senha_hash = hash('sha256', $senha);


        $sql_insert = "INSERT INTO usuarios (nome, email, senha, nivel_acesso_id) VALUES ('$nome', '$email', '$senha_hash', '$nivel_acesso')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "<div class='alert alert-success'>Usuário adicionado com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao adicionar o usuário: " . $conn->error . "</div>";
        }
    }
}


$sql = "SELECT id, nome, email, nivel_acesso_id, foto FROM usuarios WHERE nivel_acesso_id = 1";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $usuarios = [];
    while ($row = $resultado->fetch_assoc()) {
        $usuarios[] = $row;
    }
} else {
    $usuarios = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/administrativo.css">
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/editar-agendamentos.css">
    <meta name="author" content="Mauricio T Welter">
    <title>Gerenciar usuarios - Senac Boxe</title>
    <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>


<body>
    <!-- cabeçalho -->
    <?php require('headeradm.php'); ?>

    <main class="container">
        <h1 class="text-center mt-5">Gerenciar Usuários</h1>


        <div class="admin-info">
            <h3>Olá, <?php echo $usuario_nome; ?>!</h3>
            <p>Email: <?php echo $usuario_email; ?></p>
            <p>Aqui você pode gerenciar os usuários do sistema.</p>
        </div>

        <h3 class="mt-4">Adicionar Novo Usuário</h3>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="mb-3">
                <label for="nivel_acesso" class="form-label">Nível de Acesso</label>
                <select class="form-select" id="nivel_acesso" name="nivel_acesso" required>
                    <option value="1">Administrador</option>
                    <option value="2">Usuário</option>
                </select>
            </div>
            <button type="submit" name="adicionar_usuario" class="btn btn-primary">Adicionar Usuário</button>
        </form>


        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Nível de Acesso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($usuarios)) {
                    foreach ($usuarios as $usuario) {

                        $foto_usuario = isset($usuario['foto']) ? $usuario['foto'] : null;

                        echo "<tr>";


                        echo "<td>";
                        if ($foto_usuario && file_exists($foto_usuario)) {
                            echo "<img src='" . $foto_usuario . "' alt='Foto' class='img-thumbnail' style='width: 70px; height: 70px; object-fit: cover;'>";
                        } else {
                            echo "<i class='fas fa-user-circle' style='font-size: 70px;'></i>";
                        }
                        echo "</td>";

                        echo "<td>" . $usuario['id'] . "</td>";
                        echo "<td>" . $usuario['nome'] . "</td>";
                        echo "<td>" . $usuario['email'] . "</td>";

                        if ($usuario['nivel_acesso_id'] == 1) {
                            echo "<td>Administrador</td>";
                        } else {
                            echo "<td>Usuário</td>";
                        }

                        echo "<td><a href='editar-usuario.php?id=" . $usuario['id'] . "' class='btn btn-primary btn-sm'>Editar</a> 
                        <a href='excluir-usuario.php?id=" . $usuario['id'] . "' class='btn btn-danger btn-sm'>Excluir</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Nenhum usuário encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <?php require('footer.php'); ?>

</body>

</html>