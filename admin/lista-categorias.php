<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funcionesAdmin.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>
<?php include_once 'templates/aside-admin.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Categorias</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Maneja las Categorias de los eventos desde esta seccion</h2>
                            <br />
                            <strong>Es importante que sepas que no podrás eliminar una categoría si está asociada a un evento. <br /> Deberás eliminar o editar el evento primero</strong>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="registros" class="table table-bordered table-striped" style="margin-top: 2rem!important;">

                                <thead>
                                    <tr>

                                        <th>Nombre de categoria</th>
                                        <th>Icono</th>
                                        <?php if ($_SESSION["nivel"] == 1) { ?>
                                            <th>Acciones</th>
                                        <?php }; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    try {
                                        $sql = 'SELECT * FROM categoria_evento';
                                        $resultado = $conn->query($sql);
                                    } catch (Exception $e) {
                                        $error = $e->getMessage();
                                        echo $error;
                                    }
                                    ?>

                                    <?php
                                    while ($categoria = $resultado->fetch_assoc()) { ?>

                                        <tr>
                                            <td><?php echo  $categoria['cat_evento']; ?></td>
                                            <td><i class="fa <?php echo  $categoria['icono']; ?>"></i></td>

                                            <?php if ($_SESSION["nivel"] == 1) { ?>
                                                <td>
                                                    <a class="btn btn-info editar_registro_categoria" id-cat="<?php echo $categoria['id_categoria']; ?>" href="editar-categoria.php?id-editable=<?php echo $categoria['id_categoria']; ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger borrar_registro" href="#" data-tipo="categorias" data_id="<?php echo $categoria['id_categoria']; ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            <?php }; ?>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre de categoria</th>
                                        <th>Icono</th>
                                        <?php if ($_SESSION["nivel"] == 1) { ?>
                                            <th>Acciones</th>
                                        <?php }; ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-12 px-3 mb-3">
                    <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2" target="_blank">Explora los iconos aquí</a>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->



<?php include_once 'templates/footer-admin.php'; ?>