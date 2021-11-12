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
