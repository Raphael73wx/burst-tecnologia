<?php
include('./adm/verificar-autenticidade.php');
include('./adm/conexao-pdo.php');
unset($_SESSION["carrinho"] );
header("Location: ./");
?>
