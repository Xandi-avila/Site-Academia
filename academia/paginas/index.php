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
  <meta name="author" content="Mauricio T Welter">
  <title>Senac Boxe</title>
  <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body>

  <!-- cabeçalho -->
  <?php require('header.php'); ?>

 <!-- carousel -->
 <?php require('carousel.php'); ?>
  
 <!-- Seção de Professores -->
  <section id="professores">
    <div class="container">
      <h2 class="tituloP">Nossos Professores</h2>
      <div class="cardsProf">
        <!-- Card 1 -->
        <div class="card">
          <img src="../Imagens/treinador 1.jpg" alt="Foto do Professor João" class="card-img">
          <div class="corpoCard">
            <span class="tituloCard">Professor João Silva</span>
            <p class="textoCard">Com mais de uma década dedicada ao boxe, o Professor João Silva é um mestre em
              treinamento físico e técnico. Sua vasta experiência combina técnicas refinadas com uma abordagem
              motivadora, preparando seus alunos para desafios dentro e fora do ringue.</p>
          </div><!--fim da div corpoCard-->
        </div><!--fim da div card-->

        <!-- Card 2 -->
        <div class="card">
          <img src="../Imagens/treinadora 1.jpg" alt="Foto da Professora Maria" class="card-img">
          <div class="corpoCard">
            <span class="tituloCard">Professora Maria Santos</span>
            <p class="textoCard">Campeã nacional de boxe, a Professora Maria Santos é uma fonte de inspiração para seus
              alunos. Com uma carreira repleta de vitórias, ela compartilha não apenas suas habilidades excepcionais,
              mas também seu espírito de determinação e superação.</p>
          </div><!--fim da div corpoCard-->
        </div><!--fim da div card-->

        <!-- Card 3 -->
        <div class="card">
          <img src="../Imagens/treinador 2.jpg" alt="Foto do Professor Carlos" class="card-img">
          <div class="corpoCard">
            <span class="tituloCard">Professor Carlos Oliveira</span>
            <p class="textoCard">Professor Carlos Oliveira é reconhecido por sua maestria em técnicas de defesa. Seu
              compromisso em formar lutadores completos vai além do treinamento físico, incluindo aspectos mentais e
              estratégicos que são fundamentais para a excelência no combate.</p>
          </div><!--fim da div corpoCard-->
        </div><!--fim da div card-->

        <!-- Card 4 -->
        <div class="card">
          <img src="../Imagens/treinadora 2.jpg" alt="Foto da Professora Alessandra" class="card-img">
          <div class="corpoCard">
            <span class="tituloCard">Professora Marcia Saraiva</span>
            <p class="textoCard">Professora Marcia Saraiva possui vasta experiência em artes marciais,
              especializando-se em técnicas avançadas de defesa pessoal. Com seu método único, ela se dedica a
              transformar cada aluno em um lutador completo.</p>
          </div><!--fim da div corpoCard-->
        </div><!--fim da div card-->
      </div><!--fim da div cardsProf-->
    </div><!--fim da div container-->
  </section>

  <!-- Seção de Modos de Treino -->
  <?php require('modotreinos.php'); ?>

   <!-- Seção do Mapa -->
  <?php require('mapa.php'); ?>

  <div class="footer-linha-container"></div>

  <!-- footer -->
  <?php require('footer.php'); ?>
</body>

</html>