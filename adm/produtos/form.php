<?php
include('../verificar-autenticidade.php');
include('../conexao-pdo.php');
$pagina_ativa = "produtos";


if (empty($_GET["ref"])) {
    $pk_produto = "";
    $nome = "";
    $categoria = "";
    $cor = "";
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
        $cor = $dado->cor;
        $categoria = $dado->fk_categoria;
        $foto_1 = $dado->foto_1;
        $foto_2 = $dado->foto_2;
        $foto_3 = $dado->foto_3;
    } 
}


// INICIA CONSTRUÇÃO DO SELECT DOS SERVIÇOS
$sql = "
SELECT pk_produto, CONCAT(nome_do_produto, ' - ', cor) nome_do_produto
FROM produto
ORDER BY nome_do_produto
";

try {
    $stmt = $coon->prepare($sql);
    $stmt->execute();

    $dados = $stmt->fetchAll(PDO::FETCH_OBJ);

    $options = '<option value="">--Selecione--</option>';

    foreach ($dados as $key => $row) {
        $options .= '<option value="' . $row->pk_produto . '">' . $row->nome_do_produto . '</option>';
    }
} catch (Exception $ex) {
    $_SESSION["tipo"] = "error";
    $_SESSION["title"] = "Ops!";
    $_SESSION["msg"] = $ex->getMessage();

    header("Location: ./");
    exit;
}



// if (empty($_GET["ref"])) {
//     $pk_ordem_servico = "";
//     $nome = "";
//     $cpf = "";
//     $data_ordem_servico = "";
//     $data_inicio = "";
//     $data_fim = "";
// } else {
//     $pk_ordem_servico = base64_decode(trim($_GET["ref"]));
//     $sql = "
//     SELECT pk_ordem_servico,
//     data_ordem_servico,
//     data_inicio,
//     data_fim,
//     nome,cpf
//     FROM ordens_servicos
//     JOIN clientes on pk_cliente = fk_cliente
//     WHERE pk_ordem_servico =:pk_ordem_servico
//     ";
//     //prepara a sintaxe
//     $stmt = $coon->prepare($sql);
//     //substitui a string :pk+servico pela váriavel $pk_servico
//     $stmt->bindParam(':pk_ordem_servico', $pk_ordem_servico);
//     //executa a sintaxe final do MYSQL
//     $stmt->execute();
//     //verifica se encontrou algum registro no banco de dados
//     if ($stmt->rowCount() > 0) {
//         $dado = $stmt->fetch(PDO::FETCH_OBJ);
//         $data_ordem_servico = $dado->data_ordem_servico;
//         $cpf = $dado->cpf;
//         $nome = $dado->nome;
//         $data_fim = $dado->data_fim;
//         $data_inicio = $dado->data_inicio;
//     } else {
//         $_SESSION["tipo"] = 'error';
//         $_SESSION["title"] = 'Ops!';
//         $_SESSION["msg"] = 'Registro não encotrado.';
//         header("location: ./");
//         exit;
//     }
// };
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
                                                <input type="text" required class="form-control" id="preco" name="preco" value="<?php echo $preco; ?>" data-mask="R$000.00">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="produto" class="form-label">Cor</label>
                                                <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $cor; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="produto" class="form-label">categoria</label>
                                                <tr>
                                                    <td>
                                                        <select required class="form-select" aria-label="Disabled select example" name="categoria">
                                                            <option selected value="1">periferico</option>
                                                            <option selected value="2">software</option>
                                                            <option selected value="3">hardware</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Foto 1</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="foto_1" id="foto_1" accept="image/*">
                                                            <label class="custom-file-label" for="exampleInputFile">Selecionar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Foto 2</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="foto_2" id="foto_2" accept="image/*">
                                                            <label class="custom-file-label" for="exampleInputFile">Selecionar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Foto 3</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="foto_3" id="foto_3" accept="image/*">
                                                            <label class="custom-file-label" for="exampleInputFile">Selecionar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="card card-warning card-outline">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Lista de Serviços</h3>
                                                        <button type="button" class="btn btn-sm btn-primary float-right rounded-circle" id="btn-add">
                                                            <i class="bi bi-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table" id="tabela_produtos">
                                                            <thead>
                                                                <tr>
                                                                    <th>produto</th>
                                                                    <th>opcoes</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (empty($pk_produto)) {
                                                                    echo '
                                                                <tr>
                                                                    <td>
                                                                        <select class="form-select" name="fk_servico[]">
                                                                        ' . $options . ';
                                                                        </select>
                                                                    </td>
                                                                    <td> </td>
                                                                </tr>
                                                                ';
                                                                } else {
                                                                    $sql = "
                                                                SELECT pk_produto, CONCAT(nome_do_produto, ' - ', cor) nome_do_produto 
                                                                FROM produto
                                                                WHERE pk_produto = :pk_produto
                                                                ";
                                                                    try {
                                                                        $stmt = $coon->prepare($sql);
                                                                        $stmt->bindParam(':pk_produto', $pk_produto);
                                                                        $stmt->execute();

                                                                        $dados =  $stmt->fetchAll(PDO::FETCH_OBJ);

                                                                        foreach ($dados as $key => $row) {
                                                                            echo '
                                                                        <tr>
                                                                            <td>
                                                                                <select class="form-select" name="fk_produto[]">
                                                                                   <option selected value="' . $row->pk_produto . '">' . $row->nome_do_produto . '</option>
                                                                                   ' . $options . ';
                                                                                </select>
                                                                            </td>
                                                                            <td> </td>
                                                                        </tr>';
                                                                        }
                                                                    } catch (PDOException $ex) {
                                                                        $_SESSIOn["tipo"] = " error";
                                                                        $_SESSIOn["title"] = "Ops!";
                                                                        $_SESSIOn["tipo"] = $ex->getMessage();
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
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
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
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
    <script>
          $("#btn-add").click(function() {
            var newRow = $("<tr>");
            var cols = "<td>";
            cols += '<select class="form-select" name="fk_produto[]">';
            cols += '<?php echo $options; ?>';
            cols += '</select>';
            cols += '<td>';
            cols += '<button class="btn btn-danger btn-sm" onclick="RemoveRow(this)" type="button"><i class="fas fa-trash"></i></button>';
            cols += '</td>';
            newRow.append(cols);
            $("#tabela_produtos").append(newRow);
        });
        RemoveRow = function(item) {
            var tr = $(item).closest('tr');
            tr.fadeOut(250, function() {
                tr.remove();
            });
            return false;
        }
    </script>
</body>

</html>