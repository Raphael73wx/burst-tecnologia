<?php
include('../verificar-autenticidade.php');
include('../conexao-pdo.php');
$pagina_ativa = "recomendacoes";
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
  <!-- sweet Alert 2  -->
  <link rel="stylesheet" href="../../dashboard/dist/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
    <?php
    include('../nav.php');
    ?>
    <!-- Main Sidebar Container -->
    <?php
    include('../aside.php');
    ?>

    <!-- Navbar -->
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col">
              <div class="card card-danger card-outline">
                <div class="card-header">
                  <h3 class="card-title">Lista de Produtos</h3>
                  </a>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <td>Categoria</td>
                        <td>Nome </td>
                        <td>Preco</td>
                        <td>categoria</td>
                        <td>cor</td>
                        <td>foto 1</td>
                        <td>foto 2 </td>
                        <td>foto 3 </td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "
                     SELECT *
                     FROM produto
                     ORDER BY pk_produto
                      ";
                      //prepara a sintaxe na conexão
                      $stmt = $coon->prepare($sql);
                      //executa o comando MYSQL
                      $stmt->execute();
                      //recebe as informações vindas do MYSQL
                      $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
                      //laço de repetição para printar informações


                      foreach ($dados as $row) {
                        if ($row->fk_categoria == 1) {
                          $categoria = "periferico";
                        }elseif($row->fk_categoria == 2) {
                          $categoria = "software";
                        }else{
                          $categoria = "hardware";
                        }
                        echo '
                      <tr>
                      <td>' . $row->pk_produto . '</td>
                      <td>' . $row->nome_do_produto . '</td>
                      <td>' . $row->preco . '</td>
                      <td>' . $categoria. '</td>
                      <td>' . $row->cor. '</td>
                      <td><img src="../../assets/imagens/' . $row->foto_1 . '" style="width:80px;height=80px;"></td>
                      <td><img src="../../assets/imagens/' . $row->foto_2 . '" style="width:80px;height=80px;"></td>
                      <td><img src="../../assets/imagens/' . $row->foto_3 . '" style="width:80px;height=80px;"></td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-default dropdown-toggle dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="bi bi-tools"></i>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="form.php?ref=' . base64_encode($row->pk_produto) . '">
                              <i class="bi bi-diagram-3"></i> ligar
                            </a>
                          </div>
                        </div>
                      </td>
                      
                      </tr>
                      ';
                      }

                      ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
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
  <!-- SweetAlert2-->
  <script src="../../dashboard/dist/plugins/sweetalert2/sweetalert2.min.js"></script>

  <?php
  include("../sweet-alert-2.php");
  ?>



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