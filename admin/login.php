<?php
session_start();
include 'functions/funciones.php';
include 'templates/header.php';

if ($_GET['cerrar_sesion']) {  //valida que se halla dado click en cerrar session y enviar por get el valor, se creo una sesion vacia
  session_destroy();
}

?>


<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>Sitio</b>Conferencias</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sesión</p>

      <form method="post" action="login-admin.php" name="login-admin-form" id="login-admin">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario" autocomplete='off'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" autocomplete='off'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

          <!-- /.col -->
          <div class="col-12">
            <input type="hidden" name="login-admin" value="1">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php

include 'templates/footer.php';

?>
