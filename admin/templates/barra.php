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
        <a href="index.php" class="nav-link">Inicio</a>
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

<li class="nav-item">
  <a class="nav-link" id="ajustes" data-id="<?php echo $_SESSION['id'] ?>" href="#">
    <i class="fas fa-user-cog"></i>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link" id="cerrar-sesion" href="#">
    <i class="fas fa-sign-out-alt"></i>
  </a>
</li>



</ul>
  </nav>
  <!-- /.navbar -->
