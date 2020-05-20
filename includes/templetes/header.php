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
  <link rel="stylesheet" href="css/normalize.css"> <!-- Normalize -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" /> <!-- mapa Open Source -->

  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace('.php', '', $archivo);

    if ($pagina === 'invitados' || $pagina === 'index') {
      echo '<link rel="stylesheet" href="css/colorbox.css"> <!-- galeria con texto colorbox  -->';
    } else if ($pagina === 'conferencia') {
      echo '<link rel="stylesheet" href="css/lightbox.css"> <!-- galeria Lightbox  -->';
    } 
  ?>
    
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">  <!-- GoogleFonts -->
  <link rel="stylesheet" href="css/main.css">
  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina?>" >
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
