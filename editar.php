<?php
include('./adm/verificar-autenticidade.php');
include('./adm/conexao-pdo.php');

$pk_usuario = trim($_GET["pk_usuario"]);

// $pk_produto = trim($_POST["pk_produto"]);
$sql = "
select nome, cpf, email, foto, telefone,senha
from usuario
where pk_usuario =:pk_usuario
";

$stmt = $coon->prepare($sql);
$stmt->bindParam(":pk_usuario", $pk_usuario);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $dado = $stmt->fetch(PDO::FETCH_OBJ);
    $cpf = $dado->cpf;
    $nome = $dado->nome;
    $foto = $dado->foto;
    $email = $dado->email;
    $telefone = $dado->telefone;
    $senha = $dado->senha;
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/style.css">

    <title>Editar Perfil</title>
</head>

<body>
    <?php include('nav.php') ?>
    <div class="container-xxl">
        <div class="row mt-3">
            <div class="col">
                <form action="salvar-pf.php" method="post" enctype="multipart/form-data">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">altere os dados </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="produto" class="form-label "><img class="cimg circular" src="assets/imagens/usuarios/<?php echo $foto ?>" alt="" id="foto" name="foto"></label>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="foto" id="foto" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">Selecionar</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="produto" class="form-label">Nome</label>
                                    <input type="text" required class="form-control" id="nome" name="nome" value="<?php echo $nome ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="preco" class="form-label">email</label>
                                    <input type="text" required class="form-control" id="email" name="email" value="<?php echo $email ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="senha" class="form-label">senha</label>
                                    <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $senha ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="telefone" class="form-label">telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" required class="form-control" id="cpf" name="cpf" value="<?php echo $cpf ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <?php echo ' <a href="perfil.php?ref=' . base64_encode($pk_usuario) . '" class="btn btn-outline-danger ">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                            ' ?>
                            <button type="submit" class="btn btn-success ">
                                salvar
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