<?php

include 'functions/funciones.php';
$id_invitado = $_GET['id'];

if (!filter_var($id_invitado, FILTER_VALIDATE_INT)) {

  die("Error en los datos solicitados");
 
}
include 'templates/header.php';
include 'templates/barra.php';
include 'templates/navegacion.php';


/* Validacion de info */
try {
  $info= $conn->query("SELECT * FROM invitados WHERE invitado_id = $id_invitado");
  $invitado = $info->fetch_assoc();
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
          <h1>Edición de Invitados</h1>
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
            <h3 class="card-title">Editar Invitado</h3>
          </div>
          <form class="form-horizontal guardar-registro-invitado text-center" name="guardar-registro"
            id="guardar-registro-archivo" method="post" action="modelo-invitado.php" enctype="multipart/form-data">

            <div class="card-body">
              <div class="form-group row">
                <label for="nombre-invitado" class="col-sm-3 col-form-label">Nombre(s) Invitado:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nombre-invitado" placeholder="Nombre(s) Invitado"
                    name="nombre-invitado" autocomplete="off" value="<?php echo $invitado['nombre_invitado']?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="apellido-invitado" class="col-sm-3 col-form-label">Apellido(s) Invitado:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="apellido-invitado" placeholder="Apellido(s) Invitado"
                    name="apellido-invitado" autocomplete="off" value="<?php echo $invitado['apellido_invitado']?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="biografia" class="col-sm-3 col-form-label">Biografia:</label>
                <div class="col-sm-9">
                  <textarea name="biografia" id="biografia" class="form-control" rows="3"
                    placeholder="Biografia Invitado..."
                    autocomplete="off"><?php echo $invitado['descripcion']?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="biografia" class="col-sm-3 col-form-label">Imagen:</label>
                <div class="col-sm-9">
                  <div class="image w-50 m-auto">
                    <img src="../img/invitados/<?php echo $invitado['url_imagen']?>" class="img-fluid mb-3">
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen" name="imagen">
                    <label class="custom-file-label" for="imagen">Cambiar la imagen</label>
                  </div>


                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
              <input type="hidden" name="registro" value="actualizar">
              <input type="hidden" name="id_registro" value="<?php echo $invitado['invitado_id'] ?>">
              <button type="submit" class="btn btn-primary" id="btn-enviar-registro-invitado">Actualizar</button>
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
