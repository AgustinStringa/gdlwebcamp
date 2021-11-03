<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE | Pagina Principal</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- <link rel="stylesheet" href="css/all.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">

  <!--sweet alert-->
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <!--sweet alert-->

  <?php
  $cadena = $_SERVER['PHP_SELF'];
  $cadena = substr($cadena, 18);
  if ($cadena == 'lista-admin.php' || $cadena == 'lista-evento.php' || $cadena == 'lista-invitados.php' || $cadena == 'lista-categorias.php') {
    echo '<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">';
    echo '<link rel="stylesheet" href="css/buttons.bootstrap4.min.css">';
    echo '<link rel="stylesheet" href="css/responsive.bootstrap4.min.css">';
  }

  if ($cadena == 'crear-categoria.php') {
    echo '<link rel="stylesheet" href="css/fontawesome-iconpicker.css">';

    // echo '
    // <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">';
  }
  ?>



</head>