<footer class="site-footer">
    <div class="contenedor contenido-footer">

      <div class="footer-nosotros">
        <h3 class="titulo">Sobre <span>SitioConferencias</span></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nulla veniam amet. Consequatur eligendi voluptates expedita molestias? Facilis a beatae blanditiis voluptatibus ex dolore enim?</p>
      </div>

      <div class="ultimos-tweets">
        <h3 class="titulo">Últimos <span>Tweets</span></h3>
        <ul>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, omnis.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, omnis.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, omnis.</li>
        </ul>
      </div>

      <div class="navegacion-footer">
        <h3 class="titulo">Redes <span>Sociales</span></h3>

        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>

      </div>
    </div>

      <p class="copyright" >Todos los Derechos Reservados SitiosConferencias 2020 &copy</p>
      
  </footer>


  <script src="js/vendor/modernizr-3.8.0.min.js"></script>

<!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
  </script>  <!-- jQuery -->

  <script src="js/plugins.js"></script>

  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace('.php', '', $archivo);

    if ($pagina === 'invitados' || $pagina === 'index') {
      echo '<script src="js/jquery.colorbox-min.js"></script>  <!-- galeria con texto colorbox -->';
    } else if ($pagina === 'conferencia') {
      echo '<script src="js/lightbox.js"></script>  <!-- galeria lightbox -->';
    }
  ?>

  <script src="js/jquery.animateNumber.min.js"></script>  <!-- contador -->
  <script src="js/jquery.countdown.min.js"></script>  <!-- cuenta regresiva -->
  <script src="js/jquery.lettering.js"></script>  <!-- cambios de texto radicales -->
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>  <!-- mapa -->

  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () {
      ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')

  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
