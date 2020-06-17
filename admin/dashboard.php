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
          <h1>Bienvenido <?php echo $_SESSION['nombre']?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Revisa la informacion general del Evento</h3>
      </div>
      <div class="card-body">
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- widget -->
            <?php 
            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
            $resultado = $conn->query($sql);
            $info = $resultado->fetch_assoc();
            ?>
            <!-- small card -->
            <div class="small-box bg-gradient-cyan elevation-3">
              <div class="inner">
                <h3><?php echo $info['registros']?></h3>

                <p>Total Registros</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div> <!-- Fin widget -->

          <div class="col-lg-3 col-6">
            <!-- widget -->
            <?php 
            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 1";
            $resultado = $conn->query($sql);
            $info = $resultado->fetch_assoc();
            ?>
            <!-- small card -->
            <div class="small-box bg-gradient-yellow elevation-3">
              <div class="inner">
                <h3><?php echo $info['registros']?></h3>

                <p>Total Pagados</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div> <!-- Fin widget -->

          <div class="col-lg-3 col-6">
            <!-- widget -->
            <?php 
            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 0";
            $resultado = $conn->query($sql);
            $info = $resultado->fetch_assoc();
            ?>
            <!-- small card -->
            <div class="small-box bg-gradient-red elevation-3">
              <div class="inner">
                <h3><?php echo $info['registros']?></h3>

                <p>Pendientes de Pago</p>
              </div>
              <div class="icon">
                <i class="fas fa-cart-arrow-down"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div> <!-- Fin widget -->

          <div class="col-lg-3 col-6">
            <!-- widget -->
            <?php 
            $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1";
            $resultado = $conn->query($sql);
            $info = $resultado->fetch_assoc();
            ?>
            <!-- small card -->
            <div class="small-box bg-gradient-green elevation-3">
              <div class="inner">
                <h3>$<?php echo $info['ganancias']?></h3>

                <p>Total Venta</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div> <!-- Fin widget -->

        </div><!-- Fin row -->


        <div class="content">
          <div class="content-header text-sm">
            <h1>Regalos</h1>
          </div>
          <div class="row">
          <?php 
            $sql_regalos = "SELECT * FROM regalos";
            $info_regalos = $conn->query($sql_regalos);
            
            while ($regalo = $info_regalos->fetch_assoc()):
              $sql = "SELECT COUNT(regalo) AS regalo FROM registrados WHERE pagado = 1 AND regalo = ";
              $sql .= $regalo['id_regalo'];
              $resultado = $conn->query($sql);
              $info = $resultado->fetch_assoc();
            ?>

            <div class="col-lg-3 col-6"><!-- widget -->

              <!-- small card -->
              <div class="small-box bg-gradient-olive elevation-3">
                <div class="inner">
                  <h3><?php echo $info['regalo']?></h3>
                  <p>Total <?php echo $regalo['nombre_regalo']?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-gift"></i>
                </div>
                <a href="lista-registrados.php" class="small-box-footer">
                  Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>

            </div> <!-- Fin widget -->

            <?php endwhile;?>

          </div><!-- Fin row -->
        </div><!-- Fin content -->


      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include 'templates/footer.php';

?>
