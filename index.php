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
</head>

<body>
    <div class="container-fluid">
        <div class="topo" id="#topo">
            <div class="mae">
                <a href="<?php echo caminhoURL; ?>index.php"><img class="img-logo" src="/dashboard/dist/img/logo-mini.png" alt="logo"></a>
                <div class="mae2">
                    <ul>
                        <li><a href="<?php echo caminhoURL; ?>index.php"><i class="bi bi-search"></i></a></li>
                        <li><a href="<?php echo caminhoURL; ?>carrinho.php"><i class="bi bi-cart3"></i></a></li>
                        <li><a href="<?php echo caminhoURL; ?>perfil.php"><i class="bi bi2 bi-person"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <div id="carouselExample" class="carousel slide ex ">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://placehold.co/1568x400" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://placehold.co/1568x400" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://placehold.co/1568x400" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="faixa"></div>
        <section>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="faixa"></div>
        <section>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="faixa"></div>
        <section>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <a href="produtos.php"><img src="assets/imagens/teste1.jpg" alt="Avatar" style="width:100%"></a>
                        <div class="container">
                            <a href="produtos.php">
                                <h4><b>nome do produto</b></h4>
                            </a>
                            <a href="produtos.php">
                                <p>R$
                                    3.499
                                    ,
                                    20
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="faixa"></div>
        
    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>

</body>

</html>