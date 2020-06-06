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
          <h1>Adicion de Invitados</h1>
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
            <h3 class="card-title">Añadir Invitado</h3>
          </div>
          <form class="form-horizontal text-center crear-registro-evento" name="crear-registro" id="crear-registro"
            method="post" action="modelo-invitado.php">
            <div class="card-body">
              <div class="form-group row">
                <label for="nombre-invitado" class="col-sm-3 col-form-label">Nombre(s) Invitado:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nombre-invitado" placeholder="Nombre(s) Invitado"
                    name="nombre-invitado" required autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="apellido-invitado" class="col-sm-3 col-form-label">Apellido(s) Invitado:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="apellido-invitado" placeholder="Apellido(s) Invitado"
                    name="apellido-invitado" required autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="biografia" class="col-sm-3 col-form-label">Biografia:</label>
                <div class="col-sm-9">
                  <textarea name="biografia" id="biografia" class="form-control" rows = "3"
                    placeholder="Biografia Invitado..." required autocomplete="off"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="biografia" class="col-sm-3 col-form-label">Imagen:</label>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen">
                    <label class="custom-file-label" for="imagen">Selecciona la imagen</label>
                  </div>
                </div>
              </div>


            </div>

            <!-- /.card-body -->

            <div class="card-footer text-right">
              <input type="hidden" name="registro" value="nuevo">
              <button type="submit" class="btn btn-primary" id="btn-crear-registro-invitado" disabled>Añadir</button>
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
