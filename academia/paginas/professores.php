<?php
require_once '../banco/conexao.php';


$sql = "SELECT * FROM professores";
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
  <link rel="stylesheet" href="../CSS/professores.css">
  <link rel="stylesheet" href="../CSS/menu.css">
  <meta name="author" content="Mauricio T Welter">
  <title>Senac Boxe</title>
  <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body>

  <!-- cabeçalho -->
  <?php require('header.php'); ?>

  <!-- carousel -->
  <?php require('carousel.php'); ?>

  <!--Seção Professores-->
  <section id="professores">
    <div class="container">
      <h2 class="tituloP">Nossos Professores</h2>

      <?php while ($professor = $result->fetch_assoc()): ?>
        <div class="professor">
          <img src="../Imagens/<?php echo $professor['foto']; ?>" alt="Professor <?php echo $professor['nome']; ?>" class="professor-img">
          <div class="descricao">
            <h3><?php echo $professor['nome']; ?></h3>
            <p><?php echo $professor['descricao']; ?></p>
            <p>
              <a href="https://www.instagram.com/<?php echo $professor['instagram']; ?>" class="social-icon professor-instagram">
                <i class="fab fa-instagram"></i> @<?php echo $professor['instagram']; ?>
              </a>
              </a>
            </p>
          </div>
        </div>
      <?php endwhile; ?>

    </div>
  </section>

  <!-- Seção do Mapa -->
  <?php require('mapa.php'); ?>

  <div class="footer-linha-container"></div>

  <!-- footer -->
  <?php require('footer.php'); ?>

</body>

</html>