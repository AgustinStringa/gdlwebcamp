<section class="contenedor seccion">
    <h2 class="h2_separador">Invitados</h2>

    <!---Inicio consulta para invitados--->
    <?php

    try {
        require_once('include/funciones/bd-connection.php');
        $sql = " SELECT * FROM `invitados` ";
        // echo " $sql <hr>";

        $resultado = $conn->query($sql);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    ?>
    <!---Fin consulta invitados--->

    <ul class="lista_invitados clearfix ">
        <?php while ($invitados = $resultado->fetch_assoc()) {  ?>
            <?php
            // echo '<pre>';
            // echo var_dump($invitados);
            // echo '</pre>';
            ?>
            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
                        <img src="img/invitados/<?php echo $invitados['url_imagen'] ?> " alt="imagen invitado ">
                        <p><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?></p>
                    </a>
                </div>
            </li>

            <!--CREANDO DIV PARA MOSTRAR DESCRIPCION CON COLORBOX--->
            <div style="display:none;">
                <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
                    <h2 class="h2_separador"><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></h2>
                    <img src="img/invitados/<?php echo $invitados['url_imagen'] ?> " alt="imagen invitado ">
                    <p><?php echo $invitados['descripcion_invitado']; ?></p>
                </div>
            </div>

        <?php } ?>
        <!--cierre while lista invitados-->

    </ul>
    <!--ul lista invitados-->


    <!---VAR DUMP REFERENCIA--->
    <!-- <div class="paraImprimir">
        <pre>
            <?php //var_dump($resultado->fetch_assoc());
            ?>
        </pre>
    </div> -->
    <!---VAR DUMP REFERENCIA--->

</section>

<?php //include_once "include/templates/footer.php"; 
?>