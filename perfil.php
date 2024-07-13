<?php
include('./adm/verificar-autenticidade.php');
include('./adm/conexao-pdo.php');
$foto = $_SESSION["foto_usuario"];
$nome = $_SESSION["nome_completo"];
$pk_usuario = $_SESSION["pk_usuario"];
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

<body class="temp">
    <div class="container-fluid ">
        <div class="barra"><a href="<?php echo caminhoURL ?>"><img src="assets/imagens/assetsall/logonav2.png" alt="" class="p-na"></a></div>
        <div class="container-md container-centro ">
            <div class="row justify-content-start">
                <div class="col-2 p-ma"><img src="<?php echo caminhoURL . 'assets/imagens/usuarios/' . $foto ?>" alt="" class="circular img-fluid"></div>
                <div class="col-7 name">
                    <h4><?php echo $nome  ?></h4>
                </div>
                <div class="col-3 name">
                    <?php echo '<a href="editar.php?pk_usuario=' . $pk_usuario . '" class="btn btn-default " type="button" data-toggle="dropdown">'; ?>
                    <i class="bi bi-gear-fill icones"></i>
                    </a>
                    <a href="<?php echo caminhoURL ?>pedidosc.php" class="nav-link flex p-a">
                        <i class="nav-icon bi bi-box-seam text-success  mr-1 icones"></i>
                        <span class="right badge badge-danger">5</span>
                    </a>
                    <a href="logout.php" class="btn btn-default " type="button" data-toggle="dropdown">
                        <i class="bi bi-box-arrow-right icones"></i>
                    </a>
                </div>
            </div>
            <div class="row ll1">
                <?php
                $sql = '
                select fk_pedidos
                from rl_usuario_pedido
                where fk_usuario =:pk_usuario
                ';
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(":pk_usuario", $pk_usuario);
                $stmt->execute();
                $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
                if ($stmt->rowCount() > 0) {
                    foreach ($dados as $key => $row) {
                        $sql = "
                        select fk_produtos
                        from produtos
                        where fk_pedidos=:pk_pedidos
                        ";
                        $stmt = $coon->prepare($sql);
                        $stmt->bindParam(":pk_pedidos", $row->fk_pedidos[$key]);
                        $stmt->execute();
                    }
                }
                echo '
                div class="col">
                    <h4>Produtos comprados</h4>
                </div>
                <div class="col">
                    <div class="owl-carousel owl-theme tt">
                        <div class="item">
                            <div class="card">
                                <a href="produtos.php?pk_produto=' . $row->fk_pedidos . '"><img src="assets/imagens/' . $row->foto_1 . '" alt="" style="width:100%"></a>
                            </div>
                        </div>
                    </div>
                </div>
        '
                ?>
            </div>
            <div class="row ll1">
                <div class="col">
                    <h4>recomendações</h4>
                </div>
                <div class="col">
                    <div class="owl-carousel owl-theme tt">
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
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>
</body>

</html>