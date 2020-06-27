<?php 
$pagina = obtenerPaginaActual();

if($pagina !== 'login') {
include 'functions/sesiones.php';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Sitio Conferencias</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/f4439c2413.js" crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.css"/>
  <!-- DatePicker -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!-- TempusDominus (timepicker) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <!-- FontAwesome picker -->
  <link rel="stylesheet" href="css/fontawesome-iconpicker.css">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
  <!-- Chart JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Estilos Propios -->
  <link rel="stylesheet" href="css/main.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<?php 
$pagina = obtenerPaginaActual();

if ($pagina === 'login') {
  echo '<body class="hold-transition login-page">';
} else {
  echo '<body class="hold-transition sidebar-mini layout-navbar-fixed">';
}
?>



