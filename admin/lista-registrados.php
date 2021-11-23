<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funcionesAdmin.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>
<?php include_once 'templates/aside-admin.php'; ?>

<!--estilos para tabla con imagenes-->
<style>
    .td-botones {
        justify-content: center;
        display: flex;
        flex-direction: row;
        margin: 0;
    }

    .td-botones a {
        margin: 0 .5rem;
    }

    .table td:not(.td-description) {
        text-align: center;
    }

    .td-description {
        width: 40%;
        text-align: justify;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios registrados</h1>
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
                            <h3 class="card-title">Maneja los usuarios registrados desde esta seccion</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="registros" class="table table-bordered table-striped" style="margin-top: 2rem!important;">

                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Fecha registro</th>
                                        <th>Artículos</th>
                                        <th>Talleres</th>
                                        <th>Regalo</th>
                                        <th>Compra</th>
                                        <?php if ($_SESSION["nivel"] == 1) { ?>
                                            <th>Acciones</th>
                                        <?php }; ?>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    <?php

                                    try {
                                        $sql = 'SELECT * FROM registrados INNER JOIN regalos ON registrados.regalo = id_regalo';
                                        $resultado = $conn->query($sql);
                                        // echo '<pre>';
                                        // var_dump($resultado->fetch_assoc());
                                        // echo '</pre>';
                                    } catch (Exception $e) {
                                        $error = $e->getMessage();
                                        echo $error;
                                    }
                                    ?>

                                    <?php
                                    while ($registrado = $resultado->fetch_assoc()) { ?>

                                        <tr>
                                            <td><?php echo $registrado['nombre_registrado'] . ' ' . $registrado['apellido_registrado']; ?></td>
                                            <td><?php echo $registrado['email_registrado'] ?></td>
                                            <td><?php echo $registrado['fecha_registro'] ?></td>
                                            <td><?php echo $registrado['pases_articulos'] ?></td>
                                            <td><?php echo $registrado['talleres_registrados'] ?></td>
                                            <td><?php echo $registrado['nombre_regalo'] ?></td>
                                            <td><?php echo $registrado['total_pagado'] ?></td>
                                            <?php if ($_SESSION["nivel"] == 1) { ?>
                                                <td class="td-botones">
                                                    <a class="btn btn-info editar_registro" href="editar-registrado.php?id_registrado=<?php echo $registrado['id_registrado'] ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger borrar_registro" href="admin-area.php" data-tipo="registrado" data_id="<?php echo $registrado['id_registrado'] ?>">
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
                                        <th>Email</th>
                                        <th>Fecha registro</th>
                                        <th>Artículos</th>
                                        <th>Talleres</th>
                                        <th>Regalos</th>
                                        <th>Compra</th>
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