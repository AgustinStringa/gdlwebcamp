<?php include_once('funciones/funcionesAdmin.php'); ?>
<?php //a partir de aqui podría usarse la variable $conn, ya que está incluida
?>


<?php //insertar admin
?>
<?php

if (isset($_POST['agregar-admin'])) {


    //
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    //hasheando password
    $opciones = array(
        'cost' => 12
    );
    $pass_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    //insertar en la db

    try {
        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $usuario, $nombre, $pass_hashed);

        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'nombre' => $nombre,
                'usuario' => $usuario,
                'id_admin' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'por algun motivo no hubo columnas modificadas despues de ejecutar la consulta'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        $respuesta = array(
            'respuesta' => 'error',
            'mensaje' => 'error fatal'
        );
    }

    die(json_encode($respuesta));
}

?>

<?php //loguear admin
?>
<?php

if (isset($_POST['login-admin'])) {


    $usuarioLog = $_POST['usuario'];
    $passLog = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ? ");
        $stmt->bind_param('s', $usuarioLog);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $pass_admin, $editado, $nivel);

        if ($stmt->affected_rows) {

            $existe = $stmt->fetch();
            if ($existe) {


                if (password_verify($passLog, $pass_admin)) {
                    //inicio de sesion
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['nombre'] = $nombre_admin;
                    $_SESSION['nivel'] = $nivel;
                    $_SESSION['id'] = $id_admin;


                    $respuesta = array(
                        'respuesta' => 'exito',
                        'usuario' => $usuario_admin,
                        'nombre' => $nombre_admin
                    );
                } else {

                    $respuesta = array(
                        'respuesta' => 'inconsistente'
                    );
                };
            } else {
                $respuesta = array(
                    'respuesta' => 'inexistente',
                    'mensaje' => 'no existe tal usuario en nuestra base de datos'
                );
            }
        } else {
            //no hay columnas afectadas
            $respuesta = array(
                'respuesta' => 'nose',
                'mensaje' => 'no sabría decirte'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => 'error',
            'mensaje' => 'error durante login',
            'e' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

?>



<?php //editar admin
?>
<?php

if (isset($_POST['editar-admin'])) {

    $opciones = array(
        'cost' => 12
    );

    $id_editable = $_POST['id-editable'];
    $usuario_updated = $_POST['usuario'];
    $nombre_updated = $_POST['nombre'];


    if (strlen(filter_var($_POST['password'], FILTER_SANITIZE_STRING))) {
        $password_updated = $_POST['password'];
        $password_updated = password_hash($password_updated, PASSWORD_BCRYPT, $opciones);
    }




    try {

        if (strlen(filter_var($_POST['password'], FILTER_SANITIZE_STRING)) > 0) {

            $stmt = $conn->prepare("UPDATE admins set usuario = ?, nombre = ? , password = ?, editado = NOW() where id_admin = ? ");
            $stmt->bind_param("sssi", $usuario_updated, $nombre_updated, $password_updated, $id_editable);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $resultado = array(
                    'respuesta' => 'exito',
                    'id_updated' => $stmt->insert_id,
                    'mensaje' => 'se modifico alguna columna',
                    'usuario' => $usuario_updated,
                    'nombre' => $nombre_updated
                );
            } else {
                $resultado = array(
                    'respuesta' => 'no-correcto',
                    'mensaje' => 'no se modifico columna alguna'
                );
            }
        } else {

            $stmt = $conn->prepare("UPDATE admins set usuario = ?, nombre = ?, editado = NOW() where id_admin = ? ");
            $stmt->bind_param("ssi", $usuario_updated, $nombre_updated, $id_editable);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $resultado = array(
                    'respuesta' => 'exito',
                    'id_updated' => $stmt->insert_id,
                    'mensaje' => 'se modifico alguna columna',
                    'usuario' => $usuario_updated,
                    'nombre' => $nombre_updated
                );
            } else {
                $resultado = array(
                    'stmt' => $stmt,
                    'respuesta' => 'no-correcto',
                    'mensaje' => 'no se modifico columna alguna'
                );
            }
        }


        $stmt->close();
        $conn->close();
    } catch (Exception $e) {

        $resultado = array(
            'respuesta' => 'incorrecto',
            'mensaje' => 'error catch',
            'error' => $e->getMessage()
        );
    }

    echo (json_encode($resultado));
};


?>


<?php //eliminar admin 
?>
<?php
if ($_POST['id-deletable']) {

    $id = $_POST['id-deletable'];


    try {
        $stmt = $conn->prepare('DELETE from admins where id_admin = ?');
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'mensaje' => 'eliminado correctamente'
            );
        } else {
            $respuesta = array(
                'respuesta' => 'No-exito',
                'mensaje' => 'no se han realizado modificaciones en la db'
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => 'error'
        );
    }



    // $jjj = array(
    //     'mandaste' => 'algo',
    //     'veremos' => 'que pasa',
    //     'id-deletable' => $_POST['id-deletable'] 
    // );
    die(json_encode($respuesta));
}
?>

