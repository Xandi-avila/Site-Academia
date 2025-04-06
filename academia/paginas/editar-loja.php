<?php
require_once '../banco/conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    
    $sql = "SELECT imagem FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $imagem = $row['imagem'];  

    
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        
        $diretorioUpload = '../uploads/';

       
        if (!is_dir($diretorioUpload)) {
            mkdir($diretorioUpload, 0755, true);
        }

        
        $caminhoImagem = $diretorioUpload . basename($_FILES['imagem']['name']);

        
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
            $imagem = $caminhoImagem; 
        } else {
            $mensagem = "Erro ao salvar a imagem.";
        }
    }

    
    $sql = "UPDATE produtos SET nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $nome, $descricao, $preco, $imagem, $id);

    if ($stmt->execute()) {
        $mensagem = "Produto atualizado com sucesso!";
    } else {
        $mensagem = "Erro ao atualizar produto.";
    }

    $stmt->close();
}

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
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
    <title>Editar Produtos - Senac Boxe</title>
    <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body>

    <!-- cabeçalho -->
    <?php require('headeradm.php'); ?>

    <div class="container mt-5">
        <h1 class="text-center">Editar Produtos da Loja</h1>

        <?php if (isset($mensagem)): ?>
            <div class="alert alert-info"><?php echo $mensagem; ?></div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <form method="POST" enctype="multipart/form-data">
                            <td><input type="text" name="nome" value="<?php echo $row['nome']; ?>" class="form-control"></td>
                            <td><input type="text" name="descricao" value="<?php echo $row['descricao']; ?>" class="form-control"></td>
                            <td><input type="number" step="0.01" name="preco" value="<?php echo $row['preco']; ?>" class="form-control"></td>
                            <td>
                                <input type="file" name="imagem" class="form-control">
                                <p class="mt-2">Atual: <a href="<?php echo $row['imagem']; ?>" target="_blank">Ver Imagem</a></p>
                            </td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <?php require('footer.php'); ?>
    
</body>
</html>