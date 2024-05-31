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
                <a href="index.php"><img src="assets/imagens/Group 3.png" alt="logo"></a>
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
                <div class="col-5 name">
                    <h4><?php echo $_SESSION["nome_completo"] ?></h4>
                </div>
                <div class="col-3 name">
                    <a href="editar.php" class="btn btn-default " type="button" data-toggle="dropdown">
                        <i class="bi bi-gear-fill icones"></i>
                    </a>
                    <a href="<?php echo caminhoURL2 ?>pedidos.php" class="nav-link flex">
                        <i class="nav-icon bi bi-box-seam text-success  mr-1 icones"></i>
                            <span class="right badge badge-danger">5</span>
                    </a>
                    <a href="adm/logout.php" class="btn btn-default " type="button" data-toggle="dropdown">
                        <i class="bi bi-box-arrow-right icones"></i>
                    </a>
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
                <div class="row pa">
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
            </div>
        </div>
        <?php
        include('adm/footer.php')
        ?>
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