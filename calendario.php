<?php include_once "include/templates/header.php"; ?>





<section class="seccion contenedor">
    <h2 class="h2_separador">Calendario de eventos</h2>

    <?php 
    
    try {
        require_once('include/funciones/bd-connection.php'); //con este comando se "llama" al archivo que hace la conexion a la db
        $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";//en esta consulta, cat_evento es de la tabla categoria_eventos y nombre_invitado, apellido_invitado es de la tabla invitado
        $sql .= " FROM eventos ";
        $sql .= " INNER JOIN categoria_evento "; //nombre de la tabla que se "une" a la de la consulta original
        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
        //finalizacion del primer JOIN
        $sql .= " INNER JOIN invitados ";
        $sql .= " ON eventos.id_inv = invitados.invitado_id ";
        $sql .= " ORDER BY evento_id ";

        // echo $sql;


        $resultado = $conn->query($sql);//se usa la variable conexion y la funcion query que se usa en php para consultar
        
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    ?>

    <div class="calendario">
    
        <?php  
        
            // $eventos = $resultado->fetch_assoc(); //configura la forma de imprimir los datos
            //                         //tambien podría usarse fetch_array
            //                         //fetch_all --> accede a todos
        ?>

        <?php 
        $calendario = array();
        while($eventos = $resultado->fetch_assoc()){ 
            
            
            //creacion de una variable para guardar la fecha
            $fecha = $eventos["fecha_evento"];

            //si quisiese agrupar por categoria deberia crear una variable
            //asignarle ["cat_evento"]
            //y pasar la variable a calendario en el primer [], con el segundo [] vacio

            //creacion de un array separado al creado por fetch_assoc
            $evento = array(
                'titulo' => $eventos["nombre_evento"],
                'fecha' => $eventos["fecha_evento"],
                'hora' => $eventos["hora_evento"],
                'categoria' => $eventos["cat_evento"],
                'icono' => 'fa' . ' ' . $eventos['icono'],
                'invitado' => $eventos["nombre_invitado"] . " " . $eventos["apellido_invitado"]
            );
            
            //el arreglo calendario posee todos los eventos
            //pasandole $fecha como primera llave, esta los agrupa por fecha, haciendo que cada fecha sea una llave
            //de esta forma, el array tendra por largo la cantidad de fechas distintas
            $calendario[$fecha][] = $evento;

        } //while fetch_assoc()?>


        
        <?php foreach($calendario as $dia => $lista_eventos){ ?>
               
            
            <h3>
                <i class="fa fa-calendar"></i>
                <?php 
                    setlocale(LC_TIME, 'spanish');
                    // echo date( "F j, Y", strtotime($dia)); 
                    echo strftime( "%A, %d de %B del %Y", strtotime($dia));
                ?>
            </h3>

           
            <?php foreach($lista_eventos as $evento){ ?>

                <div class="dia">
                    <p class="titulo"> <?php echo $evento['titulo']; ?></p>
                    <p class="hora"> 
                        <i class=" fa fa-clock-o" aria-hidden="true"></i> 
                        <?php echo $evento['fecha'] . " / " . $evento['hora'] ; ?>   
                    </p>
                    <p>
                        <i class="<?php echo $evento['icono']; ?>" aria-hidden="true"></i> 
                        <?php echo $evento['categoria']; ?>
                    </p>
                    <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $evento['invitado']; ?>
                    </p>
                  
                </div>
            <?php } ?>
            

        <?php } //cierre del foreach fragmentado por el html del medio- foreach de fechas?>
        




        



    </div>

        <?php $conn->close(); //cierra la conexion con la base de datos. Siempre hay que hacerlo?>


</section>

<?php include_once "include/templates/footer.php"; ?>