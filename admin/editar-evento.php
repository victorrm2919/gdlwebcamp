<?php

include 'functions/funciones.php';
$id_evento = $_GET['id'];

if (!filter_var($id_evento, FILTER_VALIDATE_INT)) {

  die("Error en los datos solicitados");
 
}
include 'templates/header.php';
include 'templates/barra.php';
include 'templates/navegacion.php';


/* Validacion de info */
try {
    $info= $conn->query("SELECT * FROM eventos WHERE evento_id = $id_evento");
    $evento = $info->fetch_assoc();
  } catch (Exception $e) {
    $error = $e->getMessage();
    echo `<div class="info-box bg-danger"> Hubo un error!!: $error</div>`;
  }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edición de Eventos</h1>
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
            <h3 class="card-title">Editar Evento</h3>
          </div>
            <form class="form-horizontal text-center guardar-registro-evento" name="guardar-registro" id="guardar-registro" method="post"
              action="modelo-evento.php">
              <div class="card-body">
                <div class="form-group row">
                  <label for="titulo-evento" class="col-sm-3 col-form-label">Titulo Evento:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="titulo-evento" placeholder="Titulo del Evento"
                      name="titulo-evento" required autocomplete='off' value="<?php echo $evento['nombre_evento'] ?>">
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
                      placeholder="Fecha del Evento" required autocomplete='off' value="<?php echo date('m/d/Y', strtotime($evento['fecha_evento']))?>">
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
                        id="hora-evento" name="hora-evento" placeholder="Hora del Evento" autocomplete='off' value="<?php echo date('H:i A', strtotime($evento['hora_evento'])) ?>">
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
                    <option value="<?php echo $categoria['id_categoria']?>" <?php if ($categoria['id_categoria'] == $evento['id_cat_evento']) {echo 'selected';} ?> >
                    <?php echo $categoria['cat_evento']?>
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
                    <option value="<?php echo $categoria['invitado_id'] ?>" <?php if ($categoria['invitado_id'] == $evento['id_inv']) {echo 'selected';} ?>>
                      <?php echo $categoria['nombre_invitado'] . ' ' . $categoria['apellido_invitado'] ?>
                    </option>
                    <?php endwhile; ?>
                  </select>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer text-right">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $evento['evento_id'] ?>">
                <button type="submit" class="btn btn-primary" id="btn-guardar-registro-evento">Actualizar</button>
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
