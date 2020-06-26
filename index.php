<?php include_once 'includes/templetes/header.php'; ?>

  <main>
    <section class="seccion contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>Ut enim dolor, venenatis eu iaculis sit amet, tempus ut odio. Curabitur convallis nisl quis arcu pretium, nec imperdiet velit maximus. Quisque augue lorem, auctor id efficitur et, elementum at arcu. Aliquam et semper tortor, ac blandit felis. In hac habitasse platea dictumst.</p>
    </section>

    <section class="programa">
      <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg">
          <source src="video/video.mp4" type="video/mp4">
          <source src="video/video.webm" type="video/webm">
          <source src="video/video.ogv" type="video/ogv">
        </video>
      </div>
      <!--Cierre contenedor video-->


      

      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del Evento</h2>

              <?php 
              try {
                require_once 'includes/funciones/bd_conexion.php';  /* archivo requerido, crea conexion */ 
                $sql = "SELECT * FROM categoria_evento";
               
                $resultado = $conn->query($sql);  /* consulta a base de datos */
              } catch (Exception $e) {
                  $error = $e->getMessage();  /* mensaje de error */
              }?>

            <nav class="navegacion-evento">
                <?php while ($cat = $resultado->fetch_assoc()) {
                  $categoria = $cat['cat_evento'];
                  $cat_icono = $cat['icono']; ?>
                  <a href="#<?php echo strtolower($categoria)?>"><i class="<?php echo $cat_icono?>"></i><?php echo $categoria?> </a>
                <?php }?>
            </nav>

