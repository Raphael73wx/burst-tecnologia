<?php
$sql="
SELECT COUNT(pk_pedidos) tp,
(
  SELECT COUNT(pk_pedidos)
  FROM pedidos
  WHERE data_fim  <> '0000-00-00'
)dt
FROM pedidos
";
try {
  $stmt = $coon->prepare($sql);
  $stmt->execute();

  $dados = $stmt->fetch(PDO::FETCH_OBJ);
  $tp = $dados->tp;
  $dt = $dados->dt;

  if($dados->tp > 0 ){
    $pr = ($dt*100)/$tp;
  }else{
    $pr = 0;
  }

} catch (PDOException $ex) {
  $_SESSION["tipo"] = 'error';
  $_SESSION["title"] = 'Ops!';
  $_SESSION["msg"] = $ex->getMessage(); 
}
?>


<nav id="navtopo" class="main-header navbar navbar-expand navbar-white navbar-light ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo caminhoURL;?>index.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo caminhoURL;?>contato.php" class="nav-link">Contato</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-moon" id="theme-mode"></i>
      </a>
    </li>

    <!-- Navbar Search -->
    <li class="nav-item">
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <!-- Messages Dropdown Menu -->


    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge"><?php echo $tp?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"></span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 
          <span class="float-right text-muted text-sm"></span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 
          <span class="float-right text-muted text-sm"></span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 
          <span class="float-right text-muted text-sm"></span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer"></a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo caminhoURL2;?>logout.php">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>