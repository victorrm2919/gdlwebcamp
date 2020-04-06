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

            <nav class="navegacion-evento">
              <a href="#talleres"><i class="fas fa-code"></i> Talleres</a>
              <a href="#conferencias"><i class="fas fa-comments"></i> Conferencias</a>
              <a href="#seminarios"><i class="fas fa-university"></i> Seminarios</a>
            </nav>

            <div id="talleres" class="info-curso ocultar clearfix">
              <div class="detalle-evento">
                <h3>HTML5, CSS3 y JavaScript</h3>
                <p><i class="fas fa-clock"></i> 16:00 hrs</p>
                <p><i class="fas fa-calendar-alt"></i> 10 de Diciembre</p>
                <p><i class="fas fa-user"></i> Victor Manuel Ruiz</p>
              </div>

              <div class="detalle-evento">
                <h3>Responsive Web Desing</h3>
                <p><i class="fas fa-clock"></i> 19:00 hrs</p>
                <p><i class="fas fa-calendar-alt"></i> 10 de Diciembre</p>
                <p><i class="fas fa-user"></i> Victor Manuel Ruiz</p>
              </div>

              <a href="#" class="btn right">Ver todos</a>

            </div> <!-- Cierre info curso -->


            <div id="conferencias" class="info-curso ocultar clearfix">
              <div class="detalle-evento">
                <h3>Como ser Freelancer</h3>
                <p><i class="fas fa-clock"></i> 10:00 hrs</p>
                <p><i class="fas fa-calendar-alt"></i> 10 de Diciembre</p>
                <p><i class="fas fa-user"></i> Victor Manuel Ruiz</p>
              </div>

              <div class="detalle-evento">
                <h3>Tecnologías del Futuro</h3>
                <p><i class="fas fa-clock"></i> 17:00 hrs</p>
                <p><i class="fas fa-calendar-alt"></i> 10 de Diciembre</p>
                <p><i class="fas fa-user"></i> Victor Manuel Ruiz</p>
              </div>

              <a href="#" class="btn right">Ver todos</a>

            </div> <!-- Cierre info curso -->


            <div id="seminarios" class="info-curso ocultar clearfix">
              <div class="detalle-evento">
                <h3>Diseño UI/UX para moviles</h3>
                <p><i class="fas fa-clock"></i> 17:00 hrs</p>
                <p><i class="fas fa-calendar-alt"></i> 10 de Diciembre</p>
                <p><i class="fas fa-user"></i> Victor Manuel Ruiz</p>
              </div>

              <div class="detalle-evento">
                <h3>Aprende a programar en una mañana</h3>
                <p><i class="fas fa-clock"></i> 19:00 hrs</p>
                <p><i class="fas fa-calendar-alt"></i> 10 de Diciembre</p>
                <p><i class="fas fa-user"></i> Victor Manuel Ruiz</p>
              </div>

              <a href="#" class="btn right">Ver todos</a>

            </div> <!-- Cierre info curso -->


          </div> <!-- Cierre programa evento -->
        </div> <!-- Cierre contenedor -->
      </div> <!-- Cierre contenido-programa -->
    </section><!-- Cierre programa -->

    <?php include_once 'includes/templetes/invitados.php'; ?>

  </main>

  <div class="contador parallax">
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
            <a href="#" class="btn hollow">Comprar</a>
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
            <a href="#" class="btn">Comprar</a>
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
            <a href="#" class="btn hollow">Comprar</a>
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
        <a href="#" class="btn transparent">Registro</a>
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