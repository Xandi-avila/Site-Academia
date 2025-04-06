<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../CSS/Style.css">
  <link rel="stylesheet" href="../CSS/menu.css">
  <meta name="author" content="Mauricio T Welter">
  <title>Senac Boxe</title>
  <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body>

  <script src="../script/Script.js"></script>

  <!-- cabeçalho -->
  <?php require('header.php'); ?>

  <!-- carousel -->
  <?php require('carousel.php'); ?>


  <!--Seção De Compras-->
  <section class="container mt-5">
    <h2 class="text-center text-danger mb-4">Compre Aqui Seu Equipamento</h2>
    <div class="row">
      <?php
      // Conexão com o banco de dados
      require_once('../banco/conexao.php');

      // Busca os produtos da tabela 'produtos'
      $sql = "SELECT * FROM produtos";
      $result = $conn->query($sql);

      // Verifica se há produtos na tabela e exibe-os
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()):
      ?>
          <div class="col-md-4">
            <div class="card mb-4">
              <!-- Exibe a imagem do produto -->
              <img src="<?php echo $row['imagem']; ?>" height="300px" alt="<?php echo $row['nome']; ?>" class="card-img-top">
              <div class="card-body">
                <!-- Exibe o nome e a descrição do produto -->
                <h3 class="card-title"><?php echo $row['nome']; ?></h3>
                <p class="card-text"><?php echo $row['descricao']; ?></p>
                <!-- Exibe o preço formatado -->
                <h4 class="card-text text-danger">R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></h4>
                <!-- Botão para adicionar ao carrinho -->
                <button class="btn btn-danger btn-block" onclick="addToCart('<?php echo $row['nome']; ?>')">Adicionar ao Carrinho</button>
              </div>
            </div>
          </div>
      <?php
        endwhile;
      } else {
        echo "<p>Nenhum produto encontrado.</p>";
      }
      ?>
    </div>

    <div class="container mt-5">
      <h2 class="text-center text-danger">Carrinho de Compras</h2>
      <ul id="cart" class="list-group"></ul>
      <div class="text-center mt-3">
        <h4>Total: <span id="total" class="text-danger">R$ 0,00</span></h4>
        <button class="btn btn-danger mt-3 mx-2" onclick="checkout()">Finalizar Compra</button>
        <button class="btn btn-secondary mt-3 mx-2" onclick="clearCart()">Limpar Carrinho</button>
      </div>
    </div>
  </section>

  <!--Espaço entre Grafico e Mapa-->
  <div class="mt-3"></div>

  <div class="footer-linha-container"></div>

  <!-- footer -->
  <?php require('footer.php'); ?>
  
</body>

</html>
