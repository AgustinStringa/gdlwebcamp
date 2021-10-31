<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="admin-area.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php?cerrar_sesion=true">
            <i class="fas fa-door-open"></i>Cerrar Sesión
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="editar-admin.php?id_admin=<?php echo $_SESSION["id"]; ?>">
            <i class="fas fa-cog"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>

      <?php
      // echo '<br>';
      // $asd = $_SERVER['REQUEST_URI'];
      // $asd = substr($asd, 18);
      // echo $asd; 
      ?>
    </nav>
    <!-- /.navbar -->