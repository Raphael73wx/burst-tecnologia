<?php
include('../verificar-autenticidade.php');
include('../conexao-pdo.php');
$pagina_ativa = "recomendacoes";

$pk_produto = base64_decode(trim($_GET["ref"]));
$sql = "
    SELECT *
    FROM produto
    WHERE pk_produto =:pk_produto
    ";
//prepara a sintaxe
$stmt = $coon->prepare($sql);
//substitui a string :pk+servico pela váriavel $pk_servico
$stmt->bindParam(':pk_produto', $pk_produto);
//executa a sintaxe final do MYSQL
$stmt->execute();
//verifica se encontrou algum registro no banco de dados
if ($stmt->rowCount() > 0) {
    $dado = $stmt->fetch(PDO::FETCH_OBJ);
    $nome = $dado->nome_do_produto;
    $preco = $dado->preco;
    $foto_1 = $dado->foto_1;
} else {
    $_SESSION["tipo"] = 'error';
    $_SESSION["title"] = 'Ops!';
    $_SESSION["msg"] = 'Registro não encotrado.';
    header("location: ./");
    exit;
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../dashboard/dist/plugins/fontawesome-free/css/all.min.css">
    <!-- bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../dashboard/dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../dashboard/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dashboard/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../dashboard/dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
        <!-- Main Sidebar Container -->

        <!-- Navbar -->
        <?php
        include('../nav.php');
        ?>
        <!-- /.navbar -->
        <?php
        include('../aside.php');
        ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <form action="salvar-av.php" method="post" enctype="multipart/form-data">
                                <div class="card card-danger card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">produto 1</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label for="foto_1" class="form-label"><img class="cimg" src="../../assets/imagens/<?php echo $foto_1 ?>" alt="" id="foto_1" name="foto_1"></label>
                                            </div>
                                            <div class="col-md-7 ml-2">
                                                <label for="nome" class="form-label">Produto</label>
                                                <input readonly type="text" required class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="preco" class="form-label">preco</label>
                                                <input readonly type="text" class="form-control" id="preco" name="preco" value="<?php echo $preco; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h5>Produto relacionado</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="produto" class="form-label">buscar produto</label>
                                                <div class="input-group">
                                                    <input type="tex" class="form-control mh" id="nome" name="nome" placeholder="nome do produto" required>
                                                    <span class="input-group-text mh">
                                                        <button type="button" class="btn btn-default btn-sm" id="buscar_produto">
                                                            <i class="bi bi-search ft"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label for="foto_1" class="form-label"><img class="cimg" src="../../assets/imagens/<?php echo $foto_1 ?>" alt="" id="foto_1" name="foto_1"></label>
                                            </div>
                                            <div class="col-md-7 ml-2">
                                                <label for="nome" class="form-label">Produto</label>
                                                <input readonly type="text" required class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="preco" class="form-label">preco</label>
                                                <input readonly type="text" class="form-control" id="preco" name="preco" value="<?php echo $preco; ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-end">
                                        <a href="./" class="btn btn-outline-danger rounded-circle">
                                            <i class="bi bi-arrow-left"></i>
                                        </a>
                                        <button type="submit" class="btn btn-primary rounded-circle">
                                            <i class="bi bi-floppy"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php
    include('../footer.php');
    ?>
    <!-- footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../dashboard/dist/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../dashboard/dist/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../dashboard/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../dashboard/dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../dashboard/dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../../dashboard/dist/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dashboard/dist/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>