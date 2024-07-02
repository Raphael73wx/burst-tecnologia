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
        <div class="col-6 c1 ">
            <a href="index.php"><img class="img-fluid" src="assets/imagens/assetsall/logof.png" alt="."></a>
        </div>
        <div class="col-6">
        <form method="post" action="validar-login.php"  class="login">
            <div class="bi-persond"><i class="bi bi2 bi-person"></i></div>
            <div class="email">
                <label for="email" class="email"></label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $email; ?>" >
            </div>
            <div class="senha" style="margin: 0;">
                <label for="senha"></label>
                <input type="password" name="senha" id="senha" placeholder="senha" class="form-control" value="<?php echo $senha; ?>">
            </div>
            <div class="entrar">
                <div><input type="submit" value="entrar" id="entrar" class="btn btn-primary"></div>
                <div class="btn btn-primary dupla" style="margin: 0;"
                ><a href="recuperar-senha.php">mudar senha</a></div>
                <div class="btn btn-primary dupla"><a href="cadastro.php">fazer cadastro</a></div>
            </div>
        </form>
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