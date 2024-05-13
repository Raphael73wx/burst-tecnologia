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
            <a href="index.php"><img class="img-fluid"src="assets/imagens/logo1.png" alt="."></a>
        </div>
        <div class="col-6">
        <form method="get" class="login">
            <div class="bi-persond"><i class="bi bi2 bi-person"></i></div>
            <div class="email">
                <label for="email" class="email"></label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" >
            </div>
            <div class="senha" style="margin: 0;">
                <label for="senha"></label>
                <input type="password" name="senha" id="senha" placeholder="senha" class="form-control">
            </div>
            <div class="entrar">
                <div><input type="submit" value="entrar" id="entrar" class="btn btn-primary"></div>
                <div class="btn btn-primary dupla" style="margin: 0;"
                ><a href="recuperarsenha.php">mudar senha</a></div>
                <div class="btn btn-primary dupla"><a href="index3.php">fazer cadastro</a></div>
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
<!-- 
// xxxx
// $variaveis = $_GET ;
// // echo $variaveis ['numero1'];
// // verifica o conteudo de um array
// var_dump($variaveis);
// $numero1 = $_POST["numero1"] ?? 0;
// $numero2 = $_POST["numero2"] ?? 0;
// $operador = $_POST["operador"]??"somar";

// if ($operador == "somar"){
//     $resultado = $numero1 + $numero2;
// }
// elseif ($operador == "dividir") {
//     if($numero2 == 0 ){
//         echo"<script>
//         alert('impossivel divisão por zero');
//         exit() ;
//         </script>";
//     } else{
//         $resultado = $numero1 / $numero2;
//     }
// }
// elseif ($operador == "subtrair") {
//     $resultado = $numero1 - $numero2;
// }
// else{
//     $resultado = $numero1 * $numero2;
// } -->
