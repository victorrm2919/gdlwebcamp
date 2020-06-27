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
            <h1>Administradores</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <?php if(!$_SESSION['nivel'] == '1') {?>
      <div class="row">
        <div class="col-xl-8 m-xl-auto m-3">
          <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Alto!</h5>
            <p>No tienes acceso a esta pagina, <a href="index.php" class="alert-link">Regresa al Dashboard</a></p>
          </div>
        </div>
      </div>
    <?php }else {?>


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Administradores</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Nivel</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  
                  $sql = "SELECT * FROM admins";
                  $resultado = $conn->query($sql);

                  while ($admin = $resultado->fetch_assoc()):?>
                    <tr>
                      <td class="align-middle"><?php echo $admin['usuario'] ?></td>
                      <td class="align-middle"><?php echo $admin['nombre'] ?></td>
                      <td class="align-middle"><?php echo $admin['nivel'] ?></td>
                      <td class="align-middle botones">
                        <a href="editar-admin.php?id=<?php echo $admin['id'] ?>" class="btn btn-sm bg-gradient-yellow m-1">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="<?php echo $admin['id'] ?>" data-tipo="admin" class="btn btn-sm bg-gradient-maroon m-1 borrar-registro">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                  <?php  endwhile;
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Nivel</th>
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


    <?php }?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include 'templates/footer.php';

?>
