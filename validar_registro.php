<?php if(isset($_POST['submit'])){  //valida que el envio halla sido por un submit
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d H:i:s');  //agrega fecha del dia en el formaro aaaa/m/d hh:mm:ss
    // Pedidos
    $boletos = $_POST['boletos'];
    $camisas = $_POST['pedido_camisas'];
    $etiquetas = $_POST['pedido_etiquetas'];
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos, $camisas, $etiquetas);   //agrega a variable el valor devielto del json, json boletos y articulos  
    //eventos
    $eventos = $_POST['registro'];
    $registro = eventos_json($eventos);   //json de talleres
     //crea inserccion a base de forma segura (crea, prepara, ejecuta)
     try {
      require_once 'includes/funciones/bd_conexion.php';  /* archivo requerido, crea conexion */ 
      $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");  //prepare statements, previene inyeccion sql, prepara la conexion para una mas segura
      $stmt->bind_param("ssssssis",$nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);  //iniciales de tipo de valores a ingresar, variables
      $stmt->execute();  //ejecuta todo lo creado
      $stmt->close(); //cierra el statement
      $conn->close(); //cierra conexion   
      header('Location: validar_registro.php?exito=1');  //previene que se recarge la pagina y se duplique informacion en la bd, para eso el codigo de insercion debe de estar antes de toda la vista
    } catch (Exception $e) {
       $error = $e->getMessage();  /* mensaje de error */
    }
  }?>


<?php include_once 'includes/templetes/header.php'; ?>

<section class="seccion contenedor">
  <h2>Resumen Registro</h2>
 
  <?php if(isset($_GET['exito'])):
    if($_GET['exito'] == 1) {
      echo 'Registro Exitoso';
    }
  endif;?>
</section>

<?php include_once 'includes/templetes/footer.php'; ?>