<?php include_once 'funciones/sesiones.php'; ?>

<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>

<?php include_once('funciones/funcionesAdmin.php'); ?>
<?php include_once 'templates/aside-admin.php'; ?>

<?php
$id_evento = $_GET['id-evento'];

if (filter_var($id_evento, FILTER_VALIDATE_INT)) {
    $id_evento = filter_var($id_evento, FILTER_VALIDATE_INT);
} else {
    $id_evento = "ERROR";
}



//consulta datos actuales del evento
try {
    $sql = "SELECT * FROM eventos WHERE evento_id = $id_evento";
    $actual_evt = $conn->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
    echo 'mostrame el ERRORRR';
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
                    <h1>Editar Evento</h1>
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
                        <p>Actualiza los datos del evento</p>
                        <?php $actual_evt = $actual_evt->fetch_assoc();

                        ?>
                        <form method="POST" action="modelo-evento.php" name="editar-evento" id="editar-evento">
                            <div class="card-body">
                                <!--nombre evento-->
                                <div class="form-group">
                                    <label for="nombre-evento">Nombre del evento:</label>
                                    <input required type="text" class="form-control" id="nombre-evento" name="nombre-evento" value="<?php echo $actual_evt["nombre_evento"]; ?>">
                                </div>
                                <!--nombre evento-->

                                <!--feha evento-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha-evento">Fecha del evento</label>
                                            <input required type="date" class="form-control" id="fecha-evento" name="fecha-evento" min="" max="" value="<?php echo $actual_evt["fecha_evento"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--fecha evento-->


                                <!--hora evento-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="hora-evento">Hora del evento</label>
                                            <input required type="time" class="form-control" id="hora-evento" name="hora-evento" value="<?php echo $actual_evt["hora_evento"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--hora evento-->

                                <?php
                                //rellenando select categorias
                                try {
                                    $sql = "SELECT * FROM categoria_evento";
                                    $cat_evt = $conn->query($sql);
                                } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                ?>

                                <!--tipo de evento-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo-evento">Tipo de evento</label>
                                            <select required id="tipo-evento" name="tipo-evento" class="form-control select2bs4" style="width: 100%">
                                                <option value="" selected disabled></option>
                                                <?php while ($evt = $cat_evt->fetch_assoc()) { ?>
                                                    <option <?php if ($evt['id_categoria'] == $actual_evt['id_cat_evento']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?php echo $evt['id_categoria'] ?>"><?php echo $evt['cat_evento'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <!--tipo de evento-->

                                <?php
                                //rellenando select invitados
                                try {
                                    $sql = "SELECT * FROM invitados";
                                    $invitados = $conn->query($sql);
                                } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                ?>
                                <!--invitado de evento-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Invitado del evento</label>
                                            <select required id="invitado-evento" name="invitado-evento" class="form-control select2bs4" style="width: 100%">
                                                <option value="" selected disabled></option>
                                                <?php while ($invitado = $invitados->fetch_assoc()) { ?>
                                                    <option <?php if ($invitado['invitado_id'] == $actual_evt['id_inv']) {
                                                                echo 'selected';
                                                            } ?> value="<?php echo $invitado['invitado_id'] ?>"><?php echo $invitado['nombre_invitado'] . ' ' . $invitado['apellido_invitado']; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <!--invitado de evento-->

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer" style="background-color: unset;">
                                <input type="hidden" name="evento-id" value="<?php echo $actual_evt['evento_id']; ?>">
                                <input type="hidden" name="editar-evento" value="1">
                                <button type="submit" class="btn btn-primary">Actualizar Evento</button>
                            </div>
                        </form>
                        <!--form-->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include_once 'templates/footer-admin.php'; ?>