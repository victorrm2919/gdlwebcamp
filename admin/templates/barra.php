<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item dropdown user-menu">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span>Hola: <?php echo $_SESSION['nombre'] ?></span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-footer">
              <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="ajustes" data-id="<?php echo $_SESSION['id'] ?>">Ajustes</button>
              <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="cerrar-sesion">Cerrar Sesión</button>
          </div>
        </div>

      </li>

    </ul>
  </nav>
  <!-- /.navbar -->
