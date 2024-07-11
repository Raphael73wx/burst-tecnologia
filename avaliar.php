<?php
include('./adm/verificar-autenticidade.php');
include("./adm/conexao-pdo.php");

if ($_GET) {
    $numero_p = trim($_GET["numero_p"]);
    $pk_produto = trim($_GET["pk_produto"]);
    try {
        $sql = "
    select nome_do_produto, preco,cor, foto_1
    from  produto
    where pk_produto = :pk_produto
    ";
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(":pk_produto", $pk_produto);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $dado = $stmt->fetch(PDO::FETCH_OBJ);
            $nome_do_produto = $dado->nome_do_produto;
            $preco = $dado->preco;
            $foto_1 = $dado->foto_1;
            $cor = $dado->cor;
        }
        $sql = '
    select data_ini,data_fim
    from pedidos
    where numero_do_pedido =:numero_p
    ';
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(":numero_p", $numero_p);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $dado = $stmt->fetch(PDO::FETCH_OBJ);
            $data_ini = $dado->data_ini;
            $data_fim = $dado->data_fim;
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        exit;
    }
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Avaliar compra </title>
</head>

<body>
    <div class="container-fluid" style="padding: 0;">
        <?php include('nav.php') ?>
        <div class="container-md ">
            <div class="row mt-3">
                <div class="col">
                    <form action="salvar-av.php" method="post" enctype="multipart/form-data">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Avaliar</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="foto_1" class="form-label"><img class="cimg" src="assets/imagens/<?php echo $foto_1 ?>" alt="" id="foto_1" name="foto_1"></label>
                                    </div>
                                    <div class="col-md-7">
                                        <label for="nome" class="form-label">Pedido</label>
                                        <input type="text" required class="form-control" id="nome" name="nome" value="<?php echo $nome_do_produto; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="preco" class="form-label">preco</label>
                                        <input readonly type="text" class="form-control" id="preco" name="preco" value="<?php echo $preco; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="cor" class="form-label">cor</label>
                                        <input readonly type="text" class="form-control" id="cor" name="cor" value="<?php echo $cor; ?>">
                                    </div>
                                </div>
                                <div class="row " style="justify-content: center;">
                                    <div class="col-md-2">
                                        <label for="numero_P" class="form-label">numero do pedido</label>
                                        <input readonly type="text" class="form-control" id="numero_p" name="numero_p" value="<?php echo $numero_p; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="data_ini" class="form-label">data de compra</label>
                                        <input type="date" class="form-control" id="data_ini" name="data_ini" value="<?php echo $data_ini; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="data_fim" class="form-label">data de entrega</label>
                                        <input type="date" class="form-control" id="data_fim" name="data_fim" value="<?php echo $data_fim; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3" style="justify-content: center;">
                                    <div class="col-md-5 text-center"  >
                                        <label for="">Avaliacao </label>
                                        <div class="estrelas">
                                            <!-- f005 -->
                                            <input type="radio" id="vazio" name="estrela" value="" checked>

                                            <label for="estrela_um"><i class="opcao fa"></i></label>
                                            <input type="radio" id="estrela_um" name="estrela" value="1">

                                            <label for="estrela_dois"><i class="opcao fa"></i></label>
                                            <input type="radio" id="estrela_dois" name="estrela" value="2">

                                            <label for="estrela_tres"><i class="opcao fa"></i></label>
                                            <input type="radio" id="estrela_tres" name="estrela" value="3">

                                            <label for="estrela_quatro"><i class="opcao fa"></i></label>
                                            <input type="radio" id="estrela_quatro" name="estrela" value="4">

                                            <label for="estrela_cinco"><i class="opcao fa"></i></label>
                                            <input type="radio" id="estrela_cinco" name="estrela" value="5">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-8 text-center">
                                    <div class="col-md-12">
                                        <label for="comentario" class="form-label">comentario</label>
                                        <input type="text" class="form-control" id="comentario" name="comentario" value="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-end">
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