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
          <h1>Creacion de Eventos</h1>
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
            <h3 class="card-title">Crear Evento</h3>
          </div>
            <form class="form-horizontal text-center crear-registro-evento" name="crear-registro" id="guardar-registro" method="post"
              action="modelo-evento.php">
              <div class="card-body">
                <div class="form-group row">
                  <label for="titulo-evento" class="col-sm-3 col-form-label">Titulo Evento:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="titulo-evento" placeholder="Titulo del Evento"
                      name="titulo-evento" required autocomplete='off'>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="fecha-evento" class="col-sm-3 col-form-label">Fecha Evento:</label>
                  <div class="col-sm-9 input-group">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" id="fecha-evento" name="fecha-evento"
                      placeholder="Fecha del Evento" required autocomplete='off'>
                  </div>
                </div>

                <div class="bootstrap-timepicker">
                  <div class="form-group row">
                    <label for="hora-evento" class="col-sm-3 col-form-label">Hora Evento:</label>
                    <div class="input-group date col-sm-9" id="horaEvento" data-target-input="nearest">
                      <div class="input-group-append" data-target="#horaEvento" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" data-target="#horaEvento" data-toggle="datetimepicker"
                        id="hora-evento" name="hora-evento" placeholder="Hora del Evento" autocomplete='off'>
                    </div>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="categoria-evento" class="col-sm-3 col-form-label">Categoria Evento:</label>
                  <select class="form-control col-sm-9 select" id="categoria-evento" name="categoria-evento">
                  <option></option>
                    <?php 
                        $sql= "SELECT * FROM categoria_evento";
                        $resultado = $conn->query($sql);

                        while ($categoria = $resultado->fetch_assoc()):?>
                    <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['cat_evento'] ?>
                    </option>
                    <?php endwhile; ?>
                  </select>
                </div>


                <div class="form-group row">
                  <label for="invitado" class="col-sm-3 col-form-label text-center">Invitado Evento:</label>
                  <select class="form-control select col-sm-9" id="invitado" name="invitado">
                      <option></option>
                    <?php 
                        $sql= "SELECT * FROM invitados";
                        $resultado = $conn->query($sql);

                        while ($categoria = $resultado->fetch_assoc()):?>
                    <option value="<?php echo $categoria['invitado_id'] ?>">
                      <?php echo $categoria['nombre_invitado'] . ' ' . $categoria['apellido_invitado'] ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer text-right">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="btn-crear-registro-evento" disabled>Añadir</button>
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
