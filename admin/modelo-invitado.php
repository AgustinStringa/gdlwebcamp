<?php if (isset($_POST['agregar-invitado'])) {

    $respuesta = array(
        'post' => $_POST,
        'files' => $_FILES['imagen'],
        'respuesta' => 'exito'
    );
    die(json_encode($respuesta));
}
