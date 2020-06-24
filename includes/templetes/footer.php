<footer class="site-footer">
    <div class="contenedor contenido-footer">

      <div class="footer-nosotros">
        <h3 class="titulo">Sobre <span>SitioConferencias</span></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nulla veniam amet. Consequatur eligendi voluptates expedita molestias? Facilis a beatae blanditiis voluptatibus ex dolore enim?</p>
      </div>

      <div class="ultimos-tweets">
        <h3 class="titulo">Últimos <span>Tweets</span></h3>
        <a class="twitter-timeline" data-height="400" href="https://twitter.com/VctorRu07789965?ref_src=twsrc%5Etfw">Tweets by VctorRu07789965</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
      
<!-- formulario para registro -->
              <!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
          #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
          /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>

        <div style="display:none">
          <div id="mc_embed_signup">
          <form action="https://gmail.us19.list-manage.com/subscribe/post?u=673b58cbae987fd88d41d7859&amp;id=a36d6842bb" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
            <h2>Suscribete y no te pierdas ningún detalle</h2>
          <div class="indicates-required"><span class="asterisk">*</span> es requerido</div>
          <div class="mc-field-group">
            <label for="mce-EMAIL">Correo Electronico  <span class="asterisk">*</span>
          </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
          </div>
            <div id="mce-responses" class="clear">
              <div class="response" id="mce-error-response" style="display:none"></div>
              <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_673b58cbae987fd88d41d7859_a36d6842bb" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
              </div>
          </form>
          </div>
          <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
          <!--End mc_embed_signup-->
        </div>

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
  <script src="js/cotizador.js"></script>  <!-- cotizador -->

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
