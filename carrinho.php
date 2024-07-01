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
    <div class="container-fluid">
        <?php include("nav.php"); ?>
        <div class="row">
            </section>
            <div class="owl-carousel owl-theme">
                <div class="container">
                    <div class="item">
                        <div class="card">
                            <a href="produtos.php?ref='.base64_encode($row->pk_produto).'">
                                <img src="assets/imagens/usuarios/eu.jpg" alt="'.$row->nome_do_produto.'" style="width:100%">
                                <h5><b>nome do produto</b></h5>
                                <p>preco</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <section>
        </div>
    </div>
    <?php include("adm/footer.php"); ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>
</body>

</html>

<!-- <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Carrinho</span>
                        <span class="badge bg-primary rounded-pill"><?php echo count($_SESSION['carrinho']); ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        if (count($_SESSION["carrinho"]) > 0) {
                            foreach ($_SESSION["carrinho"] as $key => $item) {
                                $total_pedido = $total_pedido + ($item["preco"] * $item["qtde"]);
                                echo '
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

                            echo '
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total</span>
                                    <strong>R$' . number_format($total_pedido, 2, ',', '.') . '</strong>
                                </li>
                            ';
                        } else {
                            echo '
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Carrinho vazio</h6>
                                </div>
                            </li>
                            ';
                        }
                        ?>
                    </ul>
                </div> -->