<?php

include("../verificar-autenticidade.php");
include("../conexao-pdo.php");
//verifica se está vindo informações via post
if ($_POST) {
    //verifica campos obrigatórios
    if (empty($_POST["nome"]) || empty($_POST["preco"])) {
        $_SESSION["tipo"] = 'warning';
        $_SESSION["title"] = 'Ops!';
        $_SESSION["msg"] = 'Por favor, preencha os campos obrigatórios.';
        header("location: ./");
        exit;
    } else {
        $pk_produto = trim($_POST["pk_produto"]);
        $nome = trim($_POST["nome"]);
        $preco = trim($_POST["preco"]);
        $fotos = $_FILES["foto"];

        try {

            $novo_nome = array('','','');

            foreach ($fotos as $key => $foto) {
                # code...
                if ($foto["error"] != 4) {
                    $ext_permitidos = array(
                        "bmp",
                        "jpg",
                        "jpeg",
                        "png",
                        "jfif",
                        "tiff"
                    );
                    $extensao = pathinfo($foto["name"], PATHINFO_EXTENSION);
                    if (in_array($extensao, $ext_permitidos)) {
                        $novo_nome[$key] = hash("sha256", uniqid() . rand() . $foto["tmp_name"]) . "." . $extensao;
    
                        move_uploaded_file($foto["tmp_name"], "fotos/$novo_nome[$key]");
                        $update_foto = "foto_$key = '$novo_nome[$key]'";
    
                        $_SESSION["foto_produto"] = $novo_nome[$key];
                    } else {
                        $_SESSION["tipo"] = "error";
                        $_SESSION["title"] = "Ops!";
                        $_SESSION["msg"] = "Arquivo de imagem NÃO permitido.";
                        header("location: ./");
                        exit;
                    }
                } else {
                    $update_foto = "foto_$key=foto_$key";
                }
            }

            if (empty($pk_produto)) {
                $sql = "
             INSERT INTO produto (nome_do_produto,preco,foto_1,foto_2,foto_3)
             VALUES(:nome,:preco,:foto_1,:foto_2,:foto_3)
             ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':foto_1', $novo_nome[0]);
                $stmt->bindParam(':foto_2', $novo_nome[1]);
                $stmt->bindParam(':foto_3', $novo_nome[2]);
            } else {
                $sql = "
                UPDATE produto SET nome_do_produto =:nome, preco =:preco, foto =:foto_1, foto_2 =:foto_2,foto_3 =:foto_3
                WHERE pk_produto = :pk_produto
                ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':foto_1', $novo_nome[0]);
                $stmt->bindParam(':foto_2', $novo_nome[1]);
                $stmt->bindParam(':foto_3', $novo_nome[2]);
            }

            //executa inset ou update acima
            $stmt->execute();
            $_SESSION["tipo"] = 'success';
            $_SESSION["title"] = 'Oba!';
            $_SESSION["msg"] = 'Registro salvo com sucesso!';

            header("location: ./");
            exit;
        } catch (PDOException $ex) {
            $_SESSION["tipo"] = 'error';
            $_SESSION["title"] = 'Ops!';
            $_SESSION["msg"] =  '$ex->getMessage()';
            header("location: ./");
            exit;
        }
    }
}
