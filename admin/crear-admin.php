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
          <div class="card-body">
            <form class="form-horizontal" name="crear-admin" id="crear-admin" method="post" action="insertar-admin.php">
              <div class="card-body">
                <div class="form-group row">
                  <label for="usuario" class="col-sm-2 col-form-label">Usuario:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form  -control" id="usuario" placeholder="Usuario" name="usuario">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" name="nombre">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password:</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="hidden" name="agregar-admin" value="1">
                <button type="submit" class="btn btn-primary">Añadir</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card-body -->
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
