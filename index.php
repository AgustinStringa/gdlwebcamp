
<?php include_once "include/templates/header.php"; ?>

<!---se usa la funcion include_once para reutilizar el header y ponerlo en todas las páginas sin la necesidad----->
<!----de copiar el html---->
<!---esta funcion esta disponible para archivos php, no html----->

    <section class="seccion contenedor">
        <h2 class="h2_separador">La mejor conferencia de diseño web en español</h2>
        <p>
        GDLWEBCAMP es tu oportunidad para iniciarte o mejorar tus habilidades dentro del diseño web. Desde diseño gráfico, UI, UX, pasando por todos los lenguajes necesario y las habilidades personales que se necesitan para desempeñarse correctamente en este ambiente, ¡todo esta aquí! No pierdas la oportunidad de reinventar tu futuro    
        </p>
    </section>
    <!--    SECCION DESCRIPCION-->

    <section class="programa ">
        <div class="contenedor_video">
            <video autoplay loop muted poster="img/bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogv"> 
            </video>
        </div>
        <!--contenedor video-->

        <div class="contenido_programa">
            <div class="contenedor">
                <div class="programa_evento">

                    <h2 class="h2_separador">Programa del evento</h2>

                    <?php 
                            try {
                                require_once('include/funciones/bd-connection.php'); 
                                $sql = "SELECT * FROM `categoria_evento` ";
                                // echo " $sql <hr>";
                                
                                $resultado = $conn->query($sql);
                    
                            } catch (\Exception $e) {
                                    echo $e->getMessage();
                            }

                    

                    
                    ;?>

                    <nav class="menu_programa">
                        <?php  while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){?>
                            <?php $categoria = $cat['cat_evento'];?>
                            <a href="#<?php echo strtolower($categoria)?>">
                                <i class="fas <?php echo $cat['icono']?>" aria-hidden="true"></i><?php echo $cat['cat_evento']?>
                            </a>
                        <?php }?>
                        
                    </nav>


                    <?php 
                        //MULTIQUERY PARA DETALLES DE EVENTO EN INDEX:PHP
                        try {
                            require_once('include/funciones/bd-connection.php'); //con este comando se "llama" al archivo que hace la conexion a la db
                            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";//en esta consulta, cat_evento es de la tabla categoria_eventos y nombre_invitado, apellido_invitado es de la tabla invitado
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento "; //nombre de la tabla que se "une" a la de la consulta original
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 1";
                            $sql .= " ORDER BY evento_id LIMIT 2; ";

                            //FIN CONSULTA 1
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";//en esta consulta, cat_evento es de la tabla categoria_eventos y nombre_invitado, apellido_invitado es de la tabla invitado
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento "; //nombre de la tabla que se "une" a la de la consulta original
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 2";
                            $sql .= " ORDER BY evento_id LIMIT 2; ";

                            //FIN CONSULTA 3
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";//en esta consulta, cat_evento es de la tabla categoria_eventos y nombre_invitado, apellido_invitado es de la tabla invitado
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento "; //nombre de la tabla que se "une" a la de la consulta original
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 3";
                            $sql .= " ORDER BY evento_id LIMIT 2; ";


                            //  echo $sql;
                            // echo "<hr>";

                            $conn->multi_query($sql);

                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }

                    ?>

                    <?php 
                        do{
                            $resultado = $conn->store_result();
                            
                            $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
                            

                            <?php $i = 0;?>
                            <?php foreach($row as $evento): ?>
                                <?php if($i % 2 == 0) {?>
                                    <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="informacion_curso ocultar clearfix">
                                <?php } ?>

                            
                                <div class="detalles_evento">
                                    <h3>    <?php echo ($evento['nombre_evento']); ?>  </h3>
                                    <p> <i class="fa fa-clock" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?>    </p>
                                    <p> <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento']; ?>    </p>
                                    <p> <i class="fa fa-user" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?> </p>
                                </div>

                                    <?php if ($i % 2 == 1): ?>
                                            <a href="calendario.php" class="boton float-right">Ver Todas </a>
                                        </div>
                                        <!--#TALLERES-->
                                    <?php endif; ?> 
                                    
                            <?php   $i++;     ?>
                            <?php   endforeach;  ?>
                            <?php $resultado->free(); ?>

                        <?php } while ($conn->more_results() && $conn->next_result()); ?>
                    
                    








                </div>
                <!--Programa evento-->
            </div>
            <!-----contenedor----->
        </div>
        <!--contenido programa-->
    </section>
    <!--Section programa-->

    <?php include_once "include/templates/invitados.php"; ?>
    <!--section invitados-->

    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen_evento clearfix">
                <li>
                    <p class="numero"></p> Invitados
                </li>
                <li>
                    <p class="numero"></p> Talleres
                </li>
                <li>
                    <p class="numero"></p> Días
                </li>
                <li>
                    <p class="numero"></p> Conferencias
                </li>

            </ul>
        </div>

    </div>
    <!--div contador-->

    <section class="precios">
        <h2 class="h2_separador">precios</h2>
        <div class="contenedor">
            <ul class="lista_precios clearfix">
                <li>
                    <div class="tabla_precio">
                        <h3>pase por dia</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="boton hollow">Comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla_precio">
                        <h3>Todos los dias</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="boton ">Comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla_precio">
                        <h3>pase por dos dias</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="boton hollow">Comprar</a>
                    </div>
                </li>

            </ul>
        </div>
    </section>
    <!--section precios-->

    <div class="mapa" id="mapa">

    </div>

    <section>
        <h2 class="h2_separador">Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate asperiores nemo libero dolorum suscipit veritatis, dolorem cum vel, autem rem illum at doloremque. Eaque perferendis numquam, sequi quis praesentium eum.</p>
                    <footer class="info_testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!-- testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate asperiores nemo libero dolorum suscipit veritatis, dolorem cum vel, autem rem illum at doloremque. Eaque perferendis numquam, sequi quis praesentium eum.</p>
                    <footer class="info_testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!-- testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate asperiores nemo libero dolorum suscipit veritatis, dolorem cum vel, autem rem illum at doloremque. Eaque perferendis numquam, sequi quis praesentium eum.</p>
                    <footer class="info_testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!-- testimonial-->
        </div>
        <!-- testimoniales contenedor clearfix-->
    </section>
    <!-- section testimoniales-->

    <div class="newsletter parallax">
        <div class="contenido_newsletter contenedor">
            <p>Registrate al newsletter</p>
            <h3>GDLWebCamp</h3>
            <a href="#" class="boton transparente">Registrate</a>
        </div>
    </div>
    <!-- div newsletter-->

    <section>
        <h2 class="h2_separador">Faltan</h2>
        <div class="cuenta_regresiva contenedor">
            <ul class=" clearfix ">
                <li>
                    <p id="dias" class="numero "></p> días
                </li>
                <li>
                    <p id="horas" class="numero "></p> horas
                </li>
                <li>
                    <p id="minutos" class="numero "></p> minutos
                </li>
                <li>
                    <p id="segundos" class="numero "></p> segundos
                </li>
            </ul>
        </div>
    </section>
    <!-- section cuenta-->

    <?php include_once "include/templates/footer.php"; ?>