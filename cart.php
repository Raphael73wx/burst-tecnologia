<?php
include('./adm/verificar-autenticidade.php');
include('./adm/conexao-pdo.php');
$pk_produto = base64_decode(trim($_GET["ref"]));
// VERIFICA SE ESTÁ VINDO ALGUM PRODUTO VIA POST
if ($_GET) {
    $sql="
    select nome_do_produto,preco,foto_1,cor
    from produto
    where pk_produto =:pk_produto
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

    $item = array(
        "pk_produto" => $pk_produto,
        "nome_do_produto" => $nome_do_produto,
        "preco" => $preco,
        "foto_1" => $foto_1,
        "cor" => $cor,
    );

    $_SESSION["carrinho"][] = $item;

    echo '
    <script>
    alert("Produto adicionado com sucesso!");
    </script>
    ';
} elseif ($_GET["ref"] == 4) {
   
    $_SESSION["carrinho"] = "";
}

header("Location: ./carrinho.php?ref=$pk_produto");
exit;