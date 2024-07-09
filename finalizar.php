<?php
include("./adm/conexao-pdo.php");
include('./adm/validar-login.php');
$fk_usuario = $_SESSION["pk_usuario"];
var_dump($fk_usuario);
exit;
// VERIFICA SE ESTÁ VINDO ALGUM PRODUTO VIA POST
if ($_POST) {

    $pedido = $_POST["pedido"];
    $preco = $_POST["preco"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $forma_p = $_POST["forma_p"];
    $cpf = $_POST["cpf"];
    $logradouro = $_POST["logradouro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $numero = $_POST["numero"];
    $endereco = $logradouro.",".$cidade.",".$estado.",".$numero;
    $numero_p = rand(0,2000000);

    try {
        $sql = "
        INSERT INTO pedidos (data_ini, pedido, forma_de_pagamento, endereco_de_entrega,numero_do_pedido) 
        VALUES(NOW(),:pedido,:forma_p,:endereco,:numero_p)
        ";

        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':pedido',$pedido);
        $stmt->bindParam(':forma_p',$forma_p);
        $stmt->bindParam(':endereco',$endereco);
        $stmt->bindParam(':numero_p',$numero_p);
        $stmt->execute();

        $fk_pedido = $coon->lastInsertId();

        $sql = "
        INSERT INTO rl_pedido_produto (fk_pedidos,fk_produtos,preco) 
        VALUES(:fk_pedidos,:fk_produtos,:preco)
        ";

        // foreach ($_SESSION["carrinho"] as $key => $item) {
        //     $sql.= "($id_pedido, $item[id_produto], $item[id_tamanho], $item[id_cor], $item[qtde], $item[preco]),";
        // }
        $fk_produto = $pk_produto;
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':fk_pedidos',$fk_pedido);
        $stmt->bindParam(':fk_produtos',$fk_produto);
        $stmt->bindParam(':preco',$preco);
        $stmt->execute();
        // $sql = substr($sql,0,-1);
        $fk_usuario = $_SESSION["pk_usuario"];
        $sql = "
        INSERT INTO rl_usuario_pedido (fk_usuario,fk_pedidos) 
        VALUES(:fk_usuario,:fk_pedidos)
        ";
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':fk_pedidos',$fk_pedido);
        $stmt->bindParam(':fk_usuario',$fk_usuario);
        $stmt->execute();

        $_SESSION["carrinho"] = [];
        
        echo '
        <script>
        alert("Pedido finalizado com sucesso!");
        window.location="./";
        </script>
        ';
        exit;


    } catch (PDOException $ex) {
        echo $ex->getMessage();
        exit;
    }
}

header("Location: ./");
exit;