<?php
include('./adm/verificar-autenticidade.php');
include("./adm/conexao-pdo.php");

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
        SELECT pk_produto
        from produto 
        where nome_do_produto = :pedido
        ";
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':pedido',$pedido);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $dado = $stmt->fetch(PDO::FETCH_OBJ);
            $pk_produto = $dado->pk_produto;
        }

        $sql = "
        INSERT INTO rl_pedido_produto (fk_pedidos,fk_produtos,preco) 
        VALUES(:fk_pedidos,:fk_produtos,:preco)
        ";

        // foreach ($_SESSION["carrinho"] as $key => $item) {
        //     $sql.= "($id_pedido, $item[id_produto], $item[id_tamanho], $item[id_cor], $item[qtde], $item[preco]),";
        // }
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':fk_pedidos',$fk_pedido);
        $stmt->bindParam(':fk_produtos',$pk_produto);
        $stmt->bindParam(':preco',$preco);
        $stmt->execute();
        // $sql = substr($sql,0,-1);
        $sql = "
        SELECT pk_usuario
        from usuario 
        where cpf = :cpf 
        ";
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':cpf',$cpf);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $dado = $stmt->fetch(PDO::FETCH_OBJ);
            $fk_usuario = $dado->pk_usuario;
        }
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