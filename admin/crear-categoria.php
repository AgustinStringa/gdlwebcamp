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
                    <!-- <h1>Crear Categoria</h1> -->
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
                        <h3 class="card-title">Crear Categoría</h3>
                    </div>
                    <div class="card-body">
                        <p>Crear una categoría para tus eventos desde aquí</p>
                        <form method="post" action="modelo-categorias.php" name="crear-categoria" id="crear-categoria">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Icono:</label>

                                    <div class="input-group">

                                        <input required data-placement="bottomRight" class="form-control icp icp-auto" value="fas fa-archive" type="text" id="icono-categoria" name="icono-categoria" />
                                        <div class="input-group-addon">
                                            <span class="input-group-text" style="height: 100%;">
                                                <i class="fas fa-archive"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nombre-cat">Nombre:</label>
                                    <input required type="text" class="form-control" id="nombre-cat" name="nombre-cat" placeholder="Nombre">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer" style="background-color: unset;">
                                <input type="hidden" name="agregar-categoria" value="1">
                                <button type="submit" class="btn btn-primary">Crear Categotía</button>
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


<?php include_once 'templates/footer-admin.php';
?>