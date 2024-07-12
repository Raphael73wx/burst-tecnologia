<?php
include("./adm/sweet-alert-2.php");
include("./adm/conexao-pdo.php");

if (!empty($_POST['senha'])) {
    $senha = trim($_POST["senha"]);
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $telefone = trim($_POST["telefone"]);
    $cpf = trim($_POST["cpf"]);
    $foto = $_FILES["foto"];
    if ($foto["error"] != 4) {
        $ext_permitidos = array(
            "bmp",
            "jpg",
            "jpeg",
            "png",
            "jfif",
            "tiff",
            "webp"
        );
        $extensao = pathinfo($foto["name"], PATHINFO_EXTENSION);
        if (in_array($extensao, $ext_permitidos)) {
            $novo_nome = hash("sha256", uniqid() . rand() . $foto["tmp_name"]) . "." . $extensao;
            // var_dump($foto_1);exit;      
            move_uploaded_file($foto["tmp_name"], "assets/imagens/usuarios/$novo_nome");
            $update_foto = "foto = '$novo_nome'";
        } else {
            $_SESSION["tipo"] = "error";
            $_SESSION["title"] = "Ops!";
            $_SESSION["msg"] = "Arquivo de imagem NÃO permitido.";
            header("location: ./");
            exit;
        }
        $sql = '
        insert into usuario (nome,CPF,email,senha,telefone,foto)
        values(:nome,:cpf,:email,:senha,:telefone,:foto)
         ';
        $stmt = $coon->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':foto', $novo_nome);
        $stmt->execute();
        
        $_SESSION["tipo"] = 'success';
        $_SESSION["title"] = 'Oba!';
        $_SESSION["msg"] = 'registro salvo com sucesso!';
        header("location: login.php");
        exit;
    }
} else {
    $_SESSION["tipo"] = 'error';
    $_SESSION["title"] = 'Ops!';
    $_SESSION["msg"] =  '$ex->getMessage()';
    header("location: ./");
    exit;
}
