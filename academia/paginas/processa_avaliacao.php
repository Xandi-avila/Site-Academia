<?php
require_once '../banco/conexao.php';
session_start();


if (!isset($_SESSION['usuario_id'])) {
    die("Acesso negado. Por favor, faça login para continuar.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuario_id = $_SESSION['usuario_id'];
    $avaliacao_professor = $_POST['avaliacao_professor'] ?? null;
    $avaliacao_aula = $_POST['avaliacao_aula'] ?? null;
    $avaliacao_espaco = $_POST['avaliacao_espaco'] ?? null;
    $sugestao = $_POST['sugestao'] ?? null;

   
    if ($avaliacao_professor && $avaliacao_aula && $avaliacao_espaco) {
       
        $sql = "INSERT INTO mensagens (usuario_id, avaliacao_professor, avaliacao_aula, avaliacao_espaco, sugestao) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $usuario_id, $avaliacao_professor, $avaliacao_aula, $avaliacao_espaco, $sugestao);

        if ($stmt->execute()) {
            echo "<p class='alert alert-success'>Sua avaliação foi enviada com sucesso!</p>";
        } else {
            echo "<p class='alert alert-danger'>Erro ao salvar sua avaliação: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p class='alert alert-danger'>Por favor, preencha todos os campos obrigatórios.</p>";
    }
}
?>
