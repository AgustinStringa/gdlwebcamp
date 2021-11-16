<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>

<?php include_once('funciones/funcionesAdmin.php'); ?>

<?php include_once 'templates/aside-admin.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Invitado</h1>
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
                        <h3 class="card-title">Crear Invitado</h3>
                    </div>
                    <div class="card-body">
                        <p>Completa el formulario para crear un invitado para tus categorias</p>
                        <form method="post" action="modelo-invitado.php" name="crear-invitado" id="guardar-registro-archivo" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre-invitado">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre-invitado" name="nombre-invitado" placeholder="Nombre del invitado">
                                </div>

                                <div class="form-group">
                                    <label for="apellido-invitado">Apellido:</label>
                                    <input type="text" class="form-control" id="apellido-invitado" name="apellido-invitado" placeholder="Apellido del invitado">
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Bio"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="imagen">Imagen:</label>
                                    <br />
                                    <!-- <div class="custom-file">
                                        <input name="imagen" type="file" class="custom-file-input" id="imagen">
                                        <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
                                    </div> -->
                                    <input type="file" name="imagen" id="imagen" accept="image/*">
                                </div>



                                <div class="mt-4">
                                    <input type="hidden" name="agregar-invitado" value="1">
                                    <button type="submit" class="btn btn-primary">Crear Invitado</button>
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