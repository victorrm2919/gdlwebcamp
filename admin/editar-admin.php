<?php

include 'functions/funciones.php';
$id_admin = $_GET['id'];

if (!filter_var($id_admin, FILTER_VALIDATE_INT)) {

  die(header('Location: error.php'));
 
}
include 'templates/header.php';
include 'templates/barra.php';
include 'templates/navegacion.php';


/* Validacion de info */
try {
  $info= $conn->query("SELECT * FROM admins WHERE id = $id_admin");
  $admin = $info->fetch_assoc();
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
          <h1>Edición de Administradores</h1>
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
            <h3 class="card-title">Editar Administrador</h3>
          </div>
            <form class="form-horizontal guardar-registro-admin text-center" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
              <div class="card-body">
                <div class="form-group row">
                  <label for="usuario" class="col-sm-2 col-form-label">Usuario:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" value="<?php echo $admin['usuario'] ?>"> 
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" name="nombre" value="<?php echo $admin['nombre'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password:</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Repetir Password:</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="repetir-password" placeholder="Password"
                      name="repetir-password">
                    <div id="resultado-password" class="invalid-feedback">
                      Las contraseñas no coinciden
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                <label for="nivelA" class="col-sm-3 col-form-label">Nivel:</label>
                  <select class="form-control col-sm-9 select" id="nivelA" name="nivelA" <?php if (!$_SESSION['nivel'] == '1') {echo 'disabled';} ?>>
                  <option></option>
                  <option value="1" <?php if ($admin['nivel'] == '1') {echo 'selected';} ?>>SU</option>
                  <option value="0" <?php if ($admin['nivel'] == '0') {echo 'selected';} ?>>BA</option>
                  </select>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="nivel" value="<?php echo $_SESSION['nivel'] ?>">
                <input type="hidden" name="id_registro" value="<?php echo $admin['id'] ?>">
                <button type="submit" class="btn btn-primary" id="btn-enviar-registro-admin">Actualizar</button>
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
