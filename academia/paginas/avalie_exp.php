<?php
require_once '../banco/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    die("Acesso negado. Por favor, faça login para continuar.");
}

$mensagem = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $avaliacao_professor = $_POST['avaliacao_professor'];
    $avaliacao_aula = $_POST['avaliacao_aula'];
    $avaliacao_espaco = $_POST['avaliacao_espaco'];
    $sugestao = $_POST['sugestao'];

    
    if (empty($avaliacao_professor) || empty($avaliacao_aula) || empty($avaliacao_espaco)) {
        $mensagem = "<p class='alert alert-danger'>Por favor, preencha todos os campos obrigatórios.</p>";
    } else {
      
        $sql = "INSERT INTO mensagens (usuario_id, avaliacao_professor, avaliacao_aula, avaliacao_espaco, sugestao, data_criacao) 
                VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "issss",
            $_SESSION['usuario_id'],
            $avaliacao_professor,
            $avaliacao_aula,
            $avaliacao_espaco,
            $sugestao
        );

        if ($stmt->execute()) {
            $mensagem = "<p class='alert alert-success'>Sua avaliação foi enviada com sucesso!</p>";
        } else {
            $mensagem = "<p class='alert alert-danger'>Erro ao enviar a avaliação: " . $stmt->error . "</p>";
        }

        $stmt->close();
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
    <link rel="stylesheet" href="../CSS/agendamento.css">
    <link rel="stylesheet" href="../CSS/menu.css">
    <meta name="author" content="Mauricio T Welter">
    <link rel="stylesheet" href="../CSS/editar-agendamentos.css">
    <title>Avaliação - Senac Boxe</title>
    <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

    <?php require('header.php'); ?>
    <div class="container mt-5">
        <h2 class="text-center">Avalie Sua Experiência!</h2>
        <div class="card">
            <div class="card-body">
                <p>Nos conte o que achou sobre nossos serviços. Sua opinião é muito importante para nós!</p>
          
                <?php if (!empty($mensagem)) echo $mensagem; ?>
                <form id="formulario-avaliacao" action="" method="POST">
                    <div class="mb-3">
                        <label for="avaliacao-professor" class="form-label">O que achou do professor?</label>
                        <select id="avaliacao-professor" name="avaliacao_professor" class="form-select" required>
                            <option value="" disabled selected>Selecione</option>
                            <option value="bom">Bom</option>
                            <option value="medio">Médio</option>
                            <option value="ruim">Ruim</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="avaliacao-aula" class="form-label">O que achou da aula?</label>
                        <select id="avaliacao-aula" name="avaliacao_aula" class="form-select" required>
                            <option value="" disabled selected>Selecione</option>
                            <option value="bom">Bom</option>
                            <option value="medio">Médio</option>
                            <option value="ruim">Ruim</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="avaliacao-espaco" class="form-label">O que achou do espaço?</label>
                        <select id="avaliacao-espaco" name="avaliacao_espaco" class="form-select" required>
                            <option value="" disabled selected>Selecione</option>
                            <option value="bom">Bom</option>
                            <option value="medio">Médio</option>
                            <option value="ruim">Ruim</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sugestao" class="form-label">Caso tenha alguma sugestão:</label>
                        <textarea id="sugestao" name="sugestao" class="form-control" rows="4"
                            placeholder="Escreva aqui..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-gold">Enviar Avaliação</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Seção do Mapa -->
    <?php require('mapa.php'); ?>

    <div class="footer-linha-container"></div>

    <!-- footer -->
    <?php require('footer.php'); ?>
</body>

</html>
