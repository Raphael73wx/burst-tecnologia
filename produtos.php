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
    <link rel="stylesheet" href="assets/style2.css">
    <title>produtos</title>
</head>

<body class="fundo">
    <div class="container-fluid">
        <?php include("nav.php"); ?>
        <div class="container-md x container-centro ">
            <div class="row">
                <div class="col-6">
                    <div class="carousel">
                        <input type="radio" name="slides" checked="checked" id="slide-1">
                        <input type="radio" name="slides" id="slide-2">
                        <input type="radio" name="slides" id="slide-3">
                        <ul class="carousel__slides">
                            <li class="carousel__slide prob">
                                <figure>
                                    <div>
                                        <img src="assets/imagens/1.jpg" alt="">
                                    </div>
                                </figure>
                            </li>
                            <li class="carousel__slide prob">
                                <figure>
                                    <div>
                                        <img src="assets/imagens/2.jpg" alt="">
                                    </div>
                                </figure>
                            </li>
                            <li class="carousel__slide prob">
                                <figure>
                                    <div>
                                        <img src="assets/imagens/3.jpg" alt="">
                                    </div>
                                </figure>
                            </li>

                        </ul>
                        <ul class="carousel__thumbnails">
                            <li>
                                <label for="slide-1"><img src="assets/imagens/1.jpg" alt=""></label>
                            </li>
                            <li>
                                <label for="slide-2"><img src="assets/imagens/2.jpg" alt=""></label>
                            </li>
                            <li>
                                <label for="slide-3"><img src="assets/imagens/3.jpg" alt=""></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 direita">
                    <div class="row">
                        <h4 class="temp2">
                            <!-- <?php echo $nome ?> -->
                            MONITOR GAMER PICHAU ATHEN V3, 24 POL
                        </h4>
                    </div>
                    <div class="linhac"></div>
                    <div class="row l2">
                        <div class="col-6">Categoria: software</div>
                        <div class="col-6 b">Avaliação</div>
                    </div>
                    <div class="linhac"></div>
                    <div class="row">
                        <div class="col-1 bi1"><i class="bi bi-cash"></i></div>
                        <div class="col-11 bi3">R$960,99</div>
                    </div>
                    <div class="row">
                        <div class="">
                            <button class="btnc">
                            <i class="bi bi-cart3"></i>
                            <h4>comprar</h4>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>





    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>

</body>

</html>