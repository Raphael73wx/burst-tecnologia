<?php
include('./adm/verificar-autenticidade.php');
include('./adm/conexao-pdo.php');
$pk_produto = base64_decode(trim($_GET["ref"]));
// $pk_produto = trim($_POST["pk_produto"]);
$sql = "
select p.nome_do_produto, p.preco, p.foto_1, c.categoria
from  produto p     
join categoria c on p.fk_categoria = c.pk_categoria
where pk_produto = :pk_produto
";

$stmt = $coon->prepare($sql);
$stmt->bindParam(":pk_produto", $pk_produto);

$stmt->execute();
if ($stmt->rowCount() > 0) {
    $dado = $stmt->fetch(PDO::FETCH_OBJ);
    $nome_do_produto = $dado->nome_do_produto;
    $foto_1 = $dado->foto_1;
    $preco = $dado->preco;
    $categoria = $dado->categoria;
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/OwlCarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/OwlCarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/style.css">

    <title>Finalizar compra</title>
</head>

<body>
    <?php include('nav.php') ?>

    <div class="container-xxl">
        <div class="row mt-3">
            <div class="col">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">confirmar dados</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="produto" class="form-label"><img  class="cimg" src="assets/imagens/<?php echo $foto_1?>" alt="" ></label>
                                </div>
                                <div class="col-md-4">
                                <label for="produto" class="form-label">produto</label>
                                    <input type="text" required class="form-control" id="pedido" name="pedido" value="<?php echo $nome_do_produto?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="produto" class="form-label">Forma de pagamento</label>
                                    <input type="text" required class="form-control" id="forma_p" name="forma_p" value="<?php echo $forma_p; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="produto" class="form-label">endereco</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <a href="./" class="btn btn-outline-danger rounded-circle">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                            <button type="submit" class="btn btn-primary rounded-circle">
                                <i class="bi bi-floppy"></i>
                            </button>
                        </div>
                </form>

            </div>
        </div>
    </div>


</body>

</html>