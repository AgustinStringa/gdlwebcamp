<?php include_once('funciones/funcionesAdmin.php'); ?>

<?php
if (isset($_POST['editar-categoria'])) {




    $nuevo_nombre = $_POST['nombre-cat'];
    $icono_categoria = $_POST['icono-categoria'];
    $id_editable = $_POST['id-editable'];

    try {
        $stmt = $conn->prepare("UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = $id_editable");
        $stmt->bind_param('ss', $nuevo_nombre, $icono_categoria);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'affected' => $stmt->affected_rows,
                'nuevo_nombre' => $nuevo_nombre
            );
        } else {
            $respuesta = array(
                'respuesta' => 'incorrecto',
                'affected' => $stmt->affected_rows
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'error' => $e->getMessage(),
            'respuesta' => 'incorrecto'
        );
    }

    die(json_encode($respuesta));
}
?>

<?php
if (isset($_POST['id-deletable'])) {
    $id_deletable = $_POST['id-deletable'];

    try {
        $stmt = $conn->prepare("DELETE FROM categoria_evento WHERE id_categoria = ?");
        $stmt->bind_param("i", $id_deletable);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'affected' => $stmt->affected_rows
            );
        } else {
            $respuesta = array(
                'respuesta' => 'incorrecto',
                'affected' => $stmt->affected_rows
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuestaE' => 'incorrecto',
            'asd' => $e->getMessage(),
            'affected' => $stmt->affected_rows
        );
    }

    die(json_encode($respuesta));
}
?>

<?php
if (isset($_POST['agregar-categoria'])) {
    $nombre_cat = $_POST['nombre-cat'];
    $icono_cat = $_POST['icono-categoria'];


    try {
        $stmt = $conn->prepare('INSERT INTO categoria_evento (cat_evento, icono) VALUES (?, ?)');
        $stmt->bind_param('ss', $nombre_cat, $icono_cat);
        $stmt->execute();

        $mod = $stmt->affected_rows;

        if ($mod > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'modificados' => $mod,
                'nombre' => $nombre_cat
            );
        } else {
            $respuesta = array(
                'respuesta' => 'incorrecto',
                'mod' => $mod,
                'stmt' => $stmt
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
