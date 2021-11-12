<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funcionesAdmin.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>
<?php include_once 'templates/aside-admin.php'; ?>

<!--estilos para tabla con imagenes-->
<style>
    tr img {
        width: 200px;
    }

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
                    <h1>Lista de Invitados</h1>


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
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <?php if ($_SESSION["nivel"] == 1) { ?>
                                            <th>Acciones</th>
                                        <?php }; ?>
                                    </tr>
                                </thead>
                                <tbody id="lista-admins">
                                    <?php

                                    try {
                                        $sql = 'SELECT * FROM invitados';
                                        $resultado = $conn->query($sql);
                                    } catch (Exception $e) {
                                        $error = $e->getMessage();
                                        echo $error;
                                    }
                                    ?>

                                    <?php
                                    while ($invitado = $resultado->fetch_assoc()) { ?>

                                        <tr>
                                            <td><?php echo $invitado['nombre_invitado'] . ' ' . $invitado['apellido_invitado']; ?></td>
                                            <td class="td-description"><?php echo  $invitado['descripcion_invitado']; ?></td>
                                            <td><img src="../img/invitados/<?php echo $invitado['url_imagen'] ?>" alt="imagen invitado id: <?php echo $invitado['invitado_id'] ?>"></td>
                                            <?php if ($_SESSION["nivel"] == 1) { ?>
                                                <td class="td-botones">
                                                    <a class="btn btn-info editar_registro" href="editar-invitado.php?id_invitado=<?php echo $invitado['invitado_id'] ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger borrar_registro" href="admin-area.php" data-tipo="invitado" data_id="<?php echo $invitado['invitado_id'] ?>">
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
                                        <th>Descripción</th>
                                        <th>Imagen</th>

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