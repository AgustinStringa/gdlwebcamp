<?php include_once 'funciones/funcionesAdmin.php' ;?>
<?php include_once 'templates/header-admin.php' ;?>

<?php 

session_start();
$cerrar_sesion = $_GET['cerrar_sesion'];
if($cerrar_sesion){
    session_destroy();
}
?>

<body class="hold-transition sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
  <style>
      html, body, .content-wrapper{
        background-color: #ccc;
      }
  </style>
  <div class="content-wrapper" style="margin-left:0;">


    <!-- Main content -->
    <section class="content pt-5">
        <div class="login-box mb-4 m-auto">
            <div class="login-logo">
                <a href="../index.php"><b>GDL</b>Webcamp</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body ">
                    <p class="login-box-msg">Inicia Sesión</p>


                    <form class="mt-3 mb-4"  method="post" action="modelo-admin.php" name="login-admin-form" id="login-admin">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="row">

                        <div class="col-12">
                            <input type="hidden" name="login-admin" value="1">
                            <button type="submit"  class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                        <!-- /.col -->
                        </div>
                    </form>


                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <style>
      footer{
         display: none;
      }
  </style>
  <?php include_once 'templates/footer-admin.php' ;?>



