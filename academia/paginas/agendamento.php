<?php
require_once '../banco/conexao.php';
session_start();


if (!isset($_SESSION['usuario_id'])) {
    $login_necessario = true;  
} else {
    $login_necessario = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$login_necessario) {
    $data_agendamento = $_POST['data'];
    $professor_id = $_POST['professor'];

    if (empty($data_agendamento) || empty($professor_id)) {
        echo "<p class='alert alert-danger'>Por favor, preencha todos os campos.</p>";
        exit;
    }

    $sql = "INSERT INTO agendamentos (usuario_id, professor_id, data_agendamento, duracao, status, data_criacao)
            VALUES (?, ?, ?, 60, 'pendente', NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "iis",
        $_SESSION['usuario_id'], 
        $professor_id,
        $data_agendamento
    );

    if ($stmt->execute()) {
        echo "<p class='alert alert-success'>Treino agendado com sucesso!</p>";
    } else {
        echo "<p class='alert alert-danger'>Erro ao agendar o treino: " . $stmt->error . "</p>";
    }

    $stmt->close();
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
    <title>Senac Boxe</title>
    <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
    <style>
        .btn-gold {
            background-color: #333;
            color: white;
            border: none;
        }

        .btn-gold:hover {
            background-color: #777;
            color: #fff;
        }
    </style>
</head>

<body>

  <!-- cabeçalho -->
  <?php require('header.php'); ?>

  <!-- Seção Agendamento-->
  <div class="container mt-5">
    <h2 class="text-center">Agende Seu Treino Gratuito e Comece Sua Jornada de Melhoramento!</h2>
    
    <?php if ($login_necessario): ?>
        <div class="alert alert-warning text-center">
            Você precisa estar logado para agendar um treino. <a href="login.php">Clique aqui para fazer login</a>.
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-header bg-gold text-white">
                Agende Aqui o seu treino teste sem custo e comece sua jornada com a gente!
            </div>
            <div class="card-body">
                <p>O treino pode ser marcado sem custos com o objetivo de experimentar. Aproveite também essa oportunidade para
                conhecer nossas instalações e profissionais!</p>
                <form id="formulario-agendamento" action="agendamento.php" method="POST">
                    <div class="mb-3">
                        <label for="data" class="form-label">Data do Treino:</label>
                        <input type="datetime-local" id="data" name="data" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="professor" class="form-label">Professor:</label>
                        <select id="professor" name="professor" class="form-select" required>
                            <option value="" disabled selected>Selecione o Professor</option>
                            <option value="9">Professor João Silva</option>
                            <option value="10">Professora Maria Santos</option>
                            <option value="11">Professor Carlos Oliveira</option>
                            <option value="12">Professora Marcia Saraiva</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-gold">Agendar Treino</button>
                </form>
            </div><!--Fim da div card-body-->
        </div><!--Fim da div Card-->
    <?php endif; ?>

  </div><!--Fim da div container mt-5-->

  <!-- Seção de Avaliação -->
  <div class="container mt-5">
    <h3 class="text-center">Se já fez sua aula e curtiu, Avalie sua experiência!</h3>
    <div class="d-flex justify-content-center">
      <a href="avalie_exp.php" class="btn btn-gold btn-lg">Avaliar Experiência</a>
    </div>
  </div>

  <!-- Seção do Mapa -->
  <?php require('mapa.php'); ?>

  <div class="footer-linha-container"></div>

  <!-- footer -->
  <?php require('footer.php'); ?>
</body>

</html>
