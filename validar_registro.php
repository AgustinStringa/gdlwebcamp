<?php if(isset($_POST['submit'])):?>
    <?php 
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email']; 
        $regalo = $_POST['regalo']; // 1 - 2 - 3
        $total = $_POST['total_pedido']; // $
        $fecha = date('Y-m-d H:i:s');   
        //pedidos
        $boletos = $_POST['boletos'];
        $camisas = $_POST['pedido_camisas'];
        $etiquetas = $_POST['pedido_etiquetas'];
        //
        include_once "include/funciones/productosJson.php";
        $pedido = productosJson($boletos, $camisas, $etiquetas);
        //eventos
        $eventos = $_POST["registro"];
        $registro = eventosJson($eventos);
        /**
         * estos dos vardump se usan para ver la estructura de los JSON que se enviaran a la DB
         */
        // echo "<pre>";
        // var_dump($pedido);
        // echo "</pre>";
        //   echo "<pre>";
        //   var_dump($registro);
        //   echo "</pre>";
        //insercciones a la base de datos
        try {
            require_once('include/funciones/bd-connection.php');
            $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header('Location: validar_registro.php?exitoso=1');
        } catch (Exception $e) {
            $error = $e->getMessage();    
        }
    ?>
    <pre>
        <?php  //var_dump($_POST);?>
    </pre>
    <pre>
        <?php //var_dump($boletos);?>
    </pre>
<?php endif;?>

<?php include_once "include/templates/header.php"; ?>


<section class="contenedor">

    <h2 class="h2_separador">Resumen registro</h2>

    <?php if(isset($_GET['exitoso'])){
        if($_GET['exitoso'] == "1"){
            echo "<p> registro exitoso </p>";
        } else {
            echo "<p> No se ha completado exitosamente el registro </p>";
        }
    } else {
        echo "<p> Ha ocurrido un error en el registro </p>";
    }?>
        
    

</section>

<?php include_once "include/templates/footer.php"; ?>
