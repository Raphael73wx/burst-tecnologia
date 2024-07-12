<?php
include('./adm/verificar-autenticidade.php');
include('./adm/conexao-pdo.php');
$pk_produto = base64_decode(trim($_GET["ref"]));
// $pk_produto = trim($_POST["pk_produto"]);
$sql = "
select p.pk_produto, p.nome_do_produto, p.preco, p.foto_1, u.nome ,u.cpf ,u.email
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
                <form action="finalizar.php" method="post" enctype="multipart/form-data">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">confirmar dados</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto 1</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="foto_1" id="foto_1" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">Selecionar</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for="produto" class="form-label"><img class="cimg" src="assets/imagens/<?php echo $foto_1 ?>" alt="" id="foto_1" name="foto_1"></label>
                                </div>
                                <div class="col-md-4">
                                    <label for="produto" class="form-label">Produto</label>
                                    <input type="text" required class="form-control" id="pedido" name="pedido" value="<?php echo $nome_do_produto ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="nome" class="form-label">Destinario</label>
                                    <input type="text" required class="form-control" id="nome" name="nome" value="<?php echo $nome ?>" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="preco" class="form-label">Preco</label>
                                    <input type="text" required class="form-control" id="preco" name="preco" value="<?php echo $preco ?>" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="forma_p" class="form-label">Forma de pagamento</label>
                                    <select required class="form-select" aria-label="Disabled select example" name="forma_p">
                                        <option selected value="pix">pix</option>
                                        <option selected value="boleto">boleto</option>
                                        <option selected value="cartao">cartão</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="CPF" class="form-label">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="cep" class="form-label">CEP</label>
                                    <div class="input-group">
                                        <input type="text" maxlength="8" class="form-control mh" id="cep" name="cep" placeholder="CEP" required>
                                        <span class="input-group-text mh">
                                            <button type="button" class="btn btn-default btn-sm" id="buscar_cep">
                                                <i class="bi bi-search ft"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="logradouro" class="form-label">Logradouro</label>
                                    <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="estado" class="form-label">numero de entrega</label>
                                    <input type="text" class="form-control" id="numero" name="numero" placeholder="numero" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <?php echo ' <a href="produtos.php?ref=' . base64_encode($dado->pk_produto) . '" class="btn btn-outline-danger ">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                            ' ?>
                            <button type="submit" class="btn btn-success ">
                                <i class="bi bi-cash"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>