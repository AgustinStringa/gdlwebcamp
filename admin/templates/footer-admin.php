<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.1.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.min.js"></script>

<?php


//<!-- Select2 -->
echo '<link rel="stylesheet" href="css/select2-bootstrap4.min.css"/>';
echo '<link rel="stylesheet" href="css/select2.min.css"/>';

echo  '<script src="js/select2.full.min.js"></script>';

if ($cadena == 'lista-admin.php' || $cadena == 'lista-evento.php' || $cadena == 'lista-invitados.php' || $cadena == 'lista-categorias.php' || $cadena == 'lista-invitados.php') {


  echo '<script src="js/jquery.dataTables.min.js"></script>';
  echo '<script src="js/dataTables.bootstrap4.min.js"></script>';
  echo ' <script src="js/dataTables.responsive.min.js"></script>';
  echo '<script src="js/responsive.bootstrap4.min.js"></script>';
  echo '<script src="js/dataTables.buttons.min.js"></script>';
  echo '<script src="js/buttons.bootstrap4.min.js"></script>';


  echo '<script src="js/jszip.min.js"></script>';
  echo '<script src="js/pdfmake.min.js"></script>';
  echo '<script src="js/vfs_fonts.js"></script>';

  echo '<script src="js/buttons.html5.min.js"></script>';
  echo '<script src="js/buttons.print.min.js"></script>';
  echo '<script src="js/buttons.colVis.min.js"></script>';
}

if ($cadena == 'crear-categoria.php' || $cadena == 'editar-categoria.php') {
  echo '<script src="js/fontawesome-iconpicker.js"></script>';
}
?>


<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!--font awesome-->
<script src="https://kit.fontawesome.com/d063ecd26a.js" crossorigin="anonymous"></script>
<!--sweet alert-->
<script src="js/sweetalert2.all.min.js"></script>

<!--main-->
<script src="js/admin-ajax.js"></script>

<script src="js/app.js"></script>

</body>

</html>