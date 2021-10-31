<?php include_once "include/templates/header.php"; ?>

    <section class="contenedor">
        <h2 class="h2_separador">registro de usuarios</h2>
        <form id="registro" action="validar_registro.php" class="registro" method="post">

            <div id="datos_usuario" class="registro caja clearfix">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" placeholder="Tu nombre" type="text">
                </div>
                <div class="campo">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" name="apellido" placeholder="Tu apellido" type="text">
                </div>
                <div class="campo">
                    <label for="email">Email</label>
                    <input id="email" name="email" placeholder="Tu email" type="email">
                </div>
                <div id="error"></div>
            </div>
            <!--#DATOS USUARIO-->

            <div class="paquetes" id="paquetes">
                <h3>Elige el numero de boletos</h3>

                <ul class="lista_precios clearfix">
                    <li>
                        <div class="tabla_precio">
                            <h3>pase por dia (viernes)</h3>
                            <p class="numero">$30</p>
                            <ul>
                                <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                                <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                                <li><i class="fas fa-check"></i>Todos los Talleres</li>
                            </ul>
                            <div class="orden">
                                <label for="pase_dia">Boletos deseados:</label>
                                <input id="pase_dia" type="number" min="0" name= "boletos[]" size="3" placeholder="0">
                            </div>
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
                            <div class="orden">
                                <label for="pase_completo">Boletos deseados:</label>
                                <input type="number" min="0" id="pase_completo" name= "boletos[]" size="3" placeholder="0">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="tabla_precio">
                            <h3>pase por dos dias (viernes y sábado)</h3>
                            <p class="numero">$45</p>
                            <ul>
                                <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                                <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                                <li><i class="fas fa-check"></i>Todos los Talleres</li>
                            </ul>
                            <div class="orden">
                                <label for="pase_dos_dias">Boletos deseados:</label>
                                <input type="number" min="0" id="pase_dos_dias" name= "boletos[]" size="3" placeholder="0">
                            </div>
                        </div>
                    </li>

                </ul>

            </div>
            <!--#PAQUETES-->

            <div id="eventos" class="eventos clearfix">
                <h3>Elige tus talleres</h3>
                <div class="caja">
                    <div id="viernes" class="contenido-dia clearfix">
                        <h4>Viernes</h4>
                        <div>
                            <p>Talleres:</p>
                            <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time>10:00</time> Responsive Web Design</label>
                            <label><input type="checkbox" name="registro[]" id="taller_02" value="taller_02"><time>12:00</time> Flexbox</label>
                            <label><input type="checkbox" name="registro[]" id="taller_03" value="taller_03"><time>14:00</time> HTML5 y CSS3</label>
                            <label><input type="checkbox" name="registro[]" id="taller_04" value="taller_04"><time>17:00</time> Drupal</label>
                            <label><input type="checkbox" name="registro[]" id="taller_05" value="taller_05"><time>19:00</time> WordPress</label>
                        </div>
                        <div>
                            <p>Conferencias:</p>
                            <label><input type="checkbox" name="registro[]" id="conf_01" value="conf_01"><time>10:00</time> Como ser Freelancer</label>
                            <label><input type="checkbox" name="registro[]" id="conf_02" value="conf_02"><time>17:00</time> Tecnologías del Futuro</label>
                            <label><input type="checkbox" name="registro[]" id="conf_03" value="conf_03"><time>19:00</time> Seguridad en la Web</label>
                        </div>
                        <div>
                            <p>Seminarios:</p>
                            <label><input type="checkbox" name="registro[]" id="sem_01" value="sem_01"><time>10:00</time> Diseño UI y UX para móviles</label>
                        </div>
                    </div>
                    <!--#viernes-->
                    <div id="sabado" class="contenido-dia clearfix">
                        <h4>Sábado</h4>
                        <div>
                            <p>Talleres:</p>
                            <label><input type="checkbox" name="registro[]" id="taller_06" value="taller_06"><time>10:00</time> AngularJS</label>
                            <label><input type="checkbox" name="registro[]" id="taller_07" value="taller_07"><time>12:00</time> PHP y MySQL</label>
                            <label><input type="checkbox" name="registro[]" id="taller_08" value="taller_08"><time>14:00</time> JavaScript Avanzado</label>
                            <label><input type="checkbox" name="registro[]" id="taller_09" value="taller_09"><time>17:00</time> SEO en Google</label>
                            <label><input type="checkbox" name="registro[]" id="taller_10" value="taller_10"><time>19:00</time> De Photoshop a HTML5 y CSS3</label>
                            <label><input type="checkbox" name="registro[]" id="taller_11" value="taller_11"><time>21:00</time> PHP Medio y Avanzado</label>
                        </div>
                        <div>
                            <p>Conferencias:</p>
                            <label><input type="checkbox" name="registro[]" id="conf_04" value="conf_04"><time>10:00</time> Como crear una tienda online que venda millones en pocos días</label>
                            <label><input type="checkbox" name="registro[]" id="conf_05" value="conf_05"><time>17:00</time> Los mejores lugares para encontrar trabajo</label>
                            <label><input type="checkbox" name="registro[]" id="conf_06" value="conf_06"><time>19:00</time> Pasos para crear un negocio rentable</label>
                        </div>
                        <div>
                            <p>Seminarios:</p>
                            <label><input type="checkbox" name="registro[]" id="sem_02" value="sem_02"><time>10:00</time> Aprende a Programar en una mañana</label>
                            <label><input type="checkbox" name="registro[]" id="sem_03" value="sem_03"><time>17:00</time> Diseño UI y UX para móviles</label>
                        </div>
                    </div>
                    <!--#sabado-->
                    <div id="domingo" class="contenido-dia clearfix">
                        <h4>Domingo</h4>
                        <div>
                            <p>Talleres:</p>
                            <label><input type="checkbox" name="registro[]" id="taller_12" value="taller_12"><time>10:00</time> Laravel</label>
                            <label><input type="checkbox" name="registro[]" id="taller_13" value="taller_13"><time>12:00</time> Crea tu propia API</label>
                            <label><input type="checkbox" name="registro[]" id="taller_14" value="taller_14"><time>14:00</time> JavaScript y jQuery</label>
                            <label><input type="checkbox" name="registro[]" id="taller_15" value="taller_15"><time>17:00</time> Creando Plantillas para WordPress</label>
                            <label><input type="checkbox" name="registro[]" id="taller_16" value="taller_16"><time>19:00</time> Tiendas Virtuales en Magento</label>
                        </div>
                        <div>
                            <p>Conferencias:</p>
                            <label><input type="checkbox" name="registro[]" id="conf_07" value="conf_07"><time>10:00</time> Como hacer Marketing en línea</label>
                            <label><input type="checkbox" name="registro[]" id="conf_08" value="conf_08"><time>17:00</time> ¿Con que lenguaje debo empezar?</label>
                            <label><input type="checkbox" name="registro[]" id="conf_09" value="conf_09"><time>19:00</time> Frameworks y librerias Open Source</label>
                        </div>
                        <div>
                            <p>Seminarios:</p>
                            <label><input type="checkbox" name="registro[]" id="sem_04" value="sem_04"><time>14:00</time> Creando una App en Android en una tarde</label>
                            <label><input type="checkbox" name="registro[]" id="sem_05" value="sem_05"><time>17:00</time> Creando una App en iOS en una tarde</label>
                        </div>
                    </div>
                    <!--#domingo-->
                </div>
                <!--.caja-->
            </div>
            <!--#eventos-->

            <div id="resumen" class="resumen ">
                <h3>Pago y Extras</h3>
                <div class="caja clearfix">
                    <div class="extras">
                        <div class="orden">
                            <label for="camisa_evento"> Camisa del evento $10 <small>(con 7% de descuento)</small> </label>
                            <input type="number" min="0" placeholder="0" id="camisa_evento" name="pedido_camisas" size="3">
                        </div>
                        <!--.orden-->
                        <div class="orden">
                            <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small> </label>
                            <input type="number" min="0" placeholder="0" id="etiquetas" name="pedido_etiquetas" size="3">
                        </div>
                        <!--.orden-->
                        <div class="orden">
                            <label for="regalo">Selecciona un regalo</label>
                            <select id="regalo" name="regalo" required>
                                <option value="">-Seleccione un regalo--</option>
                                <option value="2">etiquetas</option>
                                <option value="1">pulseras</option>
                                <option value="3">plumas</option>
                            </select>
                        </div>
                        <!--.orden-->

                        <input type="button" name="" id="calcular" class="boton" value="calcular">
                    </div>
                    <!--.extras-->

                    <div class="total">
                        <p>Resumen:</p>
                        <div id="listaProductos">

                        </div>
                        <p>Total:</p>
                        <div id="suma-total">

                        </div>
                        <input type="hidden" name="total_pedido" id="total_pedido" >
                        <input type="submit" name="submit" id="btnRegistro" class="boton" value="pagar">
                    </div>
                    <!--.total-->
                </div>
                <!--.caja-->
            </div>
            <!--#RESUMEN-->
        </form>






    </section>
    <?php include_once "include/templates/footer.php"; ?>