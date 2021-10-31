<?php include_once "include/templates/header.php"; ?>


<section class="contenedor seccion">
    <h2 class="h2_separador">Invitados</h2>

    <!---Inicio consulta para invitados--->
    <?php 
    
        try {
            require_once('include/funciones/bd-connection.php'); 
            $sql = " SELECT invitado_id, nombre_invitado, apellido_invitado, descripcion_invitado, url_imagen FROM invitados ";
            echo " $sql <hr>";
            
            $resultado = $conn->query($sql);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    ?>
    <!---Fin consulta invitados--->


    <?php 
        $listaInvitados = array();
        while($invitados = $resultado->fetch_assoc() ){
            // echo '<pre>';
            // echo var_dump($invitados);
            // echo '</pre>';

            $invitado = array(
                'nombre'=> $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado'],
                'descripcion'=> $invitados['descripcion_invitado'],
                'imagen'=> $invitados['url_imagen']
            );
            $listaInvitados[]= $invitado;
        }
    ?>

    <?php foreach($listaInvitados as $invitado){?>

        <div class="wrap-invitado">
        <h3><?php echo $invitado['nombre']; ?></h3>
        <p><?php echo $invitado['descripcion']; ?></p>
        
        <img alt="" src="img/<?php echo$invitado['imagen'];?>" />
        </div>

    <?php } ?>

    <!---VAR DUMP REFERENCIA--->
    <!-- <div class="paraImprimir">
        <pre>
            <?php //var_dump($resultado->fetch_assoc());?>
        </pre>
    </div> -->
    <!---VAR DUMP REFERENCIA--->

    <?php 
    
        /**
         * 
         * esta es la solucion que idee para imprimir los datos de la db a la pagina
         * es efectiva y funciona
         * la solucion propuesta por el instructor reutiliza los estilos del index.php
         * simplificando el camino a maquetar la pagina
         * 
         * 
         * 
         * 
         */
    ?>

</section>

<?php include_once "include/templates/footer.php"; ?>