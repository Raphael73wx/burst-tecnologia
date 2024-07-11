<?php
include('./adm/conexao-pdo.php');
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
        <div class="row">
            <h4 class="text-center">avaliações</h4>
        </div>
        <div class="row">
            <div class="col"><img src="assets/imagens/usuarios/$foto" class="circular img-fluid" alt=""></div>
            <div class="col">raphael</div>
        </div>
        <div class="row text-center">
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
        <div class="row text-center" style="justify-content: center;">
            <label for="produto" class="form-label">comentario</label>
            <input type="text" class="form-control" id="comentario" name="comentario" value="" style="max-width: 70vw;">
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

            foreach ($dados as $key => $row) {
            }
            for($i = 1; $i<= 5; $i++){
                if($i <= $row->avaliacoes){
                    echo '<i class="estrela-preencida fa-solid fa-star"></i>';
                }else{
                    echo '<i class="estrela-vazia fa-solid fa-star"></i>';
                }
            }
        }
        ?>
    </div>
    <!-- $dado = $stmt->fetch(PDO::FETCH_OBJ);
    $avaliacoes = $dado->avaliacoes;
    $comentarios = $dado->comentarios;
    $data = $dado->data; -->
</body>

</html>