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
    <title>Fale conosco</title>
</head>

<body>
    <div class="container-fluid ">
        <?php include("nav.php");?>
        <div class="container container-centro ">
            <div class="row justify-content-start compras">
                <h4>compras:</h4>
            </div>
            <div class="row">
                <a href="" class="linha">
                    <div class="col-1 st"><i class="bi bi-bag-x-fill"></i></div>
                    <div class="col-10"><h5>Cancelar compras</h5></div>
                    <div class="col-1 so"><i class="bi bi-caret-right-fill"></i></div>
                </a>
            </div>
            <div class="row">
                <a href="" class="linha">
                      <div class="col-1 st"><i class="bi bi-box-seam-fill"></i></div>
                    <div class="col-10"><h5>Devolver compras</h5></div>
                    <div class="col-1 so"><i class="bi bi-caret-right-fill"></i></div>
                </a>
            </div>
            <div class="row">
                <a href="" class="linha">
                <div class="col-1 st"><i class="bi bi-cash-coin"></i></div>
                    <div class="col-10"><h5>Reembolso</h5></div>
                    <div class="col-1 so"><i class="bi bi-caret-right-fill"></i></div>
                </a>
            </div>
            <div class="row compras">
                <div class="row">
                    <h4>Contas:</h4>
                </div>
                <div class="row">
                </div>
                <div class="row">
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