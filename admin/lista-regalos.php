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
            <h1>Regalos</h1>
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
              <h3 class="card-title">Lista de Regalos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Regalo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  
                  $sql = "SELECT * FROM regalos";
                  $resultado = $conn->query($sql);

                  while ($regalo = $resultado->fetch_assoc()):?>
                    <tr>
                      <td class="align-middle"><?php echo $regalo['nombre_regalo'] ?></td>
                      <td class="align-middle">
                        <a href="#" data-id="<?php echo $regalo['id_regalo'] ?>" data-tipo="regalo" class="btn btn-sm bg-gradient-maroon m-1 borrar-registro">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                  <?php  endwhile;
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>Regalo</th>
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
