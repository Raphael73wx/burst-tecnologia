<?php
include('./adm/conexao-pdo.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>

<body>
    <div class="row log">
        <div class="col-4 c1">
            <a href="index.php"><img class="img-fluid" src="assets/imagens/assetsall/logof.png" alt="."></a>
        </div>
        <div class="col-6">
            <form action="salvar-lo.php" method="post" class="login">
                <i class="bi bi2 bi-person"></i>
                <div class="row">
                    <div class="col-7">
                        <label for="nome" class="form-label">nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control">
                    </div>
                    <div class="col-5">
                        <label for="cpf" class="form-label">cpf</label>
                        <input type="text" maxlength="14" id="cpf" name="cpf" class="form-control" data-mask="000.000.000-00">
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label for="email" class="form-label">email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="col-5">
                        <label for="telefone" class="form-label">telefone</label>
                        <input type="text" maxlength="14" name="telefone" id="telefone" class="form-control" data-mask="(00)00000-0000">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="senha" class="form-label">senha</label>
                        <input type="password" id="senha" name="senha" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputFile">Foto de perfil</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="foto" accept="image/*">
                                    <label class="custom-file-label" for="exampleInputFile">Selecionar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col"> 
                        <button type="submit" class="btn btn-primary">
                            cadastar
                        </button>
                    </div>
                    <div class="col">
                        <a href="login.php" class="btn btn-primary">login</a>
                    </div>


                </div>
            </form>
        </div>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>