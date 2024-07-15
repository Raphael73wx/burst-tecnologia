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
                    <a href="logout.php" class="btn btn-default " type="button" data-toggle="dropdown">
                        <i class="bi bi-box-arrow-right icones"></i>
                    </a>
                </div>
            </div>
            <div class="row ll1">
                <div>
                    <h4>Minhas compras</h4>
                </div>
                <div class="col">
                    <div class="owl-carousel owl-theme tt">
                        <?php
                        $sql = '
                        select pedido 
                        from pedidos
                        where fk_usuario =:pk_usuario
                        ';
                        $stmt = $coon->prepare($sql);
                        $stmt->bindParam(":pk_usuario", $pk_usuario);
                        $stmt->execute();
                        $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
                        if ($stmt->rowCount() > 0) {
                            foreach ($dados as $key => $row) {
                                $sql = "
                                select foto_1,pk_produto
                                from produto
                                where nome_do_produto =:nome
                                ";
                                $stmt = $coon->prepare($sql);
                                $stmt->bindParam(":nome", $row->pedido);
                                $stmt->execute();
                                $dado = $stmt->fetchAll(PDO::FETCH_OBJ);
                                foreach ($dado as $key => $row2) {
                                    $pk_pro = $row2->pk_produto;
                                    echo ' 
                                    <div class="item">
                                        <div class="card">
                                            <a href="produtos.php?ref=' . base64_encode($row2->pk_produto) . '"><img src="assets/imagens/' . $row2->foto_1 . '" alt="" style="width:100%"></a>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row ll1">
                <div class="col">
                    <h4>Recomendações</h4>
                </div>
                <div class="col">
                    <div class="owl-carousel owl-theme tt">
                        <?php
                        $sql = '
                        select fk_produto
                        from rl_produto_recomendacao
                        where fk_recomendacao =:pk_produto
                        ';
                        $stmt = $coon->prepare($sql);
                        $stmt->bindParam(":pk_produto", $pk_pro);
                        $stmt->execute();
                        $info = $stmt->fetchAll(PDO::FETCH_OBJ);
                        if ($stmt->rowCount() > 0) {
                            foreach ($info as $key => $row3) {
                                $sql = "
                                select foto_1,pk_produto
                                from produto
                                where pk_produto =:pk_produto
                                ";
                                $stmt = $coon->prepare($sql);
                                $stmt->bindParam(":pk_produto", $row3->fk_produto);
                                $stmt->execute();
                                $info2 = $stmt->fetchAll(PDO::FETCH_OBJ);
                                foreach ($info2 as $key => $row4) {
                                    echo ' 
                                    <div class="item">
                                        <div class="card">
                                            <a href="produtos.php?ref=' . base64_encode($row4->pk_produto)  . '"><img src="assets/imagens/' . $row4->foto_1 . '" alt="" style="width:100%"></a>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                        ?>
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