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
            <h1>Invitados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Invitados</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Biografia</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  
                  $sql = "SELECT * FROM invitados";
                  $resultado = $conn->query($sql);

                  while ($invitado = $resultado->fetch_assoc()):?>
                    <tr>
                      <td class="align-middle"><?php echo $invitado['nombre_invitado'] . ' ' . $invitado['apellido_invitado'] ?></dh>
                      <td class="align-middle"><?php echo $invitado['descripcion'] ?></td>
                      <td class="align-middle"><?php echo $invitado['url_imagen'] ?></td>
                      <td class="align-middle">
                        <a href="editar-invitado.php?id=<?php echo $invitado['id_invitado'] ?>" class="btn btn-sm bg-gradient-yellow m-1">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="<?php echo $invitado['invitado_id'] ?>" data-tipo="invitado" class="btn btn-sm bg-gradient-maroon m-1 borrar-registro">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                  <?php  endwhile;
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Biografia</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include 'templates/footer.php';

?>
