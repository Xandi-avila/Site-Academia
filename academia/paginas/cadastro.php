<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/telaInicial.css">
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/cadastro.css">
    <meta name="author" content="Mauricio T Welter">
    <title>Senac Boxe</title>
    <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body>

    <!--Navbar-->
    <div id="nav">
      <input type="checkbox" id="bt_menu" />
      <label for="bt_menu">&#9776</label>
      <nav id="menu">
        <img src="../Imagens/boxeLogo.png" alt="Logo" class="logo">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="agendamento.php">Agendamento</a></li>
          <li><a href="professores.php">Professores</a></li>
          <li><a href="espaco.php">Espaço</a></li>
          <li><a href="compras.php">Loja</a></li>
        </ul>
        <a href="login.php" class="login-icon"><i class="fas fa-user"></i></a>
      </nav>
    </div>
  </header>

    <div class="login-container">
        <div class="login-box">
            <div class="right-side">
                <h1>Cadastro</h1>

                <form action="#" method="post">
                    <!-- Nome -->
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>

                    <!-- Sobrenome -->
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" id="sobrenome" name="sobrenome" required>

                    <!-- Telefone -->
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" required>

                    <!-- CPF -->
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" required>

                    <!-- CEP -->
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" required>

                    <!-- Cidade -->
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" required>

                    <!-- Estado -->
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <option value="">Selecione</option>
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="MG">Minas Gerais</option>

                    </select>

                    <!-- Botão de Envio -->
                    <button type="submit" class="btn-login">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer-linha-container"></div>

<footer>
  <div class="footer-links">
    <nav>
      <ul class="linkesq">
        <li><a href="https://www.senacrs.com.br/faleconosco" target="_blank">Fale Conosco</a></li>
        <li><a href="https://www.senacrs.com.br/lgpd" target="_blank">Proteção e Privacidade de Dados - LGPD</a></li>
        <li><a href="https://trabalhenosistema.com.br/" target="_blank">Trabalhe Conosco</a></li>
      </ul>
    </nav>
    <nav>
      <ul class="linkdir">
        <li><a href="https://www.senacrs.com.br/sala-imprensa" target="_blank">Sala de Imprensa</a></li>
        <li><a href="https://senacrs.com.br/hotsite/pdf/codigo-etica-senacrs-OFICIAL.pdf" target="_blank">Código de
            Ética</a></li>
        <li><a href="https://senacrs.com.br/hotsite/canal-denuncia/canal_denuncia.php" target="_blank">Denúncia</a>
        </li>
      </ul>
    </nav>
    <nav>
    </nav>
    <ul class="footer-menu">
        <li><a href="#inicio">Início</a></li>
        <li><a href="#agendamento">Agendamento</a></li>
        <li><a href="#professores">Professores</a></li>
        <li><a href="#espaco">Espaço</a></li>
    </ul>
    </nav>
  </div><!-- Fim da div footer-links -->
  <nav id="divfooter">
    <a href="https://www.facebook.com/" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="https://x.com/" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
    <a href="https://www.instagram.com/" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
    <a href="https://www.linkedin.com" class="social-icon linkedin"><i class="fab fa-linkedin-in"></i></a>
    <a href="https://www.youtube.com/" class="social-icon youtube"><i class="fab fa-youtube"></i></a>
  </nav><!-- Fim da div divfooter -->
  <div id="divfim">
    <p>&copy; 2024 Senac Boxe. Todos os direitos reservados.</p>
  </div><!-- Fim da div divfim -->
</footer>
</body>

</html>