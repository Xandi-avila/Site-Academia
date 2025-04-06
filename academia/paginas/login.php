<?php

require_once '../banco/conexao.php';

session_start();


if (isset($_SESSION['usuario_id'])) {

  header("Location: administrativo.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

  if ($email && $senha) {

    $query = "SELECT * FROM usuarios WHERE email = ? AND senha = SHA2(?, 256)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

      $usuario = $result->fetch_assoc();
      $_SESSION['usuario_id'] = $usuario['id'];
      $_SESSION['usuario_nome'] = $usuario['nome'];
      $_SESSION['usuario_email'] = $usuario['email'];


      header("Location: administrativo.php");
      exit();
    } else {
      echo "E-mail ou senha inválidos.";
    }
  } else {
    echo "Por favor, preencha os campos de e-mail e senha.";
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
  <link rel="stylesheet" href="../CSS/menu.css">
  <link rel="stylesheet" href="../CSS/login.css">
  <meta name="author" content="Mauricio T Welter">
  <title>Senac Boxe - Login</title>
  <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body class="bg-fundo-claro">
  <!-- cabeçalho -->
  <?php require('header.php'); ?>

  <main class="login-container">
    <div class="login-box">
      <div class="left-side">
        <img src="../Imagens/boxeLogo.png" alt="Senac Boxe Logo" class="logo-senac">
      </div>
      <div class="right-side">
        <h1>LOGIN DE CONTA</h1>
        <form action="login.php" method="post">
          <label for="email">EMAIL</label>
          <input type="email" name="email" id="email" required />

          <label for="senha">SENHA</label>
          <input type="password" name="senha" id="senha" required />

          <div class="options">
            <div>
              <input type="checkbox" id="lembre" />
              <label for="lembre">Lembre de mim</label>
            </div>
            <a href="#">Esqueceu a senha?</a>
          </div>

          <button type="submit" class="btn-login">Login</button>

          <p class="register">
            Não tem uma conta?
            <a href="cadastro.html">Cadastre-se</a>
          </p>
        </form>
      </div>
    </div>
  </main>

</body>

</html>