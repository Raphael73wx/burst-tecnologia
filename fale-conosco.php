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

<body class="sos">
    <div class="container-fluid ">
        <?php include("nav.php"); ?>
        <div class="container container-centro c-sos">
            <div class="row">
                <h4>Possivel ajuda</h4>
            </div>
            <div class="row st">
                <div class="col-2"><i class="bi bi-bag-x-fill"></i></div>
                <div class="col-10">
                    <a href="">
                        <h5>Cancelar compras</h5>
                    </a>
                </div>
            </div>
            <div class="row st">
                <div class="col-2"><i class="bi bi-cash-coin"></i></div>
                <div class="col-10">
                    <a href="">
                        <h5>pedir reembolso</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <h4>Entre em contanto conosco</h4>
            </div>
            <div class="row r-card">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/imagens/assetsall/logow.avif" class="card-img-top" alt="...">
                        <div class="card-body cd-sos">
                            <h5 class="card-title text-center">Whatsapp</h5>
                            <a href="#" class="btn btn-primary">entrar em contato</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/imagens/assetsall/logoins.webp" class="card-img-top" alt="...">
                        <div class="card-body cd-sos">
                            <h5 class="card-title text-center">Instagram</h5>
                            <a href="#" class="btn btn-primary">entrar em contato</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/imagens/assetsall/logoem.webp" class="card-img-top" alt="...">
                        <div class="card-body cd-sos">
                            <h5 class="card-title text-center">Email</h5>
                            <a href="#" class="btn btn-primary">entrar em contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>
</body>

</html>