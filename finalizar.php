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

// require('dist/plugins/php-mailer/src/PHPMailer.php');
// require('dist/plugins/php-mailer/src/SMTP.php');
// require('dist/plugins/php-mailer/src/Exception.php');


// //BIBLIOTECAS PARA RECUPERAR SENHA
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// if ($_POST) {
//     $email = trim($_POST["email"]);

//     $sql = "
//     SELECT pk_usuario, nome
//     FROM usuarios 
//     WHERE email LIKE :email
//     ";

//     try {
//         $stmt = $coon->prepare($sql);
//         $stmt->bindParam(':email', $email);
//         $stmt->execute();
//         if ($stmt->rowCount() > 0) {
//             $dado = $stmt->fetch(PDO::FETCH_OBJ);

//             //Gerar uma nova senha aleatória
//             $nova_senha = substr(hash('sha256', uniqid()), 6, 6);

//             //inicio de configuração do servidor email
//             $mail = new PHPMailer(true);
//             $mail->isSMTP();
//             $mail->Host            = "mail.g1a.com.br";
//             $mail->Username        = "alunos@g1a.com.br";
//             $mail->Password        = "Senac@2024";
//             $mail->SMTPSecure      = PHPMailer::ENCRYPTION_SMTPS;
//             $mail->SMTPAuth        = true;
//             $mail->Port            = 465;

//             //REMETENTE
//             $mail->setFrom("alunos@g1a.com.br","Sistema Dashboard - OS");

//             //DESTINATARIO
//             $mail->addAddress($email, $dado->nome);
//             //DESTINATÁRIO EM CÓPIA
//             //$MAIL->addCC("email","nome");
//             //DESTINATÁRIO EM CÓPIA OCULTA
//             //$email->addBCC("email","nome");
//             //ANEXAR ARQUIVO
//             //$mail->addAttachement("caminho do arquivo");

//             $mail->isHTML(true);
//             $mail->Subject      ="Recuperação de senha";
//             $mail->CharSet      ="UTF-8";
//             $mail->Body         ="
//             <h2>RECUPERAÇÃO DE SENHA<h2>
//             <p>Você solicitou uma alteração de senha em nosso painel dashboard.<p>
//             <p>
//                 Segue abaixo dados do seu novo acesso:<br>
//                 <strong>URL:</strong> http://localhost/glauco_luiz/dashboard <br>
//                 <strong>E-mail:</strong>$email<br>
//                 <strong>Senha:</strong>$nova_senha
//             <p>
//             <p>Enviado em ".date("d/m/Y - H:i")."</p>
//             ";
//             $mail->send();

//             $sql="
//             UPDATE usuarios SET
//             senha = :senha
//             WHERE pk_usuario = :pk_usuario
//             ";
//             $stmt = $coon->prepare($sql);
//             $stmt->bindParam(':senha',$nova_senha);
//             $stmt->bindParam(':pk_usuario',$dado->pk_usuario);
//             $stmt->execute();

//             $_SESSION["tipo"] = "success";
//             $_SESSION["title"] = "Oba!";
//             $_SESSION["msg"] = "Uma nova senha foi enviada para o seu e-mail.";

//         } else {
//             $_SESSION["tipo"] = "warning";
//             $_SESSION["title"] = "Ops!";
//             $_SESSION["msg"] = "Este e-mail não consta em nossa base de dados.";
//         }
//     } catch (PDOException $e) {
//         $_SESSION["tipo"] = "error";
//         $_SESSION["title"] = "Ops!";
//         $_SESSION["msg"] = $e->getMessage();
//     }
// }
// header("location: ./login.php");