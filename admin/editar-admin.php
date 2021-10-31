<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>

<?php include_once('funciones/funcionesAdmin.php'); ?>
<?php include_once 'templates/aside-admin.php'; ?>
<?php
$id_pag = $_GET['id_admin'];
$id_pag = filter_var($id_pag, FILTER_VALIDATE_INT);

try {
  $sql = "SELECT id_admin, usuario, nombre, password  FROM admins where id_admin = $id_pag";
  $resultado = $conn->query($sql);
} catch (Exception $e) {
  $error = $e->getMessage();
  echo $error;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Administrador</h1>
          <?php
          $datos = $resultado->fetch_assoc();
          ?>
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
          <div class="card-body">
            <p>Actualiza los datos del administrador</p>
            <form method="post" action="modelo-admin.php" name="actualizar-admin" id="actualizar-admin">


              <style>
                form,
                input[value="<?php echo $datos["usuario"] ?>"],
                input[value="<?php echo $datos["nombre"] ?>"],
                input[value="<?php echo $datos["password"] ?>"] {
                  color: #007bff;
                }

                .grupo-pass {
                  display: flex;
                  flex-direction: row;
                  column-gap: 1rem;
                  align-items: center;
                }
              </style>
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Usuario:</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario" value=<?php echo $datos["usuario"] ?>>
                </div>
                <div class="form-group">
                  <label for="nombre">Tu Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" value=<?php echo $datos['nombre'] ?>>
                </div>
                <div class="form-group">
                  <label for="password">Contraseña:</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña sin modificaciones">
                </div>
              </div>
              <!-- /.card-body -->

              <script>
                var texts = document.querySelectorAll('form label');
                for (var i = 0; i < texts.length; i++) {
                  texts[i].style.color = "#333";
                }
              </script>

              <div class="card-footer" style="background-color: unset; text-align: end">
                <input type="hidden" name="editar-admin" value="1">
                <input type="hidden" name="id-editable" value="<?php echo ($datos['id_admin']) ?>">
                <a class="btn btn-danger" href="lista-admin.php">
                  Cancelar
                </a>
                <button type="submit" class="btn btn-primary">Actualizar Admin</button>
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