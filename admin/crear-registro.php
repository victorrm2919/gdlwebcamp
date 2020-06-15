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
          <h1>Creacion de Registros</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="row">
    <div class="col-xl-9 m-xl-auto m-3">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Crear Registro</h3>
          </div>
          <form class="form-horizontal text-center crear-registro-usuario" name="crear-registro" id="guardar-registro"
            method="post" action="modelo-registrado.php">
            <div class="card-body">
              <div class="validacion">
                <div class="form-group row justify-content-center">
                  <label for="nombre" class="col-sm-3 col-md-3 col-form-label">Nombre:</label>
                  <div class="col-sm-9 col-md-6 input-group">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre del Registrado" name="nombre"
                      required autocomplete="off">
                  </div>
                </div>
                <div class="form-group row justify-content-center">
                  <label for="apellido" class="col-sm-3 col-md-3 col-form-label">Apellido:</label>
                  <div class="col-sm-9 col-md-6 input-group">
                    <input type="text" class="form-control" id="apellido" placeholder="Apellido del Registrado"
                      name="apellido" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group row justify-content-center">
                  <label for="email" class="col-sm-3 col-md-3 col-form-label">Correo Electronico:</label>
                  <div class="col-sm-9 col-md-6 input-group">
                    <input type="email" class="form-control" id="email" placeholder="Correo Electronico" name="email"
                      required autocomplete="off">
                  </div>
                </div>
                <div id="validacionInfo" class="alert alert-default-danger col-md-7 my-4 mx-auto"></div>
              </div>
              <div class="form-group">
                <div id="paquetes" class="paquetes card elevation-2">
                  <div class="card-header">
                    <h3 class="card-title">Elije el número de boletos</h3>
                  </div>

                  <div class="card-body">
                    <ul class="lista-precios row">
                      <li class="col-md-4 mt-md-0 mt-2">
                        <div class="tabla-precio card elevation-1">
                          <div class="card-body d-flex flex-column justify-content-around">
                            <h3>Pase por Día (Viernes)</h3>
                            <p class="numero">$30</p>
                            <ul>
                              <li>Bocadillos Gratis</li>
                              <li>Todas las Conferencias</li>
                              <li>Todos los Talleres</li>
                            </ul>
                            <div class="orden">
                              <label for="pase-dia" class="col-form-label">Boletos deseados: </label>
                              <input type="number" id="pase-dia" name="boletos[un_dia][cantidad]" min="0" size="3"
                                placeholder="0" class="form-control text-center">
                              <input type="hidden" value="30" name="boletos[un_dia][precio]">
                            </div>
                          </div>
                        </div>
                      </li>

                      <li class="col-md-4 mt-md-0 mt-2">
                        <div class="tabla-precio card elevation-1">
                          <div class="card-body d-flex flex-column justify-content-around">
                            <h3>Todos los Días</h3>
                            <p class="numero">$50</p>
                            <ul>
                              <li>Bocadillos Gratis</li>
                              <li>Todas las Conferencias</li>
                              <li>Todos los Talleres</li>
                            </ul>
                            <div class="orden">
                              <label for="pase-completo" class="col-form-label">Boletos deseados: </label>
                              <input type="number" id="pase-completo" name="boletos[completo][cantidad]" min="0"
                                size="3" placeholder="0" class="form-control text-center">
                              <input type="hidden" value="50" name="boletos[completo][precio]">
                            </div>
                          </div>
                        </div>
                      </li>

                      <li class="col-md-4 mt-md-0 mt-2">
                        <div class="tabla-precio card elevation-1">
                          <div class="card-body d-flex flex-column justify-content-around">
                            <h3>Pase por 2 Días (Viernes y Sábado)</h3>
                            <p class="numero">$45</p>
                            <ul>
                              <li>Bocadillos Gratis</li>
                              <li>Todas las Conferencias</li>
                              <li>Todos los Talleres</li>
                            </ul>
                            <div class="orden">
                              <label for="pase-dosDias" class="col-form-label">Boletos deseados: </label>
                              <input type="number" id="pase-dosDias" name="boletos[2dias][cantidad]" min="0" size="3"
                                placeholder="0" class="form-control text-center">
                              <input type="hidden" value="45" name="boletos[2dias][precio]">
                            </div>
                          </div>
                        </div>
                      </li>

                    </ul><!-- Cierre Lista precios -->
                  </div>


                </div><!-- Final paquetes -->
              </div><!-- Final form-group -->

              <div class="form-group">
                <div id="eventos" class="eventos card elevation-2">
                  <div class="card-header">
                    <h3 class="card-title">Elije los talleres</h3>
                  </div>
                  <?php
                    try {
                    $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado, clave ";
                    $sql .= "FROM eventos ";
                    $sql .= "INNER JOIN categoria_evento ";
                    $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= "INNER JOIN invitados ";
                    $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= "ORDER By hora_evento, evento_id, clave";
                    $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                    echo $e->getMessage();
                    }

                    $dias = array();

                    while ($eventos = $resultado->fetch_assoc()) /* imprime resultados) el resultado de fetch_assoc se guarda en eventos como array*/ { 
                    $fecha = $eventos['fecha_evento'];  /* Var para agrupar */
                    $categorias = $eventos['cat_evento'];
                        $evento = array(  /* crea arreglo personalizado */
                        'titulo' => $eventos['nombre_evento'],
                        'fecha' => $eventos['fecha_evento'],
                        'hora' => $eventos['hora_evento'],
                        'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado'],
                        'clave' => $eventos['clave']
                        );

                    $dias[$fecha][$categorias][] = $evento;  /* se crea un segundo nivel para poder agrupar se indexa la fecha en el primer nivel */
                    } //while fetch_assoc
                    ?>

                  <div class="caja card-body">
                    <div class="msjSeleccion text-muted">
                      <span>Selecciona tus boletos para ver más detalles de los eventos</span>
                    </div>
                    <!-- imprime todos los eventos -->

                    <?php 
                        foreach ($dias as $dia => $lista_eventos) {
                            //formateo de fecha Windows
                            setlocale(LC_TIME, 'spanish');  //WINDOWS
                            setlocale(LC_TIME, 'es-ES.UTF-8');  //UNIX
                                    
                            $titulo_fecha =  strftime('%A, %d/%B/%Y', strtotime($dia)); 
                            $nombre_dia = strftime('%A', strtotime($dia));
                        ?>

                    <div id="<?php echo $nombre_dia?>" class="contenido-dia card elevation-1">
                      <h4><?php echo strtoupper($titulo_fecha)?></h4>
                      <div class="info-cursos row text-left card-body">
                        <?php foreach ($lista_eventos as $categoria => $info) {?>
                        <div class="col-md-4">
                          <div class="m-2 ml-md-1 card card-body">
                            <p><?php echo $categoria?>:</p>
                            <?php foreach ($info as $valor) {?>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="registro_evento[]" id="<?php echo $valor['clave']?>"
                                value="<?php echo $valor['clave']?>" class="custom-control-input">
                              <label class="custom-control-label" for="<?php echo $valor['clave']?>">
                                <time><?php echo date('H:i', strtotime($valor['hora'])) ?></time>
                                <?php echo $valor['titulo']?> <small>por <?php echo $valor['invitado']?></small>
                              </label>
                            </div>

                            <?php }?>
                          </div>
                        </div>
                        <?php }?>
                          <!-- fin foreach eventos -->

                      </div> <!-- info-cursos -->
                    </div> <!-- Dia -->
                    <?php } ?>
                    <!-- fin foreach dias -->
                  </div>
                  <!--.caja-->
                </div>
                <!--#eventos-->
                <div id="resumen" class="resumen card elevation-2">
                  <div class="card-header">
                    <h3 class="card-title">Pagos y Extras</h3>
                  </div>
                  <div class="caja resumen-contenido row card-body">
                    <div class="extras col-md-6">
                      <div class="orden form-group row">
                        <label for="camisa-evento" class="col-form-label col-md-10">Camisa del evento $10
                          <small>(Promocion 7% dto.)</small></label>
                        <input type="number" min="0" id="camisa-evento" name="pedido_extra[camisas][cantidad]" size="3"
                          placeholder="0" class="form-control col-md-2 text-center">
                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                      </div><!-- orden -->

                      <div class="orden form-group row">
                        <label for="etiquetas" class="col-form-label col-md-10">Paquete de 10 etiquetas $2
                          <small>(HTML5, CSS3, JavaScript, Angular,
                            React,
                            Chrome)</small></label>
                        <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3"
                          placeholder="0" class="form-control col-md-2 text-center">
                        <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                      </div><!-- orden -->

                     <div class="orden">
                       <div class="form-group row">
                         <label for="regalo" class="col-form-label-md col-md-3">Regalo</label>
                         <select id="regalo" name="regalo" required class="form-control select col-md-9">
                           <option></option>
                           <?php 
                            $sql = "SELECT * FROM regalos";
                            $resultado = $conn->query($sql);

                            while ($regalo = $resultado->fetch_assoc()):?>
                           <option value="<?php echo $regalo['id_regalo']?>"><?php echo $regalo['nombre_regalo']?>
                           </option>
                           <?php endwhile;?>

                         </select>
                       </div>
                     </div>

                      <input type="button" id="calcular" class="btn btn-success mt-3" value="Calcular">

                    </div><!-- extras -->

                    <div class="total col-md-6 products-list">
                      <p>Resumen:</p>

                      <ul id="lista-producto" class="product-description"></ul>

                      <p>Total:</p>

                      <div id="suma-total"></div>

                      <input type="hidden" name="total_pedido" id="total_pedido">

                    </div><!-- total -->
                  </div> <!-- caja -->
                </div><!-- resumen -->
              </div><!-- Final form-group -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
              <input type="hidden" name="registro" value="nuevo">
              <button type="submit" class="btn btn-primary" id="btnRegistro">Añadir</button>
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
