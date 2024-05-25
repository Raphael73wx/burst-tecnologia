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
    <title>conta</title>
</head>

<body>
    <div class="container-fluid ">
        <div class="topo" id="#topo">
            <div class="mae">
                <a href="index.html"><img src="assets/imagens/Group 3.png" alt="logo"></a>
                <div class="mae2">
                    <ul>
                        <li><a href="busca.php"><i class="bi bi-search"></i></a></li>
                        <li><a href="carrinho.php"><i class="bi bi-cart3"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-md container-centro ">
            <div class="row justify-content-start">
                <div class="col-4"><img src="https://placehold.co/200x200" alt="" class="circular img-fluid"></div>
                <div class="col-8 name">
                    <h4><?php echo $_SESSION["nome_completo"] ?></h4>
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="bi bi-tools"></i>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="">
                                <i class="bi bi-pencil"></i>Editar
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="bi bi-trash"></i>Remover
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>Meu PC</h4>
                </div>
                <div class="col">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="card">
                                <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>recomendações</h4>
                    </div>
                    <div class="col">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="card">
                                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <?php 
               include('footer.php;')
               ?>

            </div>
        </div>
















        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
        <script src="assets/main.js"></script>
</body>

</html>

<!-- <div class="login conta">

  <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="foto" class="form-label">Foto</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="foto" id="foto">
                                                            <label class="custom-file-label" for="customFile">Selecionar foto</label>
                                                        </div>
                                                    </div>
                                                </div>
    <div class="row1">
        <div class="col-4"><i class="bi bi2 bi-person"></i></div>
        <div class="col-8"><span>nome de usuario</span></div>
    </div>
    <div class="row2">
        <div class="r1"><span>meu pc</span></div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>

        </div>
       <div class="row2">
        <div class="r1"><span>minhas compras</span></div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>
            <div class="item">
                <div class="card">
                    <a href="produtos.html"><img src="https://placehold.co/100x100" alt="Avatar" style="width:100%"></a>
                </div>
            </div>

        </div>
    </section></div>
    </div>
    <div class="row3">
        <div></div>
    </div>
</div> -->