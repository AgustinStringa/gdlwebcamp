<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funcionesAdmin.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>
<?php include_once 'templates/aside-admin.php'; ?>

<!-- <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="css/responsive.bootstrap4.min.css"> -->

<div class="content-wrapper">

    <?php
    try {
        $sql = 'SELECT evento_id, nombre_evento, fecha_evento, hora_evento, clave, cat_evento, nombre_invitado, apellido_invitado FROM eventos
        INNER JOIN categoria_evento on id_cat_evento = id_categoria
        INNER JOIN invitados on id_inv = invitado_id';
        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }


    ?>

    <section class="content">


        <div class="container-fluid">
            <div class="row">
                <div class="col-12" style="margin-top: 2rem;">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Maneja los eventos desde esta seccion
                            </h3>
                        </div>
                        <div class="card-body" style="padding: 1rem;">
                            <table id="lista-eventos" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id evento</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Categoría</th>
                                        <th>Invitado</th>

                                        <?php if ($_SESSION["nivel"] == 1) { ?>
                                            <th>Acciones</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <!--thead-->

                                <tbody>
                                    <?php while ($evt = $resultado->fetch_assoc()) { ?>

                                        <tr>
                                            <td>
                                                <?php echo $evt["evento_id"];
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $evt["nombre_evento"];
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $evt["fecha_evento"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $evt["hora_evento"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $evt["cat_evento"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $evt["nombre_invitado"] . ' ' . $evt["apellido_invitado"]; ?>
                                            </td>


                                            <?php if ($_SESSION["nivel"] == 1) { ?>
                                                <td>
                                                    <a class="btn btn-info editar_registro" href="editar-evento.php?id-evento=<?php echo $evt['evento_id'] ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger borrar_registro" href="#" data-tipo="evento" data_id="<?php echo $evt['evento_id']; ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <!--tbody-->

                                <tfoot>
                                    <tr>
                                        <th>Id evento</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Categoría</th>
                                        <th>Invitado</th>

                                        <?php if ($_SESSION["nivel"] == 1) { ?>
                                            <th>Acciones</th>
                                        <?php } ?>
                                    </tr>
                                </tfoot>
                                <!--tfoot-->
                            </table>
                            <!--table-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>



<?php include_once 'templates/footer-admin.php'; ?>