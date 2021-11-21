<?php include_once('funciones/funcionesAdmin.php'); ?>

<?php if (isset($_POST['agregar-invitado'])) {

    //se guardan archivos en el servidor, no en la DB

    $nombre_invitado = $_POST['nombre-invitado'];
    $apellido_invitado = $_POST['apellido-invitado'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen'];
    $imagen_url = '';
    //directorio donde se suben los archivos
    $directorio = "../img/invitados/";

    if (!is_dir($directorio)) {
        //mkdir recibe el directorio, los permisos, y recursivo true-false. Se encarga de crear un directorio

        //0755 -> para que lso usuarios puedan ver pero no editar
        // recursive true --> para que todos los archivos tengan los permisos
        mkdir($directorio, 0755, true);
    }



    //move_uploaded_file mueve un archivo desde el directorio del primer parametro hasta el nuevo
    if (move_uploaded_file($imagen['tmp_name'], $directorio . $imagen['name'])) {
        $imagen_url = $imagen['name'];
        $imagen_resultado = 'se subio correctamente';
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }




    //try catch inserccion
    try {

        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion_invitado, url_imagen) VALUES (?,?,?,?) ");
        $stmt->bind_param("ssss", $nombre_invitado, $apellido_invitado, $descripcion, $imagen_url);
        $stmt->execute();


        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'url-imagen' => $imagen_url,
                'nombre_invitado' => $nombre_invitado
            );
        } else {
            $respuesta = array(
                'respuesta' => 'incorrecto-no affecteds'
            );
        }





        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => 'fallida'
        );
    }

    die(json_encode($respuesta));
}
?>

<?php if (isset($_POST['editar-invitado'])) {
    //imagen

    $imagen = $_FILES['imagen'];
    $url_actual = $_POST['url-actual'];
    $imagen_error = $imagen['error'];
    $imagen_name = $imagen['name'];
    $imagen_size = $imagen['size'];
    //resto
    $nombre = $_POST['nombre-invitado'];
    $apellido = $_POST['apellido-invitado'];
    $descripcion = $_POST['descripcion'];
    $id = $_POST['id-invitado'];

    //comprobar que la imagen exista

    $directorio = '../img/invitados/' . $imagen['name'];

    if (file_exists($directorio)) {
        //si existe no hace falta cargar en el servidor
        $existe = true;
        if ($imagen['name']) {
            $imagen_url = $imagen['name'];
        } else {
            $imagen_url = $url_actual;
        }
    } else {
        $existe = false;

        //si no existe, tengo que crearlo en el servidor
        if (move_uploaded_file($imagen['tmp_name'], $directorio)) {
            $imagen_url = $imagen['name'];
            $imagen_resultado = 'se subio correctamente';
            $existe = true;
        } else {
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }
    }

    try {
        $stmt = $conn->prepare("UPDATE invitados set nombre_invitado = ?, apellido_invitado = ?, descripcion_invitado = ?, url_imagen = ?, editado = NOW() WHERE invitado_id = $id");
        $stmt->bind_param('ssss', $nombre, $apellido, $descripcion, $imagen_url);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                'dir' => $directorio,
                'existe' => $existe,
                'imagen' => $imagen,
                'imagen_url' => $imagen_url,
                'imagen_resultado' => $imagen_resultado,
                'respuesta' => 'exito',
                'modificados' => $stmt->affected_rows,
                'nombre_invitado' => $nombre
            );
        } else {
            $respuesta = array(
                'dir' => $directorio,
                'existe' => $existe,
                'imagen' => $imagen,
                'imagen_url' => $imagen_url,
                'imagen_resultado' => $imagen_resultado,
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'dir' => $directorio,
            'existe' => $existe,
            'imagen' => $imagen,
            'imagen_url' => $imagen_url,
            'imagen_resultado' => $imagen_resultado,
            'respuesta' => 'error',
            'error' => $e->getMessage()
        );
    }


    // $respuesta = array(
    //     'dir' => $directorio,
    //     'existe' => $existe,
    //     'imagen' => $imagen,
    //     'imagen_url' => $imagen_url,
    //     'imagen_resultado' => $imagen_resultado,
    //     'respuesta' => 'exito'
    // );

    die(json_encode($respuesta));
}
?>



<?php if (isset($_POST['id-deletable'])) {
    $id_deletable = $_POST['id-deletable'];
    $url_img_delete = $_POST['url-img-delete'];

    try {

        //INTENTANDO BORRAR EL ARCHIVO DEL DIRECTORIO DEL SERVER
        if (file_exists($url_img_delete)) {
            if (unlink($url_img_delete)) {
                $borrado = true;
            } else {
                $borrado = false;
            }
        } else {
        }

        $stmt = $conn->prepare('DELETE FROM invitados WHERE invitado_id = ?');
        $stmt->bind_param('i', $id_deletable);
        $stmt->execute();

        $mods = $stmt->affected_rows;

        if ($mods > 0) {
            $response = array(
                'respuesta' => 'exito',
                'post' => $_POST
            );
        } else {
            $response = array(
                'respuesta' => 'no-mods',
                'post' => $_POST
            );
        }
    } catch (Exception $e) {
        $response = array(
            'respuesta' => 'error',
            'error' => $e->getMessage()
        );
    }
    $response = array(
        'respuesta' => 'exito',
        'el url de la imagen es' => $url_img_delete,
        'borrado' => $borrado
    );

    die(json_encode($response));
}
?>