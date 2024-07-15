<?php
include('./adm/verificar-autenticidade.php');
include('./adm/conexao-pdo.php');
$total_pedido = 0;
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
    <div class="row" >
            <div class="col m-4 text-center">
               <a href="limpar-car.php"class="btn btn-success" >
                    Limpar carrinho
                </a>
            </div>
        </div>
        <?php
        if (count($_SESSION["carrinho"]) > 0) {
            echo ' <div class="row" style="justify-content: center;">';
            foreach ($_SESSION["carrinho"] as $key => $item) {
                echo '
                <div class="col-md-2 mt-3 m-2">
                <a href="produtos.php?ref=' . base64_encode($item["pk_produto"]) . '" style="text-decoration: none; color: black;">
                        <div class="card">
                             <div class="card-header"  style=" display: flex; justify-content: center;" >
                                 ' . $item["nome_do_produto"] . '
                             </div>
                            <div class="card-body"  style=" display: flex; justify-content: center;" >
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="assets/imagens/' . $item["foto_1"] . '" class=" img-fluid" style="max-width: 100px; max-height: 100px;" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"  style="display: flex; justify-content: center;" >
                                ' . $item["preco"] . '
                            </div>
                        </div>
                        </a>
                </div>
                
                ';
            }
            echo '</div>';
        }

        ?>
     
    </div>
    <?php include("adm/footer.php"); ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>
</body>

</html>