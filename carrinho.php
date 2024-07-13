<?php
include('./adm/verificar-autenticidade.php');
include('./adm/conexao-pdo.php');
?>


<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/OwlCarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/OwlCarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>carrinho</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="container-fluid">
        <?php
        if (count($_SESSION["carrinho"]) > 0) {
            foreach ($_SESSION["carrinho"] as $key => $item) {
                $total_pedido = $total_pedido + ($item["preco"]);
                echo '
                <div class="row">
                        <div class="col-md4">
                            <div class="card">
                             <div class="card-header">
                        nome do produto
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="assets/imagens/ $foto" class="circular img-fluid" style="max-width: 100px; max-height: 100px;" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        preco
                    </div>
                </div>
            </div>
        </div>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">
                            ' . $item["produto"] . '
                            <a class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-decoration-none" href="cart.php?index=' . $key . '">
                                X
                            </a>
                        </h6>
                        <small class="text-body-secondary">Qtde: ' . $item["qtde"] . ' x R$' . number_format($item["preco"], 2, ',', '.') . '</small>
                    </div>
                    <span class="text-body-secondary">
                        R$' . number_format(($item["preco"] * $item["qtde"]), 2, ',', '.') . '
                    </span>
                    
                </li>
                ';
            }
        
        ?>
        
    </div>
    <?php
      $sql="
      select nome_do_produto,preco,foto_1
      "  
    ?>
    <?php include("adm/footer.php"); ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>
</body>

</html>