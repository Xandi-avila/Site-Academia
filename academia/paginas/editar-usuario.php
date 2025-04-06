<?php 
require_once '../banco/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_nome = $_SESSION['usuario_nome'];
$usuario_email = $_SESSION['usuario_email'];

if (isset($_POST['editar_usuario'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nivel_acesso = $_POST['nivel_acesso'];

    
    $diretorio = "../fotos/usuarios/";

    
    if (!file_exists($diretorio)) {
        mkdir($diretorio, 0777, true); 
    }

    
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto_temp = $_FILES['foto']['tmp_name'];
        $foto_nome = $_FILES['foto']['name'];
        $foto_ext = pathinfo($foto_nome, PATHINFO_EXTENSION);

        
        $foto_nome_final = uniqid('foto_', true) . '.' . $foto_ext;

        $foto_destino = $diretorio . $foto_nome_final;

        
        if (move_uploaded_file($foto_temp, $foto_destino)) {
        } else {
            echo "Erro ao mover o arquivo para o diretório.";
        }

        
        $sql_update = "UPDATE usuarios SET nome = '$nome', email = '$email', nivel_acesso_id = '$nivel_acesso', foto = '$foto_destino' WHERE id = '$id'";
    } else {
        
        $sql_update = "UPDATE usuarios SET nome = '$nome', email = '$email', nivel_acesso_id = '$nivel_acesso' WHERE id = '$id'";
    }

    if ($conn->query($sql_update) === TRUE) {
        echo "<div class='alert alert-success'>Usuário atualizado com sucesso!</div>";
        
        echo "<meta http-equiv='refresh' content='2;url=gerenciar-usuarios.php'>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar o usuário: " . $conn->error . "</div>";
    }
}


if (isset($_POST['deletar_foto']) && isset($_GET['id'])) {
    $usuario_id = $_GET['id'];
    $sql_select = "SELECT foto FROM usuarios WHERE id = '$usuario_id'";
    $resultado = $conn->query($sql_select);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $foto_atual = $usuario['foto'];

        
        if (file_exists($foto_atual)) {
            unlink($foto_atual); 
            
            $sql_update = "UPDATE usuarios SET foto = NULL WHERE id = '$usuario_id'";
            if ($conn->query($sql_update) === TRUE) {
                echo "<div class='alert alert-success'>Foto deletada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao deletar a foto do usuário: " . $conn->error . "</div>";
            }
        }
    }
}

if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];
    $sql_select = "SELECT id, nome, email, nivel_acesso_id, foto FROM usuarios WHERE id = '$usuario_id'";
    $resultado = $conn->query($sql_select);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>Usuário não encontrado</div>";
        exit();
    }
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
    <meta name="author" content="Mauricio T Welter">
    <title>Administração - Senac Boxe</title>
    <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>
<body>

<?php require('header.php'); ?>

<main class="container">
    <h1 class="text-center mt-5">Editar Usuário</h1>

    <div class="admin-info">
        <h3>Olá, <?php echo $usuario_nome; ?>!</h3>
        <p>Email: <?php echo $usuario_email; ?></p>
        <p>Aqui você pode editar as informações dos usuários do sistema.</p>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="nivel_acesso" class="form-label">Nível de Acesso</label>
            <select class="form-select" id="nivel_acesso" name="nivel_acesso" required>
                <option value="1" <?php echo ($usuario['nivel_acesso_id'] == 1) ? 'selected' : ''; ?>>Administrador</option>
                <option value="2" <?php echo ($usuario['nivel_acesso_id'] == 2) ? 'selected' : ''; ?>>Usuário</option>
            </select>
        </div>

        <!-- Campo de upload da foto -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <?php if ($usuario['foto']): ?>
                <div class="mt-2">
                    <p><strong>Foto Atual:</strong></p>
                    <img src="<?php echo $usuario['foto']; ?>" alt="Foto do Usuário" class="img-thumbnail" width="100">
                   
                    <button type="submit" name="deletar_foto" class="btn btn-danger mt-2">Deletar Foto</button>
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" name="editar_usuario" class="btn btn-primary">Atualizar Usuário</button>
    </form>
</main>

<?php require('footer.php'); ?>

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }

    footer {
        margin-top: auto;
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 20px 0;
    }
</style>

</body>
</html>
