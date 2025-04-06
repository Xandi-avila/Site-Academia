<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../CSS/espaco.css">
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

  <section id="sobre" class="about-section">
    <div class="about-container">
      <!-- Div para a imagem -->
      <div class="about-image-container">
        <img src="../Imagens/ringueFoto1.jpg" alt="Foto do espaço da academia">
      </div>

      <!-- Div para o texto -->
      <div class="about-text-container">
        <h2>Conheça o Nosso Espaço</h2>
        <p>Seja bem-vindo à nossa academia de boxe, onde cada treino é uma nova chance de evoluir e se desafiar. Nosso
          espaço foi projetado para oferecer a melhor experiência de treino, com equipamentos de última geração e um
          ambiente acolhedor. Aqui, a sua jornada no boxe começa com o compromisso de superar seus próprios limites.
          Com uma equipe de profissionais qualificados e apaixonados, você encontrará todo o suporte necessário para
          alcançar suas metas, seja para melhorar o condicionamento físico, aprender a arte do boxe ou se preparar para
          competições. Venha fazer parte da nossa história e venha treinar com quem entende de boxe!</p>
      </div>
    </div>
  </section>

  <!-- Seção Sobre a Academia -->
  <section id="sobre" class="training-section">
    <div class="container">
      <h2>Sobre a Academia</h2>
      <p>Aqui, nossa missão vai além de ensinar o boxe: buscamos criar um ambiente que inspire todos a se superarem. Com
        espaços amplos e modernos, nosso objetivo é proporcionar a você não apenas a melhor infraestrutura, mas também
        uma experiência que vai motivá-lo a dar o seu melhor em cada treino.</p>
    </div>
    </div>
  </section>

  <!-- Galeria de Fotos -->
  <section class="section-galery" id="gallery">
    <ul>
      <li>
        <figure><img src="../Imagens/espaco1.jpg" alt="ringue de boxe luta"></figure>
      </li>
      <li>
        <figure><img src="../Imagens/espaco2.jpg" alt="equipamentos academia 1"></figure>
      </li>
      <li>
        <figure><img src="../Imagens/espaco3.jpg" alt="equipamentos academia 2"></figure>
      </li>
      <li>
        <figure><img src="../Imagens/espaco4.jpg" alt="bolas para treino de boxe"></figure>
      </li>
      <li>
        <figure><img src="../Imagens/espaco5.jpg" alt="esteiras para treino"></figure>
      </li>
      <li>
        <figure><img src="../Imagens/espaco6.jpg" alt="acedemia e pesos para treino"></figure>
      </li>
      <li>
        <figure><img src="../Imagens/espaco7.jpg" alt="saccos de areia para treino"></figure>
      </li>
      <li>
        <figure><img src="../Imagens/espaco8.jpg" alt="rigue para treino"></figure>
      </li>
    </ul>
  </section>


  <!-- Galeria Vídeos -->
  <section class="video-section">
    <div class="video-container">
      <!-- Primeiro vídeo -->
      <div class="video">
        <h3>Vídeo Tour</h3>
        <iframe width="800" height="450" src="https://www.youtube.com/embed/7yFBou8xB2Y?si=x8ewmXGyhEHgcL64"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <!-- Segundo vídeo -->
      <div class="video">
        <h3>Dicas para Iniciantes</h3>
        <iframe width="800" height="450" src="https://www.youtube.com/embed/juwKAKA1obI?si=EPz38jD2g1PWSYbO"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </section>

  <!-- Seção do Mapa -->
  <?php require('mapa.php'); ?>


  <div class="footer-linha-container"></div>

  <!-- footer -->
  <?php require('footer.php'); ?>
</body>

</html>