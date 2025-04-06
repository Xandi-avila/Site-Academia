<?php

require_once '../banco/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}


if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];

    
    $sql_delete = "DELETE FROM usuarios WHERE id = $usuario_id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<div class='alert alert-success'>Usuário excluído com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao excluir o usuário: " . $conn->error . "</div>";
    }
}


header("Location: gerenciar-usuarios.php");
exit();
?>
