<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>

<?php include_once('funciones/funcionesAdmin.php'); ?>

<?php include_once 'templates/aside-admin.php'; ?>

<?php if (isset($_GET['id-editable'])) {
    $id_editable = $_GET['id-editable'];
    $id_editable = filter_var($id_editable, FILTER_VALIDATE_INT);
}; ?>


<style>
    input {
        color: 'blue' !important;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Crear Categoria</h1> -->

                    <?php
                    //realizando consulta para rellenar datos
                    try {
                        $sql_datos = "SELECT * FROM categoria_evento WHERE id_categoria = $id_editable";
                        $result_datos = $conn->query($sql_datos);
                        $datos_evento = $result_datos->fetch_assoc();
                        // echo '<pre>';
                        // var_dump($datos_evento);
                        // echo '</pre>';
                    } catch (Exception $e) {
                        echo 'error' . $e->getMessage();
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
                        <h3 class="card-title">Editar Categoría</h3>
                    </div>
                    <div class="card-body">
                        <p>Edita los datos de una categoría para tus eventos desde aquí</p>
                        <form method="post" action="modelo-categorias.php" name="editar-categoria" id="editar-categoria">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Icono:</label>

                                    <div class="input-group">

                                        <input required data-placement="bottomRight" class="form-control icp icp-auto" value="<?php echo $datos_evento['icono']; ?>" type="text" id="icono-categoria" name="icono-categoria" />
                                        <div class="input-group-addon">
                                            <span class="input-group-text" style="height: 100%;">
                                                <i class="<?php echo $datos_evento['icono']; ?>
                                                <?php if (
                                                    $datos_evento['icono'] == 'fa-university' || $datos_evento['icono'] == 'fa-comment'
                                                    || $datos_evento['icono'] == 'fa-code'
                                                ) {
                                                    echo "fas";
                                                } ?>
                                                "></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="nombre-cat">Nombre:</label>
                                    <input required type="text" class="form-control" id="nombre-cat" name="nombre-cat" placeholder="Nombre" value="<?php echo $datos_evento['cat_evento']; ?>">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer" style="background-color: unset;">
                                <input type="hidden" name="editar-categoria" value="1">
                                <input type="hidden" name='id-editable' value="<?php echo $id_editable; ?>">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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