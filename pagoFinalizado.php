<?php include 'includes/templetes/header.php';

//asegurar que el pago se realizo
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;

require 'includes/paypal.php'

?>

<section class="seccion contenedor">
  <h2>Resumen Registro</h2>

  <?php 
    $paymentId = $_GET['paymentId'];
    $id_pago = (int) $_GET['id_pago'];
    $pagado = 1;

    //validacion de pago
    
    //peticion de REST API

    $pago = Payment::get($paymentId, $apiContext); //en numero de payment y la api
    $execution = new PaymentExecution();  //llama la calse para validar pago
    $execution->setPayerId($_GET['PayerID']);  //envia peticion del pago

    $resultado = $pago->execute($execution, $apiContext);   //ejecuta la solicitud

    $repuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

    if($repuesta === 'completed') {
      echo '<div class="resultado correcto">';
      echo 'El pago se realizo correctamente <br> El id es: ' . $paymentId;
      echo '</div>';

      //cambio de estatus de pago 
      require 'includes/funciones/bd_conexion.php'; 
      $stmt = $conn->prepare("UPDATE registrados SET pagado = ?  WHERE id_registrado = ?");
      $stmt->bind_param('ii', $pagado, $id_pago);
      $stmt->execute();
      $stmt->close();
      $conn->close();
    }else {
      echo '<div class="resultado error">';
      echo 'El pago no se realizo';
      echo '</div>';
    }          
  ?>
</section>

<?php include 'includes/templetes/footer.php'; ?>
