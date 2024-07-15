<?php
include('./adm/verificar-autenticidade.php');
include("./adm/conexao-pdo.php");
$pk_usuario = $_SESSION["pk_usuario"];
require('./dashboard/dist/plugins/phpmailer/src/PHPMailer.php');
require('./dashboard/dist/plugins/phpmailer/src/SMTP.php');
require('./dashboard/dist/plugins/phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
    $endereco = $logradouro . "," . $cidade . "," . $estado . "," . $numero;
    $numero_p = rand(0, 2000000);

    try {
        $sql = "
        INSERT INTO pedidos (data_ini, data_fim, fk_usuario, pedido, forma_de_pagamento, endereco_de_entrega, numero_do_pedido) 
        VALUES(NOW(), NOW(), :fk_usuario, :pedido, :forma_p, :endereco, :numero_p)
        ";

        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':pedido', $pedido);
        $stmt->bindParam(':fk_usuario', $pk_usuario);
        $stmt->bindParam(':forma_p', $forma_p);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':numero_p', $numero_p);
        $stmt->execute();
      

        $fk_pedido = $coon->lastInsertId();
        $sql = "
        SELECT pk_produto
        from produto 
        where nome_do_produto = :pedido
        ";
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':pedido', $pedido);
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
        $stmt->bindParam(':fk_pedidos', $fk_pedido);
        $stmt->bindParam(':fk_produtos', $pk_produto);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();
        // $sql = substr($sql,0,-1);
        $sql = "
        SELECT pk_usuario,nome,email
        from usuario 
        where cpf = :cpf 
        ";
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $fk_usuario = $dado->pk_usuario;
            $dado = $stmt->fetch(PDO::FETCH_OBJ);

            //inicio de configuração do servidor email
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host            = "mail.g1a.com.br";
            $mail->Username        = "alunos@g1a.com.br";
            $mail->Password        = "Senac@2024";
            $mail->SMTPSecure      = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth        = true;
            $mail->Port            = 465;

            //REMETENTE
            $mail->setFrom("alunos@g1a.com.br", "Sistema Dashboard - Burst");

            //DESTINATARIO
            $mail->addAddress($email, $dado->nome);
            //DESTINATÁRIO EM CÓPIA
            //$MAIL->addCC("email","nome");
            //DESTINATÁRIO EM CÓPIA OCULTA
            //$email->addBCC("email","nome");
            //ANEXAR ARQUIVO
            //$mail->addAttachement("caminho do arquivo");

            $mail->isHTML(true);
            $mail->Subject      = "Confirmação de pedido";
            $mail->CharSet      = "UTF-8";
            $mail->Body         = "
        <h2>Confirmação  de pedido<h2>
        <p>Você solicitou . $pedido .<p>
        <p> 
            Seu pedido saiu para entrega :<br>
            <strong>URL:</strong> http://localhost/burst/ <br>
            <strong>$endereco:</strong><br>
            <strong>$nome:</strong>
        <p>
            <p>Enviado em " . date("d/m/Y - H:i") . "</p>
                        ";
            $mail->send();

            $_SESSION["tipo"] = "success";
            $_SESSION["title"] = "Oba!";
            $_SESSION["msg"] = "Uma seu pedido foi confirmado .";
            header("Location: avaliar.php?pk_produto=$pk_produto&numero_p=$numero_p");
            exit;
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        exit;
    }
    
    // ?ref=' . base64_encode($dado->pk_produto) . '"
}
