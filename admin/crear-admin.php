<?php

include 'functions/funciones.php';
include 'templates/header.php';
include 'templates/barra.php';
include 'templates/navegacion.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Creacion de Administradores</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="row">
    <div class="col-md-8 m-auto">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Crear Administrador</h3>
          </div>
            <form class="form-horizontal text-center" name="crear-registro" id="crear-registro" method="post" action="modelo-admin.php">
              <div class="card-body">
                <div class="form-group row">
                  <label for="usuario" class="col-sm-3 col-form-label">Usuario:</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" required autocomplete='off'>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" name="nombre"
                      required autocomplete='off'>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-3 col-form-label">Password:</label>
                  <div class="col-sm-9 input-group">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                      required autocomplete='off'>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-key"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="repetir-password" class="col-sm-3 col-form-label">Confirmar Password:</label>
                  <div class="col-sm-9 input-group">
                    <input type="password" class="form-control" id="repetir-password" placeholder="Password"
                      name="repetir-password" required autocomplete='off'>

                      <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-key"></i>
                      </span>
                    </div>
                    <div id="resultado-password" class="invalid-feedback">
                      Las contraseñas no coinciden
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="btn-crear-registro-admin" disabled>Añadir</button>
              </div>
              <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<?php

include 'templates/footer.php';

?>
