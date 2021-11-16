<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funcionesAdmin.php'; ?>



<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>

<?php include_once 'templates/aside-admin.php'; ?>

<style>
    img {
        max-width: 100%;
        display: block;
        height: 200px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Invitado</h1>
                    <?php //var_dump($_GET);
                    $id_invitado = $_GET['id_invitado'];

                    if (filter_var($id_invitado, FILTER_VALIDATE_INT)) {
                        $id_invitado = filter_var($id_invitado, FILTER_VALIDATE_INT);
                    } else {
                        $id_invitado = "ERROR";
                    }

                    try {

                        $sql = "SELECT * FROM invitados WHERE invitado_id = $id_invitado ";
                        $invitado_actual = $conn->query($sql);
                        $invitado_actual = $invitado_actual->fetch_assoc();
                    } catch (Exception $e) {
                        echo $e . $e->getMessage();
                    }
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
                    <div class="card-header">
                        <h3 class="card-title">Editar Invitado</h3>
                    </div>
                    <div class="card-body">
                        <p>Edita los datos de un invitado creado</p>
                        <form method="post" action="modelo-invitado.php" name="editar-invitado" id="editar-registro-archivo" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre-invitado">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre-invitado" name="nombre-invitado" placeholder="Nombre del invitado" value="<?php echo $invitado_actual['nombre_invitado']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="apellido-invitado">Apellido:</label>
                                    <input type="text" class="form-control" id="apellido-invitado" name="apellido-invitado" placeholder="Apellido del invitado" value="<?php echo $invitado_actual['apellido_invitado']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Bio"><?php echo $invitado_actual['descripcion_invitado']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="imagen">Imagen:</label>
                                    <br />

                                    <input type="file" name="imagen" id="imagen" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label for="">Imagen actual</label>
                                    <img src="../img/invitados/<?php echo $invitado_actual['url_imagen']; ?>" alt="">
                                </div>

                                <div class="mt-4">
                                    <input type="hidden" name="editar-invitado" value="1">
                                    <input type="hidden" name="url-actual" value="<?php echo $invitado_actual['url_imagen']; ?>">

                                    <input type="hidden" name="id-invitado" value="<?php echo $invitado_actual['invitado_id']; ?>">

                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
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