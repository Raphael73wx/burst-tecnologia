<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/OwlCarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/OwlCarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>

<body>
    <div class="row log">
        <div class="col-6 c1">
            <a href="index.php"><img src="https://placehold.co/400x400" alt="."></a>
        </div>
        <div class="col-6">
            <form method="get" class="login">
                <i class="bi bi2 bi-person"></i>
                <div class="nome">
                    <input type="text" id="nome" placeholder="Nome:"class="form-control" class="form-control">
                </div>
                <div class="cpf">
                    <input type="text" id="cpf" placeholder="cpf:"class="form-control">
                </div>
                <div class="email">
                    <input type="email" name="" id="email" placeholder="email:"class="form-control">
                </div>
                <div class="senha">
                    <input type="password" name="" id="senha" placeholder="senha:"class="form-control">
                </div>
                <div class="cadastrar">
                    <input type="submit" value="cadastrar" id="cadastrar"class="btn btn-primary" >
                </div>
                <div>
                    <div class="btn btn-primary dupla"><a href="index2.php">fazer login</a></div>
                </div>
               
            </form>
        </div>
      
</div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/main.js"></script>
</body>

</html>