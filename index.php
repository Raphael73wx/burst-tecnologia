<?php
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
        <?php include("nav.php"); ?>
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
         
        <?php

        try {
            $sql = "
            SELECT p.pk_produto , p.preco , p.nome_do_produto , p.foto_1 ,
            c.categoria
            FROM produto p
            JOIN categoria c ON p.fk_categoria = c.pk_categoria
            ORDER BY c.categoria , p.nome_do_produto
            ";

            $stmt = $coon->prepare($sql);
            $stmt->execute();

            $dados = $stmt->fetchAll(PDO::FETCH_OBJ);

            $nome_categoria = "";

            if ($stmt->rowCount() > 0) {

                foreach ($dados as $key => $row) {
                    
                    if ($nome_categoria != $row->categoria) {
                        if(!empty($nome_categoria)) {
                            echo '
                            </div>
                            </section>
                            ';
                        }
                        echo '
                        
                        <section>
                            <h2 class="h2f">'. $row->categoria .'</h2>
                            <div class="owl-carousel owl-theme owl">
                        ';
                    }
                    echo '
                    <div class="item">
                        <div class="card">
                            <a href="produtos.php?ref='.base64_encode($row->pk_produto).'">
                                <img src="assets/imagens/'.$row->foto_1.'" alt="'.$row->nome_do_produto.'" style="width:100%">
                                <div class="container">
                                    <h5><b>'.$row->nome_do_produto.'</b></h5>
                                    <p>'.$row->preco.'</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    ';

                    $nome_categoria = $row->categoria;
                }

                echo '
                </div>
                </section>
                ';

            }

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        include("footer.php")
        ?>

    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/main.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>

</body>

</html>