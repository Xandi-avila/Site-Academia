<?php
require_once '../banco/conexao.php'; 
session_start();


if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}


$mensagem = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE professores SET nome = ?, especialidade = ?, descricao = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $especialidade, $descricao, $id);

    if ($stmt->execute()) {
        $mensagem = "<p class='alert alert-success'>Alteração realizada com sucesso!</p>";
    } else {
        $mensagem = "<p class='alert alert-danger'>Erro ao atualizar professor: " . $stmt->error . "</p>";
    }
    $stmt->close();
}


$sql = "SELECT * FROM professores";
$result = $conn->query($sql);
$professores = $result->fetch_all(MYSQLI_ASSOC);
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
    <title>Editar Professores - Senac Boxe</title>
    <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body>
    <!-- cabeçalho -->
    <?php require('headeradm.php'); ?>

    <div class="container">
        <h1 class="mt-4">Editar Professores</h1>

        <?php if ($mensagem): ?>
            <div class="mb-4">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <?php foreach ($professores as $professor): ?>
        <form method="POST" class="mb-4">
            <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">
            <div class="mb-3">
                <label for="nome-<?php echo $professor['id']; ?>">Nome</label>
                <input type="text" id="nome-<?php echo $professor['id']; ?>" name="nome" value="<?php echo $professor['nome']; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="descricao-<?php echo $professor['id']; ?>">Descrição</label>
                <textarea id="descricao-<?php echo $professor['id']; ?>" name="descricao" class="form-control"><?php echo $professor['descricao']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        <?php endforeach; ?>
    </div>

    <!-- Footer -->
    <?php require('footer.php'); ?>
</body>

</html>
