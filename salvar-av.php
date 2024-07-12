<?php
include("./adm/verificar-autenticidade.php");
include("./adm/conexao-pdo.php");
if (!empty($_POST['estrela'])) {
    $estrela = trim($_POST["estrela"]);
    $nome = trim($_POST["nome"]);
    $comentario = trim($_POST["comentario"]);
    $sql ='
    select pk_produto
    from produto 
    where nome_do_produto =:nome
    ';
    $stmt = $coon->prepare($sql);
    $stmt->bindParam(':nome',$nome);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $dado = $stmt->fetch(PDO::FETCH_OBJ);
        $pk_produto = $dado->pk_produto;
    }
    $sql = '
    insert into avaliacoes (avaliacoes,comentarios,data,fk_produto)
    values(:estrela,:comentario,NOW(),:fk_produto)    
    ';
    $stmt = $coon->prepare($sql);
    $stmt->bindParam(':estrela', $estrela);
    $stmt->bindParam(':comentario', $comentario);
    $stmt->bindParam(':fk_produto', $pk_produto);
    $stmt->execute();
    $_SESSION["tipo"] = 'success';
    $_SESSION["title"] = 'Oba!';
    $_SESSION["msg"] = 'Avaliacao salva com sucesso!';
    header("location: avaliacoes.php?pk_produto=$pk_produto");
    exit;
} else {
    $_SESSION["tipo"] = 'error';
    $_SESSION["title"] = 'Ops!';
    $_SESSION["msg"] =  '$ex->getMessage()';
    header("location: ./");
    exit;
}
