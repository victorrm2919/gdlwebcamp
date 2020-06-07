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
          <h1>Creacion de Categorias</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="row">
    <div class="col-xl-8 m-xl-auto m-3">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Crear Categoria</h3>
          </div>
            <form class="form-horizontal text-center crear-registro-categoria" name="crear-registro" id="guardar-registro" method="post" action="modelo-categorias.php">
              <div class="card-body">
                <div class="form-group row">
                  <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre de categoria" name="nombre" required autocomplete='off'>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="icono" class="col-sm-3 col-form-label">Icono:</label>
                  <div class="col-sm-9 input-group iconpicker-container">
                    <div class="input-group-append">
                      <div class="input-group-text iconpicker-component">
                        <i></i>
                      </div>
                    </div>
                    <input type="text" data-placement="bottomLeft" class="form-control" id="icono" placeholder="Icono FontAwasome" name="icono"
                      required autocomplete='off'>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="btn-crear-registro-categoria" disabled>Añadir</button>
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
