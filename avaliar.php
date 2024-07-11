<?php
include('./adm/verificar-autenticidade.php');
include("./adm/conexao-pdo.php");


$sql = "
select nome_do_produto, preco, foto_1, 
    (select data_ini 
    from pedido 
    where 
    ),
    (select data_fim 
    from pedido 
    where 
    ),
from  produto p     
join usuario u on u.nome = u.nome
where pk_produto = :pk_produto
";


$stmt = $coon->prepare($sql);
$stmt->bindParam(":pk_produto", $pk_produto);

$stmt->execute();
if ($stmt->rowCount() > 0) {
    $dado = $stmt->fetch(PDO::FETCH_OBJ);
    $nome_do_produto = $dado->nome_do_produto;
    $nome = $dado->nome;
    $foto_1 = $dado->foto_1;
    $cpf = $dado->cpf;
    $email = $dado->email;
    $preco = $dado->preco;
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <title>Avaliar compra </title>
</head>

<body>
    <div class="container-fluid" style="padding: 0;">
        <?php include('nav.php') ?>
        <div class="container-md ">
            <div class="row mt-3">
                <div class="col">
                    <form action="salvar.php" method="post" enctype="multipart/form-data">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Avaliar</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="produto" class="form-label"><img class="cimg" src="assets/imagens/<?php echo $foto_1 ?>" alt="" id="foto_1" name="foto_1"></label>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="produto" class="form-label">Pedido</label>
                                        <input type="text" required class="form-control" id="pedido" name="pedido" value="<?php echo $pedido; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="produto" class="form-label">numero do pedido</label>
                                        <input readonly type="text" class="form-control" id="numero_p" name="numero_p" value="<?php echo $preco; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="produto" class="form-label">data de inicio</label>
                                        <input type="date" class="form-control" id="data_ini" name="data_ini" value="<?php echo $data_ini; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="produto" class="form-label">data fim</label>
                                        <input type="date" class="form-control" id="data_fim" name="data_fim" value="<?php echo $data_fim; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <a href="./" class="btn btn-outline-danger rounded-circle">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                                <button type="submit" class="btn btn-primary rounded-circle">
                                    <i class="bi bi-floppy"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/main.js"></script>
</body>

</html>