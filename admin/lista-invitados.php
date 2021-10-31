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
                    <h1>Lista de Invitados</h1>

                    <?php echo '<pre>';
                    var_dump($_SESSION);
                    echo '</pre>'; ?>
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
                            <h3 class="card-title">Maneja los invitados desde esta seccion</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="registros" class="table table-bordered table-striped" style="margin-top: 2rem!important;">

                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <?php if ($_SESSION["nivel"] == 1) { ?>
                                            <th>Acciones</th>
                                        <?php }; ?>
                                    </tr>
                                </thead>
                                <tbody id="lista-admins">
                                    <?php

                                    try {
                                        $sql = 'SELECT id_admin, usuario, nombre FROM admins';
                                        $resultado = $conn->query($sql);
                                    } catch (Exception $e) {
                                        $error = $e->getMessage();
                                        echo $error;
                                    }
                                    ?>

                                    <?php
                                    while ($admin = $resultado->fetch_assoc()) { ?>

                                        <tr>
                                            <td><?php echo $admin['usuario']; ?></td>
                                            <td><?php echo  $admin['nombre']; ?></td>

                                            <?php if ($_SESSION["nivel"] == 1) { ?>
                                                <td>
                                                    <a class="btn btn-info editar_registro" href="editar-admin.php?id_admin=<?php echo $admin['id_admin'] ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger borrar_registro" href="#" data-tipo="admin" data_id="<?php echo $admin['id_admin']; ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            <?php }; ?>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th>Nombre</th>
                                        <th>Descripcion</th>

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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include_once 'templates/footer-admin.php'; ?>