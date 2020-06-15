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
          <h1>Eventos</h1>
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
            <h3 class="card-title">Lista de Eventos</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="registros" class="table table-bordered table-striped text-center display nowrap" style='width: 100%'>
              <thead>

                <tr>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Categoria</th>
                  <th>Invitado</th>
                  <th>Acciones</th>
                </tr>

              </thead>
              <tbody>
                <?php 
                  
                  try {
                    $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado";
                    $sql .= " FROM eventos";
                    $sql .= " INNER JOIN categoria_evento";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria";
                    $sql .= " INNER JOIN invitados";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id";
                    $sql .= " ORDER BY evento_id";
                    $resultado = $conn->query($sql);
                  } catch (Exception $e) {
                     $error = $e->getMessage();
                     echo $error;
                  }

                  while ($evento = $resultado->fetch_assoc()):?>
                <tr>
                  <td class="text-left align-middle"><?php echo $evento ['nombre_evento'] ?></td>
                  <td class="align-middle"><?php echo $evento ['fecha_evento'] ?></td>
                  <td class="align-middle"><?php echo $evento ['hora_evento'] ?></td>
                  <td class="align-middle"><?php echo $evento ['cat_evento'] ?></td>
                  <td class="align-middle"><?php echo $evento ['nombre_invitado'] . ' ' . $evento['apellido_invitado']?></td>
                  <td class="align-middle">
                        <a href="editar-evento.php?id=<?php echo $evento ['evento_id'] ?>" class="btn btn-sm bg-gradient-yellow m-1">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="<?php echo $evento ['evento_id'] ?>" data-tipo="evento" class="btn btn-sm bg-gradient-maroon m-1 borrar-registro">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                </tr>
                <?php  endwhile;?>



              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Categoria</th>
                  <th>Invitado</th>
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
