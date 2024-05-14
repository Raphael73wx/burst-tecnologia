<aside id="asideMenu" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo caminhoURL?>adm.php" class="brand-link">
      <img src="dashboard/dist/img/logo-mini.png" alt="Logo" class="brand-image rounded-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo caminhoURL.''. $_SESSION["foto_usuario"];?>" class="img-circle elevation-2" alt="<?php echo $_SESSION["nome_usuario"]?>">
        </div>
        <div class="info">
          <a href="<?php echo caminhoURL;?>perfil-adm.php" class="d-block"><?php echo $_SESSION["nome_usuario"]?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo caminhoURL;?>" class="nav-link <?php echo $pagina_ativa == 'home'? 'active' : ''; ?>">
              <i class="nav-icon bi bi-house"></i>
              <p>
                Pagina inicial
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo caminhoURL?>pedidos-adm.php" class="nav-link <?php echo $pagina_ativa == 'ordens_servicos'? 'active' : ''; ?>">
              <i class="nav-icon bi bi-box-seam text-success  mr-1 "></i>
              <p>
                  Pedidos
                <span class="right badge badge-danger"><?php echo $tp;?></span>
              </p>
            </a>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>