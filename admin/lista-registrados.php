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
          <h1>Personas Registradas</h1>
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
            <h3 class="card-title">Lista de Personas Registradas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="registros" class="table table-bordered table-striped text-center nowrap registrados">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha Registro</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  
                  try {
                    $sql = "SELECT registrados.* , regalos.nombre_regalo FROM registrados";
                    $sql .= " JOIN regalos";
                    $sql .= " ON registrados.regalo = regalos.id_regalo";
                    $resultado = $conn->query($sql);
                  } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                  }


                  while ($registrado = $resultado->fetch_assoc()):?>
                <tr>
                  <td class="align-middle">
                    <?php 
                    echo $registrado['nombre_registrado'] . ' ' . $registrado['apellido_registrado'];
                    echo "<br>";
                    $pagado = $registrado['pagado'];
                    if ($pagado) {
                       echo '<span class="badge badge-success">Pagado</span>';
                    }else {
                        echo '<span class="badge badge-danger">No Pagado</span>';
                    }
                    ?>
                  </td>
                  <td class="align-middle"><?php echo $registrado['email_registrado'] ?></td>
                  <td class="align-middle"><?php echo $registrado['fecha_registro'] ?></td>
                  <td class="align-middle">
                    <?php 
                    $articulos = json_decode($registrado['pases_articulos'],true);
                    $arreglo_articulos = array(
                        'un_dia' => 'Pase 1 Dia',
                        'pase_2dias' => 'Pase 2 Dias',
                        'pase_completo' => 'Pase Completo',
                        'camisas' => 'Camisas',
                        'etiquetas' => 'Etiquetas',
                    );
                    ?>

                    <ul class="list-unstyled">
                      <?php 
                        foreach ($articulos as $key => $value) {
                        echo '<li class="p-1">' . $value . ' ' . $arreglo_articulos[$key] . '</li>';
                        }
                      ?>
                    </ul>


                  </td>

                  <td class="align-middle">
                    <ul class="list-unstyled" s>
                      <?php 
                      $talleres = json_decode($registrado['talleres_registrados'], true);
                      if (!$talleres == '') {
                        $talleres = implode("', '", $talleres['eventos']);
                        $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres')";
                        $resultado_talleres = $conn->query($sql_talleres);
                        while($eventos = $resultado_talleres->fetch_assoc()) {
                            echo '<li class="p-1">' .  $eventos['nombre_evento'] . ' / ' . $eventos['fecha_evento'] . ' / ' . $eventos['hora_evento'] . '</li>';
                        }
                      } else {
                        echo '<li class="p-1">Sin Registros</li>';
                      }
                      ?>
                    </ul>
                  </td>
                  <td class="align-middle"><?php echo $registrado['nombre_regalo'] ?></td>
                  <td class="align-middle">$<?php echo $registrado['total_pagado'] ?></td>
                  <td class="align-middle">
                    <a href="editar-registro.php?id=<?php echo $registrado['id_registrado'] ?>"
                      class="btn btn-sm bg-gradient-yellow m-1">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" data-id="<?php echo $registrado['id_registrado'] ?>" data-tipo="registrado" class="btn btn-sm bg-gradient-maroon m-1 borrar-registro">
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
                  <th>Email</th>
                  <th>Fecha Registro</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
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
