<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>

<?php include_once('funciones/funcionesAdmin.php'); ?>

<?php include_once 'templates/aside-admin.php'; ?>

<style>
  .grupo-pass {
    display: flex;
    flex-direction: row;
    column-gap: 1rem;
    align-items: center;
  }

  .mostrar-pass {
    color: #444444;
    font-size: 1.5rem;
    cursor: pointer;
    transition: all .3s ease;
    flex-basis: 7%;
  }

  .mostrar-pass:hover {
    color: gray;
  }

  .alert {
    margin-top: 1rem;
    margin-bottom: 0;
  }

  .alert-success {
    color: #356f54;
    background-color: #d1e7dd;
    border-color: #d0e7dd;
  }

  .alert-danger {
    color: #9a2834;
    background-color: #f8d7da;
    border-color: #f6ccd0;

  }
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear Administrador</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <div class="row mx-3 " style="margin-left:0;">
    <div class="col-md-8 mb-3">


      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Crear Administrador</h3>
          </div>
          <div class="card-body">
            <p>Completa el formulario para crear un administrador</p>
            <form method="post" action="modelo-admin.php" name="crear-admin" id="crear-admin">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Usuario:</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                  <label for="nombre">Tu Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre">

                </div>
                <div class="form-group">
                  <label for="password">Contraseña:</label>
                  <div class="grupo-pass">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    <i class="fas fa-eye mostrar-pass"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label for="repeat-password">Repetir Contraseña:</label>
                  <div class="grupo-pass">
                    <input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="Repite la contraseña">
                    <i class="fas fa-eye mostrar-pass"></i>
                  </div>
                  <div id="resultado-password" class="help-block alert" role="alert"></div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer" style="background-color: unset;">
                <input type="hidden" name="agregar-admin" value="1">
                <button type="submit" class="btn btn-primary">Crear Admin</button>
              </div>
            </form>
            <!--form-->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->

    </div>
    <!--col-md-8-->
  </div>
  <!--row-->
</div>
<!-- /.content-wrapper -->

<?php include_once 'templates/footer-admin.php'; ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->