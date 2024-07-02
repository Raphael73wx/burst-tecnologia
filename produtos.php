<?php


include('./adm/conexao-pdo.php');

$pk_produto= base64_decode(trim($_GET["ref"]));
// $pk_produto = trim($_POST["pk_produto"]);
                    
$sql ="
select p.nome_do_produto, p.preco, p.foto_1, p.foto_2, p.foto_3, c.categoria
from  produto p     
join categoria c on p.fk_categoria = c.pk_categoria
where pk_produto = :pk_produto
";
             
$stmt = $coon->prepare($sql);
$stmt->bindParam(":pk_produto",$pk_produto);

$stmt->execute();
if ($stmt->rowCount() > 0 ) {
    $dado = $stmt->fetch(PDO::FETCH_OBJ);
    $preco = $dado->preco;
    $nome_do_produto = $dado->nome_do_produto;
    $foto_1 = $dado->foto_1;
    $foto_2 = $dado->foto_2;
    $foto_3 = $dado->foto_3;
    $categoria = $dado->categoria;
}


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
                        <ul class="carousel__slides ">
                            <li class="carousel__slide prob">
                                <figure>
                                    <div>
                                        <img src="assets/imagens/<?php echo $foto_1?>" alt="">
                                    </div>
                                </figure>
                            </li>
                            <li class="carousel__slide prob">
                                <figure>
                                    <div>
                                        <img src="assets/imagens/<?php echo $foto_2?>" alt="">
                                    </div>
                                </figure>
                            </li>
                            <li class="carousel__slide prob">
                                <figure>
                                    <div>
                                        <img src="assets/imagens/<?php echo $foto_3?>" alt="">
                                    </div>
                                </figure>
                            </li>

                        </ul>
                        <ul class="carousel__thumbnails mini">
                            <li>
                                <label for="slide-1"><img src="assets/imagens/<?php echo $foto_1?>" alt=""></label>
                            </li>
                            <li>
                                <label for="slide-2"><img src="assets/imagens/<?php echo $foto_2?>" alt=""></label>
                            </li>
                            <li>
                                <label for="slide-3"><img src="assets/imagens/<?php echo $foto_3?>" alt=""></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 direita">
                    <div class="row">
                        <h4 class="temp2"><?php echo $nome_do_produto?></h4>
                    </div>
                    <div class="linhac"></div>
                    <div class="row l2">
                        <div class="col-6">Categoria: <?php echo $categoria?></div>
                        <div class="col-6 b">Avaliação</div>
                    </div>
                    <div class="linhac"></div>
                    <div class="row">
                        <div class="col-1 bi1"><i class="bi bi-cash"></i></div>
                        <div class="col-11 bi3"><?php echo $preco?></div>
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