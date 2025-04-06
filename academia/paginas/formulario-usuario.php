<?php

require_once '../banco/conexao.php';
session_start();


if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso_id'] != 1) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Criar Novo Usuário - Senac Boxe</title>
  <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body>

  <!-- Cabeçalho -->
  <?php require('header.php'); ?>

  <main class="container">
    <h1 class="text-center mt-5">Criar Novo Usuário</h1>

    <!-- Formulário de Inserção -->
    <form action="inserir-usuario.php" method="POST">
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
        <label for="nivel_acesso_id" class="form-label">Nível de Acesso</label>
        <select class="form-select" id="nivel_acesso_id" name="nivel_acesso_id" required>
          <option value="1">Administrador</option>
          <option value="2">Usuário</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Criar Usuário</button>
    </form>
  </main>

  <!-- Footer -->
  <?php require('footer.php'); ?>

</body>

</html>