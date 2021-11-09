<?php include_once('funciones/funcionesAdmin.php'); ?>

<?php

if (isset($_POST['agregar-evento'])) {
    //creando variables desde el contenido del POST
    $fecha_evento = $_POST['fecha-evento'];
    $hora_evento = $_POST['hora-evento'];
    $invitado = $_POST['invitado-evento'];
    $nombre = $_POST['nombre-evento'];
    $tipo = $_POST['tipo-evento'];

    //en este caso no es necesario, pero puede que se necesite cambiar el formato de fecha
    //$fecha_formateada = date('Y-m-d', strtotime($fecha_evento));

    try {
        //crear consulta para insertar evento en la db
        $stmt = $conn->prepare("INSERT INTO eventos(nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?) ");
        $stmt->bind_param("sssii", $nombre, $fecha_evento, $hora_evento, $tipo, $invitado);
        $stmt->execute();

        $id_insertado = $stmt->insert_id;

        if ($stmt->affected_rows) {
            $resultado = array(
                'respuesta' => 'exito',
                'nuevoid' => $id_insertado,
                'nombre_evento' => $nombre
            );
        } else {
            $resultado = array(
                'respuesta' => 'incorrecto-no affecteds'
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $resultado = array(
            'respuesta' => 'incorrecto',
            'error' => $e->getMessage()
        );
    }



    die(json_encode($resultado));
}
?>


<?php
if (isset($_POST['editar-evento'])) {



    $fecha_updated = $_POST['fecha-evento'];
    $hora_updated = $_POST['hora-evento'];
    $invitado_updated = $_POST['invitado-evento'];
    $nombre_updated = $_POST['nombre-evento'];
    $id_actualizable = $_POST['evento-id'];
    $tipo_updated = $_POST['tipo-evento'];
    $invitado_updated = $_POST['invitado-evento'];


    try {
        //sql 
        $stmt = $conn->prepare("UPDATE eventos SET nombre_evento = ? , fecha_evento = ? , hora_evento = ? , id_cat_evento = ? , id_inv = ?, editado = NOW() WHERE evento_id = $id_actualizable");
        $stmt->bind_param("sssii", $nombre_updated, $fecha_updated, $hora_updated, $tipo_updated, $invitado_updated);
        $stmt->execute();

        $modificados = $stmt->affected_rows;

        $array = array(
            'respuesta' => 'exito',
            'modificados' => $modificados
        );

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $array = array(
            'respuesta' => 'incorrecto',
            'error' => $e->getMessage()
        );
    }

    die(json_encode($array));
}
?>

<?php
if (isset($_POST['id-deletable'])) {
    $id_deletable = $_POST['id-deletable'];


    try {
        $stmt = $conn->prepare('DELETE FROM eventos WHERE evento_id = ?');
        $stmt->bind_param('i', $id_deletable);
        $stmt->execute();

        $modificados = $stmt->affected_rows;

        if ($modificados > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'modificados' => $modificados
            );
        } else {
            $respuesta = array(
                'respuesta' => 'incorrecto',
                'modificados' => $modificados
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => 'incorrecto',
            'error' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}
?>