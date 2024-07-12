<?php

include("../verificar-autenticidade.php");
include("../conexao-pdo.php");

// function reArrayFiles(&$file_post) {

//     $file_ary = array();
//     $file_count = count($file_post['name']);
//     $file_keys = array_keys($file_post);

//     for ($i=0; $i<$file_count; $i++) {
//         foreach ($file_keys as $key) {
//             $file_ary[$i][$key] = $file_post[$key][$i];
//         }
//     }

//     return $file_ary;
// }

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
        $categoria = trim($_POST["categoria"]);
        $cor = trim($_POST["cor"]);
        $foto_1 = $_FILES["foto_1"];
        $foto_2 = $_FILES["foto_2"];
        $foto_3 = $_FILES["foto_3"];

        try {
            if ($foto_1["error"] != 4) {
                $ext_permitidos = array(
                    "bmp",
                    "jpg",
                    "jpeg",
                    "png",
                    "jfif",
                    "tiff",
                    "webp"
                );
                $extensao = pathinfo($foto_1["name"], PATHINFO_EXTENSION);
                if (in_array($extensao, $ext_permitidos)) {
                    $novo_nome_1 = hash("sha256", uniqid() . rand() . $foto_1["tmp_name"]) . "." . $extensao;
                    // var_dump($foto_1);exit;      
                    move_uploaded_file($foto_1["tmp_name"], "../../assets/imagens/$novo_nome_1");
                    $update_foto_1 = "foto_1 = '$novo_nome_1'";
                } else {
                    $_SESSION["tipo"] = "error";
                    $_SESSION["title"] = "Ops!";
                    $_SESSION["msg"] = "Arquivo de imagem NÃO permitido.";
                    header("location: ./");
                    exit;
                }
            } else {
                $update_foto_1 = "foto_1=foto_1";
            }
            if ($foto_2["error"] != 4) {
                $ext_permitidos = array(
                    "bmp",
                    "jpg",
                    "jpeg",
                    "png",
                    "jfif",
                    "tiff",
                    "webp"
                );
                $extensao = pathinfo($foto_2["name"], PATHINFO_EXTENSION);
                if (in_array($extensao, $ext_permitidos)) {
                    $novo_nome_2 = hash("sha256", uniqid() . rand() . $foto_2["tmp_name"]) . "." . $extensao;
                    move_uploaded_file($foto_2["tmp_name"], "../../assets/imagens/$novo_nome_2");
                    $update_foto_2 = "foto_2 = '$novo_nome_2'";
                } else {
                    $_SESSION["tipo"] = "error";
                    $_SESSION["title"] = "Ops!";
                    $_SESSION["msg"] = "Arquivo de imagem NÃO permitido.";
                    header("location: ./");
                    exit;
                }
            } else {
                $update_foto_2 = "foto_2=foto_2";
            }
            if ($foto_3["error"] != 4) {
                $ext_permitidos = array(
                    "bmp",
                    "jpg",
                    "jpeg",
                    "png",
                    "jfif",
                    "tiff",
                    "webp"
                );
                $extensao = pathinfo($foto_3["name"], PATHINFO_EXTENSION);
                if (in_array($extensao, $ext_permitidos)) {
                    $novo_nome_3 = hash("sha256", uniqid() . rand() . $foto_3["tmp_name"]) . "." . $extensao;
                    move_uploaded_file($foto_3["tmp_name"], "../../assets/imagens/$novo_nome_3");
                    $update_foto_3 = "foto_3 = '$novo_nome_3'";
                } else {
                    $_SESSION["tipo"] = "error";
                    $_SESSION["title"] = "Ops!";
                    $_SESSION["msg"] = "Arquivo de imagem NÃO permitido.";
                    header("location: ./");
                    exit;
                }
            } else {
                $update_foto_3 = "foto_3=foto_3";
            }


            if (empty($pk_produto)) {
                $sql = "
             INSERT INTO produto (nome_do_produto,preco,fk_categoria,foto_1,foto_2,foto_3,cor)
             VALUES(:nome,:preco,:fk_categoria,:foto_1,:foto_2,:foto_3,:cor)
             ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':fk_categoria', $categoria);
                $stmt->bindParam(':cor', $cor);
                $stmt->bindParam(':foto_1', $novo_nome_1);
                $stmt->bindParam(':foto_2', $novo_nome_2);
                $stmt->bindParam(':foto_3', $novo_nome_3);
            } else {
                $sql = "
                UPDATE produto SET nome_do_produto =:nome, preco =:preco, fk_categoria =:fk_categoria, cor=:cor, $update_foto_1, $update_foto_2,$update_foto_3
                WHERE pk_produto = :pk_produto
                ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':fk_categoria', $categoria);
                $stmt->bindParam(':cor', $cor);
                $stmt->bindParam(':pk_produto', $pk_produto);
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
            $_SESSION["msg"] =  $ex->getMessage();
            header("location: ./");
            exit;
        }
    }
}
