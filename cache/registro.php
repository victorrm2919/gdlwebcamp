

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <script src="https://kit.fontawesome.com/f4439c2413.js" crossorigin="anonymous"></script>  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"> <!-- Normalize -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" /> <!-- mapa Open Source -->

      
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">  <!-- GoogleFonts -->
  <link rel="stylesheet" href="css/main.css">
  <meta name="theme-color" content="#fafafa">
</head>

<body class="registro" >
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header contenedor">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>


        <div class="informacion-evento">
          <div class="evento">
            <p class="fecha"><i class="fas fa-calendar-alt"></i> 10-12 Dic</p>
            <p class="ciudad"><i class="fas fa-map-marker-alt"></i> México, MX</p>
          </div>

          <h1 class="nombre-sitio">SitioConferencias</h1>

          <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
        </div><!-- Evento -->

      </div><!-- Contenido -->
    </div><!-- Hero -->
  </header>

  <div class="barra">
    <div class="contenido-barra contenedor">
      <div class="logo">
       <a href="index.php">
          <h1 class="nombre-sitio">SitioConferencias</h1>
       </a>
      </div>

      <div class="menu-mobile">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div><!-- Cierre Contenido -->
  </div><!-- Cierre Barra -->

<section class="seccion contenedor" id="registroUsuario">
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

              
              <input type="number" id="pase-dia" name="boletos[un_dia][cantidad]" min="0" size="3" placeholder="0" value="">
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
                placeholder="0" value="">
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
              <input type="number" id="pase-dosDias" name="boletos[2dias][cantidad]" min="0" size="3" placeholder="0" value="">
              <input type="hidden" value="45" name="boletos[2dias][precio]">
            </div>
          </div>
        </li>

      </ul><!-- Cierre Lista precios -->

    </div><!-- Final paquetes -->


    <div id="eventos" class="eventos">
      <h3>Elige tus talleres</h3>
      
      <div class="caja">

        <div class="msjSeleccion">
          <p>Selecciona tus boletos para ver más detalles de los eventos</p>
        </div>
        <!-- imprime todos los eventos -->

        
        <div id="viernes" class="contenido-dia">
          <h4>VIERNES, 09/DICIEMBRE/2016</h4>
          <div class="info-cursos">

                        <div>
              <p>Talleres:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="taller_01"
                  value="taller_01">
                <time>10:00</time>
                Responsive Web Design <small>por Rafael Bautista</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_02"
                  value="taller_02">
                <time>12:00</time>
                Flexbox <small>por Shari Herrera</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_03"
                  value="taller_03">
                <time>14:00</time>
                HTML5 y CSS3 <small>por Gregorio Sachez</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_04"
                  value="taller_04">
                <time>17:00</time>
                Drupal <small>por Susana Rivera</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_05"
                  value="taller_05">
                <time>19:00</time>
                WordPress <small>por Harold Garcia</small>
              </label>

                          </div>
                        <div>
              <p>Conferencias:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="conf_01"
                  value="conf_01">
                <time>10:00</time>
                Como ser freelancer <small>por Susan Sanchez</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="conf_02"
                  value="conf_02">
                <time>17:00</time>
                Tecnologías del Futuro <small>por Rafael Bautista</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="conf_03"
                  value="conf_03">
                <time>19:00</time>
                Seguridad en la Web <small>por Shari Herrera</small>
              </label>

                          </div>
                        <div>
              <p>Seminarios:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="sem_01"
                  value="sem_01">
                <time>10:00</time>
                Diseño UI y UX para móviles <small>por Susan Sanchez</small>
              </label>

                          </div>
                        <!-- fin foreach eventos -->
          </div> <!-- info-cursos -->
        </div> <!-- Dia -->
        
        <div id="sábado" class="contenido-dia">
          <h4>SáBADO, 10/DICIEMBRE/2016</h4>
          <div class="info-cursos">

                        <div>
              <p>Talleres:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="taller_06"
                  value="taller_06">
                <time>10:00</time>
                AngularJS <small>por Rafael Bautista</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_07"
                  value="taller_07">
                <time>12:00</time>
                PHP y MySQL <small>por Shari Herrera</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_08"
                  value="taller_08">
                <time>14:00</time>
                JavaScript Avanzado <small>por Gregorio Sachez</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_09"
                  value="taller_09">
                <time>17:00</time>
                SEO en Google <small>por Susana Rivera</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_10"
                  value="taller_10">
                <time>19:00</time>
                De Photoshop a HTML5 y CSS3 <small>por Harold Garcia</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_11"
                  value="taller_11">
                <time>21:00</time>
                PHP Intermedio y Avanzado <small>por Susan Sanchez</small>
              </label>

                          </div>
                        <div>
              <p>Conferencias:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="conf_04"
                  value="conf_04">
                <time>10:00</time>
                Como crear una tienda online que venda millones en pocos días <small>por Susan Sanchez</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="conf_05"
                  value="conf_05">
                <time>17:00</time>
                Los mejores lugares para encontrar trabajo <small>por Rafael Bautista</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="conf_06"
                  value="conf_06">
                <time>19:00</time>
                Pasos para crear un negocio rentable  <small>por Shari Herrera</small>
              </label>

                          </div>
                        <div>
              <p>Seminarios:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="sem_02"
                  value="sem_02">
                <time>10:00</time>
                Aprende a Programar en una mañana <small>por Gregorio Sachez</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="sem_03"
                  value="sem_03">
                <time>17:00</time>
                Diseño UI y UX para móviles <small>por Harold Garcia</small>
              </label>

                          </div>
                        <!-- fin foreach eventos -->
          </div> <!-- info-cursos -->
        </div> <!-- Dia -->
        
        <div id="domingo" class="contenido-dia">
          <h4>DOMINGO, 11/DICIEMBRE/2016</h4>
          <div class="info-cursos">

                        <div>
              <p>Talleres:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="taller_12"
                  value="taller_12">
                <time>10:00</time>
                Laravel <small>por Rafael Bautista</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_13"
                  value="taller_13">
                <time>12:00</time>
                Crea tu propia API <small>por Shari Herrera</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_14"
                  value="taller_14">
                <time>14:00</time>
                JavaScript y jQuery <small>por Gregorio Sachez</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_15"
                  value="taller_15">
                <time>17:00</time>
                Creando Plantillas para WordPress <small>por Susana Rivera</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="taller_16"
                  value="taller_16">
                <time>19:00</time>
                Tiendas Virtuales en Magento <small>por Harold Garcia</small>
              </label>

                          </div>
                        <div>
              <p>Conferencias:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="conf_07"
                  value="conf_07">
                <time>10:00</time>
                Como hacer Marketing en línea <small>por Susan Sanchez</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="conf_08"
                  value="conf_08">
                <time>17:00</time>
                ¿Con que lenguaje debo empezar? <small>por Shari Herrera</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="conf_09"
                  value="conf_09">
                <time>19:00</time>
                Frameworks y librerias Open Source <small>por Gregorio Sachez</small>
              </label>

                          </div>
                        <div>
              <p>Seminarios:</p>
                            <label>
                <input type="checkbox" name="registro[]" id="sem_04"
                  value="sem_04">
                <time>10:00</time>
                Creando una App en Android en una mañana <small>por Susana Rivera</small>
              </label>

                            <label>
                <input type="checkbox" name="registro[]" id="sem_05"
                  value="sem_05">
                <time>17:00</time>
                Creando una App en iOS en una tarde <small>por Rafael Bautista</small>
              </label>

                          </div>
                        <!-- fin foreach eventos -->
          </div> <!-- info-cursos -->
        </div> <!-- Dia -->
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
                            <option value="1">Pulsera</option>
                            <option value="2">Etiquetas</option>
                            <option value="3">Plumas</option>
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
<!-- formulario para registro -->

  </footer>


  <script src="js/vendor/modernizr-3.8.0.min.js"></script>

<!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
  </script>  
<!-- jQuery -->

  <script src="js/plugins.js"></script>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js" integrity="sha256-GCAeRKCXFEtLTZ+gG1SCIrtGkYq1zZjMXkj+XUFNJqo=" crossorigin="anonymous"></script>  <!-- contador -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha256-Ikk5myJowmDQaYVCUD0Wr+vIDkN8hGI58SGWdE671A8=" crossorigin="anonymous"></script>  <!-- cuenta regresiva -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js" integrity="sha256-7sov0P4cWkfKMVHQ/NvnWVqcLSPYrPwxdz+MtZ+ahl8=" crossorigin="anonymous"></script>  <!-- cambios de texto radicales -->
  
    

    <!-- Cotizador -->
  <script src="js/cotizador.js"></script>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>  <!-- waypoints -->

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

