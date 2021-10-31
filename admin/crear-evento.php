<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'templates/header-admin.php'; ?>
<?php include_once 'templates/barra-admin.php'; ?>

<?php include_once('funciones/funcionesAdmin.php'); ?>

<?php include_once 'templates/aside-admin.php'; ?>

<!-- 
<link rel="stylesheet" href="css/daterangepicker.css"> -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Evento</h1>


                    <?php
                    try {
                        $sql = "SELECT * FROM invitados";
                        $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                    }

                    try {
                        $sql_cat = "SELECT * FROM categoria_evento";
                        $resultado_cat = $conn->query($sql_cat);
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
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
                        <h3 class="card-title">Crea un evento</h3>
                    </div>
                    <div class="card-body">
                        <p>Introduce los datos del nuevo evento:</p>
                        <form method="POST" action="modelo-evento.php" name="crear-evento" id="crear-evento">
                            <div class="card-body">

                                <!--nombre evento-->
                                <div class="form-group">
                                    <label for="nombre-evento">Nombre del evento:</label>
                                    <input required type="text" class="form-control" id="nombre-evento" name="nombre-evento" placeholder="Nombre del evento">
                                </div>
                                <!--nombre evento-->

                                <!--feha evento-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha-evento">Fecha del evento</label>
                                            <input required type="date" class="form-control" id="fecha-evento" name="fecha-evento" min="" max="">
                                        </div>
                                    </div>
                                </div>
                                <!--fecha evento-->


                                <!--hora evento-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="hora-evento">Hora del evento</label>
                                            <input required type="time" class="form-control" id="hora-evento" name="hora-evento">
                                        </div>
                                    </div>
                                </div>
                                <!--hora evento-->


                                <!-- Date -->
                                <!-- <div class="form-group">
                                    <label>Date:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!--Date que creo no voy a usar-->


                                <!--tipo de evento-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo-evento">Tipo de evento</label>
                                            <select required id="tipo-evento" name="tipo-evento" class="form-control select2bs4" style="width: 100%">
                                                <option value="" selected disabled></option>
                                                <?php while ($cat = $resultado_cat->fetch_assoc()) { ?>
                                                    <option value="<?php echo $cat['id_categoria'] ?>"> <?php echo ($cat['cat_evento'] . " " . $inv['apellido_invitado']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <!--tipo de evento-->


                                <!--invitado de evento-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Invitado del evento</label>
                                            <select required id="invitado-evento" name="invitado-evento" class="form-control select2bs4" style="width: 100%">
                                                <option value="" selected disabled></option>
                                                <?php while ($inv = $resultado->fetch_assoc()) { ?>
                                                    <option value="<?php echo $inv['invitado_id'] ?>"> <?php echo ($inv['nombre_invitado'] . " " . $inv['apellido_invitado']); ?></option>
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
                                <input type="hidden" name="agregar-evento" value="1">
                                <button type="submit" class="btn btn-primary">Crear Evento</button>
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