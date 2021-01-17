
<aside class="main-sidebar sidebar-dark-blue main-sidebar" style="background-color: #0c2b4a !important;">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      
      <span class="brand-text font-weight-light">User name</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mi perfil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('URL');?>user_own" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Información General</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Mi empresa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('URL');?>areaController" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('URL');?>foda_own" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Procesos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('URL');?>matriz_own" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informes</p>
                </a>
              </li>
            </ul>
          </li>
            <a href="<?php echo constant('URL');?>logout/" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cerrar Sesion </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
