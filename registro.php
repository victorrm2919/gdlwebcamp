<?php include_once 'includes/templetes/header.php'; ?>

<section class="seccion contenedor">
  <h2>Registro de Usuarios</h2>


  <form action="pagar.php" id="registro" class="registro" method="post">
    <div id="datos-usuario" class="registro caja info">
      <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" required>
      </div>

      <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" required>
      </div>

      <div class="campo">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" placeholder="Tu Correo Electronico" required>
      </div>

      <div id="error"></div>

    </div><!-- Final datos usuario -->

    <div id="paquetes" class="paquetes">
      <h3>Elije el número de boletos</h3>

      <ul class="lista-precios">
        <li>
          <div class="tabla-precio">
            <h3>Pase por Día (Viernes)</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las Conferencias</li>
              <li>Todos los Talleres</li>
            </ul>
            <div class="orden">
              <label for="pase-dia">Boletos deseados: </label>
              <input type="number" id="pase-dia" name="boletos[un_dia][cantidad]" min="0" size="3" placeholder="0">
              <input type="hidden" value="30" name="boletos[un_dia][precio]">
            </div>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Todos los Días</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las Conferencias</li>
              <li>Todos los Talleres</li>
            </ul>
            <div class="orden">
              <label for="pase-completo">Boletos deseados: </label>
              <input type="number" id="pase-completo" name="boletos[completo][cantidad]" min="0" size="3"
                placeholder="0">
              <input type="hidden" value="50" name="boletos[completo][precio]">
            </div>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 Días (Viernes y Sábado)</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las Conferencias</li>
              <li>Todos los Talleres</li>
            </ul>
            <div class="orden">
              <label for="pase-dosDias">Boletos deseados: </label>
              <input type="number" id="pase-dosDias" name="boletos[2dias][cantidad]" min="0" size="3" placeholder="0">
              <input type="hidden" value="45" name="boletos[2dias][precio]">
            </div>
          </div>
        </li>

      </ul><!-- Cierre Lista precios -->

    </div><!-- Final paquetes -->


    <div id="eventos" class="eventos">
      <h3>Elige tus talleres</h3>
      <?php
        require_once 'includes/funciones/bd_conexion.php';
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

      <div class="caja">

        <div class="msjSeleccion">
          <p>Selecciona tus boletos para ver más detalles de los eventos</p>
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

        <div id="<?php echo $nombre_dia?>" class="contenido-dia">
          <h4><?php echo strtoupper($titulo_fecha)?></h4>
          <div class="info-cursos">

            <?php foreach ($lista_eventos as $categoria => $info) {?>
            <div>
              <p><?php echo $categoria?>:</p>
              <?php foreach ($info as $valor) {?>
              <label>
                <input type="checkbox" name="registro[]" id="<?php echo $valor['clave']?>"
                  value="<?php echo $valor['clave']?>">
                <time><?php echo date('H:i', strtotime($valor['hora'])) ?></time>
                <?php echo $valor['titulo']?> <small>por <?php echo $valor['invitado']?></small>
              </label>

              <?php }?>
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

    <div id="resumen" class="resumen">
      <h3>Pagos y Extras</h3>
      <div class="caja resumen-contenido">
        <div class="extras">
          <div class="orden">
            <label for="camisa-evento">Camisa del evento $10 <small>(Promocion 7% dto.)</small></label>
            <input type="number" min="0" id="camisa-evento" name="pedido_extra[camisas][cantidad]" size="3"
              placeholder="0">
            <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
          </div><!-- orden -->

          <div class="orden">
            <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Angular, React,
                Chrome)</small></label>
            <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3"
              placeholder="0">
            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
          </div><!-- orden -->

          <div class="orden">
            <label for="regalo">Selecciona un Regalo</label>
            <select id="regalo" name="regalo" required>
              <option value="" selected disabled hidden>-- Seleccione un regalo --</option>
              <?php 
              $sql = "SELECT * FROM regalos";
              $resultado = $conn->query($sql);

              while ($regalo = $resultado->fetch_assoc()):?>
              <option value="<?php echo $regalo['id_regalo']?>"><?php echo $regalo['nombre_regalo']?></option>
              <?php endwhile;?>
            </select>
          </div>

          <input type="button" id="calcular" class="btn" value="Calcular">

        </div><!-- extras -->

        <div class="total">
          <p>Resumen:</p>

          <ul id="lista-producto"></ul>

          <p>Total:</p>

          <div id="suma-total"></div>

          <input type="hidden" name="total_pedido" id="total_pedido">
          <input type="submit" name="submit" class="btn" id="btnRegistro" value="Pagar">

        </div><!-- total -->
      </div> <!-- caja -->
    </div><!-- resumen -->


  </form>
</section>

<?php include_once 'includes/templetes/footer.php'; ?>
