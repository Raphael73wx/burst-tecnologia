<?php
session_start();

if (empty($_COOKIE["email"]) || empty($_COOKIE["senha"])) {
    $checked = "";
    $email = "";
    $senha = "";
} else {
    $checked = "checked";
    $email = $_COOKIE["email"];
    $senha = $_COOKIE["senha"];
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
    <title>login</title>
</head>

<body>
    <div class="row log">
        <div class="col-4 c1">
            <a href="index.php"><img class="img-fluid" src="assets/imagens/assetsall/logof.png" alt="."></a>
        </div>
        <div class="col-6">
            <form action="validar-login.php" method="post" class="login">
                <i class="bi bi2 bi-person"></i>
                <div class="row">
                    <div class="col">
                        <label for="email" class="form-label">email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="senha" class="form-label">senha</label>
                        <input type="password" id="senha" name="senha" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            entrar
                        </button>
                    </div>
                    <div class="col">
                        <a href="cadastro.php" class="btn btn-primary">cadastrar</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <a href="recuperar-senha.php" class="btn btn-primary">esqueceu a senha</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>
    <?php
    include("adm/sweet-alert-2.php");
    ?>
</body>

</html>