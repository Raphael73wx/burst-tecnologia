<?php
include('../verificar-autenticidade.php');
include('../conexao-pdo.php');
$pagina_ativa = "produtos";

if (empty($_GET["ref"])) {
    $pk_produto = "";
    $nome = "";
    $preco = "";
    $foto_1 = "";
    $foto_2 = "";
    $foto_3 = "";
} else {
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
        $foto_1= $dado->foto_1;
        $foto_2 = $dado->foto_2;
        $foto_3 = $dado->foto_3;
    } else {
        $_SESSION["tipo"] = 'error';
        $_SESSION["title"] = 'Ops!';
        $_SESSION["msg"] = 'Registro não encotrado.';
        header("location: ./");
        exit;
    }
};

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
                            <form action="salvar.php" method="post" enctype="multipart/form-data">
                                <div class="card card-danger card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Lista de produtos</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="pk_produto" class="form-label">Cód</label>
                                                <input readonly required type="text" class="form-control" name="pk_produto" id="pk_produto" value="<?php echo $pk_produto; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="produto" class="form-label">Nome</label>
                                                <input type="text" required class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="produto" class="form-label">Preço</label>
                                                <input type="text" required class="form-control" id="preco" name="preco" value="<?php echo $preco; ?>" data-mask="000.000.000-00">
                                            </div>
                                            <div class="col">
                                                        <label for="foto" class="form-label">Foto 1</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="foto_1" id="foto_1">
                                                            <label class="custom-file-label" for="customFile"><?php echo $foto_1?></label>
                                                        </div>
                                                    </div>  
                                        </div>
                                        <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="foto" class="form-label">Foto 2</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="foto_2" id="foto_2">
                                                            <label class="custom-file-label" for="customFile"><?php echo $foto_2?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="foto" class="form-label">Foto 3</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="foto_3" id="foto_3">
                                                            <label class="custom-file-label" for="customFile"><?php echo $foto_3?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-right">
                                        <a href="./" class="btn btn-outline-danger rounded-circle">
                                            <i class="bi bi-arrow-left"></i>
                                        </a>
                                        <button type="submit" class="btn btn-primary rounded-circle">
                                            <i class="bi bi-floppy"></i>
                                        </button>
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
    <!-- AdminLTE App -->
    <script src="../../dashboard/dist/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var options = {
            onKeyPress: function(whatsapp, e, field, options) {
                var masks = ['(00) 0000-000#', '(00) 00000-0000'];
                var mask = (whatsapp.length > 14) ? masks[1] : masks[0];
                $('#whatsapp').mask(mask, options);
            }
        };
        $('#whatsapp').mask('(00) 0000-000#', options);
    </script>


    <script>
        $(function() {

            $("#theme-mode").click(function() {
                //pegar atributo class objeto
                var classMode = $("#theme-mode").attr("class")
                if (classMode == "fas fa-sun") {
                    $("body").removeClass("dark-mode");
                    $("#theme-mode").attr("class", "fas fa-moon");
                    $("#navtopo").attr("class", "main-header navbar navbar-expand navbar-white navbar-light");
                    $("#asideMenu").attr("class", "main-sidebar sidebar-light-primary elevation-4");
                } else {
                    $("body").addClass("dark-mode");
                    $("#theme-mode").attr("class", "fas fa-sun");
                    $("#navtopo").attr("class", "main-header navbar navbar-expand nav-black navbar-dark");
                    $(" ").attr("class", "main-sidebar sidebar-dark-primary elevation-4")
                }
            });

        })
    </script>
</body>

</html>