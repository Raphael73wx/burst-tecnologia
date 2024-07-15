<?php
include('./adm/conexao-pdo.php');
include('./adm/verificar-autenticidade.php');
$pk_usuario = $_SESSION["pk_usuario"];
$pk_produto = trim($_GET["pk_produto"]);
$sql = "
    SELECT nome,foto
    from usuario
    where pk_usuario =:pk_usuario
";
$stmt = $coon->prepare($sql);
$stmt->bindParam(':pk_usuario', $pk_usuario);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $dado = $stmt->fetch(PDO::FETCH_OBJ);
    $nomeu = $dado->nome;
    $foto = $dado->foto;
}
$sql = "
select nome_do_produto,foto_1
from produto
where pk_produto =:pk_produto
";
$stmt = $coon->prepare($sql);
$stmt->bindParam(':pk_produto', $pk_produto);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $dado = $stmt->fetch(PDO::FETCH_OBJ);
    $nome = $dado->nome_do_produto;
    $foto_1 = $dado->foto_1;
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
    <title>avaliações</title>
</head>

<body>
    <?php include("nav.php"); ?>
    <div class="container-fluid">
        <div class="row" style="justify-content: center;">
            <div class="col-2  my-4">
                <div class="card">
                <div class="card-header text-center">
                    <H4>Avaliações</H4>
                    <p><?php  echo " $nome "; ?> </p>
                </div>
                <div class="card-body flex" style="justify-content: center;">
                    <?php echo ' <img src="assets/imagens/' . $foto_1. '" class=" img-fluid" style="max-width: 100px; max-height: 100px;" alt=""> '; ?>
                </div>
                </div>
            </div>
        </div>
        <?php
        $sql = '
        select avaliacoes,comentarios,data
        from avaliacoes
        where fk_produto = :fk_produto
        ORDER BY pk_avaliacoes
        ';
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':fk_produto', $pk_produto);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($stmt->rowCount() > 0) {
            echo '
            <div class="row">';
            foreach ($dados as $key => $row) {
                echo '
                <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        ' . $nomeu . '
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="assets/imagens/usuarios/' . $foto . '" class="circular img-fluid" style="max-width: 100px; max-height: 100px;" alt="">
                            </div>
                            <div class="col-md-8">
                            <p>';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $row->avaliacoes) {
                        echo ' <i class="estrela-preenchidas fa-solid fa-star"></i>';
                    } else {
                        echo ' <i class="estrela-vazia fa-solid fa-star"></i>';
                    }
                }
                echo '
                </p>
                <p>'.$row->comentarios.'</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                ';
            }
            echo '</div>';
        }
        ?>

    </div>
    <?php include("footer.php"); ?>
</body>

</html>