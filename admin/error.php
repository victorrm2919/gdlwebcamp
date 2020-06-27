<?php
include 'functions/funciones.php';
include 'templates/header.php';
include 'templates/barra.php';
include 'templates/navegacion.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
  <div class="row">
    <div class="col-xl-8 m-xl-auto m-3">
      <div class="alert alert-danger alert-dismissible">
        <h5><i class="icon fas fa-ban"></i> Alto!</h5>
        <p>Error en la solicitud, <a href="index.php" class="alert-link">Regresa al Dashboard</a> y asegurate de hacer las cosas correctamente. </p>
      </div>
    </div>
  </div>
  </section>
</div>
<!-- /.content-wrapper -->

<?php

include 'templates/footer.php';

?>