<!-- multiconsulta de MYSQL -->
            <?php 
            try {
              require_once 'includes/funciones/bd_conexion.php';  /* archivo requerido, crea conexion */ 
              $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
              $sql .= "FROM eventos ";
              $sql .= "INNER JOIN categoria_evento ";
              $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql .= "INNER JOIN invitados ";
              $sql .= "ON eventos.id_inv = invitados.invitado_id ";
              $sql .= "AND eventos.id_cat_evento = 1 ";
              $sql .= "ORDER By evento_id LIMIT 2; ";
              $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
              $sql .= "FROM eventos ";
              $sql .= "INNER JOIN categoria_evento ";
              $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql .= "INNER JOIN invitados ";
              $sql .= "ON eventos.id_inv = invitados.invitado_id ";
              $sql .= "AND eventos.id_cat_evento = 2 ";
              $sql .= "ORDER By evento_id LIMIT 2; ";
              $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
              $sql .= "FROM eventos ";
              $sql .= "INNER JOIN categoria_evento ";
              $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql .= "INNER JOIN invitados ";
              $sql .= "ON eventos.id_inv = invitados.invitado_id ";
              $sql .= "AND eventos.id_cat_evento = 3 ";
              $sql .= "ORDER By evento_id LIMIT 2; ";
            } catch (Exception $e) {
                $error = $e->getMessage();  /* mensaje de error */
            }
            ?>

            <?php  $conn->multi_query($sql); ?> <!-- multiquery -->

            <?php do {
              $resultado = $conn->store_result();
              $row = $resultado->fetch_all(MYSQLI_ASSOC);   ?>

              <?php $i = 0;?>
              <?php foreach ($row as $evento): ?>
                <?php if ($i % 2 == 0): ?>
                  <div id="<?php echo strtolower($evento['cat_evento'])?>" class="info-curso ocultar clearfix">
                <?php endif;?>

                    <div class="detalle-evento">
                      <h3><?php echo $evento['nombre_evento']?> </h3>
                      <p><i class="fas fa-clock"></i> <?php echo $evento['hora_evento']?> </p>
                      <p><i class="fas fa-calendar-alt"></i> <?php echo $evento['fecha_evento']?></p>
                      <p><i class="fas fa-user"></i> <?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado']?></p>
                    </div>

                <?php if($i % 2 == 1): ?>
                  <a href="calendario.php" class="btn right">Ver todos</a>
                  </div> <!-- Cierre info curso -->
                <?php endif;?>
            
              <?php $i++; ?>
              <?php endforeach; ?>
              <?php $resultado->free();?>
            <?php } while ($conn->more_results() && $conn->next_result());?>


            
          </div> <!-- Cierre programa evento -->
        </div> <!-- Cierre contenedor -->
      </div> <!-- Cierre contenido-programa -->
    </section><!-- Cierre programa -->

    <?php include_once 'includes/templetes/invitados.php'; ?>

  </main>

  <div class="contador parallax" id='animacionNumeros'>
    <div class="contenedor">
      <ul class="resumen-evento">
        <li><p class="numero"></p> Invitados</li>
        <li><p class="numero"></p> Talleres</li>
        <li><p class="numero"></p> Días</li>
        <li><p class="numero"></p> Conferencias</li>
      </ul><!-- Cierre resumen-evento -->
    </div><!-- cierre contenedor -->
  </div><!-- cierre contador -->

  <section class="precios seccion">
    <h2>Precios</h2>

    <div class="contenedor">
      <ul class="lista-precios">
        <li>
          <div class="tabla-precio">
            <h3>Pase por Día</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las Conferencias</li>
              <li>Todos los Talleres</li>
            </ul>
            <a href="registro.php?paseUndia=1" class="btn hollow">Comprar</a>
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
            <a href="registro.php?paseCompleto=1" class="btn">Comprar</a>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 Días</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las Conferencias</li>
              <li>Todos los Talleres</li>
            </ul>
            <a href="registro.php?pase2dias=1" class="btn hollow">Comprar</a>
          </div>
        </li>

      </ul><!-- Cierre Lista precios -->
    </div><!-- Cierre contenedor -->
  </section> <!-- Cierre precios -->


  <div id="mapa" class="mapa"></div>   <!-- API (Google Maps) Leaflet -->

  <section class="seccion">
    <h2>Testimoniales</h2>

    <div class="testimoniales contenedor">
      <div class="testimonial">
        <blockquote>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quae architecto error libero ad mollitia modi quaerat vero sint cupiditate praesentium velit minus quasi. Aut ipsam explicabo commodi! Sapiente, sunt?</p>

          <footer class="footer-blockquote">
            <img src="img/testimonial.jpg" alt="testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!-- Testimonio -->

      <div class="testimonial">
        <blockquote>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quae architecto error libero ad mollitia modi quaerat vero sint cupiditate praesentium velit minus quasi. Aut ipsam explicabo commodi! Sapiente, sunt?</p>

          <footer class="footer-blockquote">
            <img src="img/testimonial.jpg" alt="testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!-- Testimonio -->

      <div class="testimonial">
        <blockquote>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quae architecto error libero ad mollitia modi quaerat vero sint cupiditate praesentium velit minus quasi. Aut ipsam explicabo commodi! Sapiente, sunt?</p>

          <footer class="footer-blockquote">
            <img src="img/testimonial.jpg" alt="testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!-- Testimonio -->

    </div><!-- Cierre Testimoniales -->
  </section> <!-- Cierre Seccion Testimonial -->

  <div class="newsletter parallax">
    <div class="contenido-newsletter contenedor">
        <p>Registrate al Newsletter:</p>
        <h3>SitioConferencias</h3>
        <a href="#mc_embed_signup" class="newlestter-info btn transparent" id="btnNewlestter">Registro</a>
    </div><!-- Contenido -->
  </div><!-- Newsletter -->


  <section class="seccion">
      <h2>Faltan</h2>

      <div class="contenedor">
        <ul class="cuenta-regresiva">
          <li><p id='dias' class="numero"></p> Días</li>
          <li><p id='horas' class="numero"></p> Horas</li>
          <li><p id='minutos' class="numero"></p> Minutos</li>
          <li><p id='segundos' class="numero"></p> Segundos</li>
        </ul><!-- Cierre cuenta-regresiva -->
      </div>
  </section><!-- cierre cuenta -->

<?php include_once 'includes/templetes/footer.php';?>