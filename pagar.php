<?php 

if (!isset($_POST['submit'])) {
    exit('Hubo un error');
}

//namespace dirige donde se esta ocupando las clases
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer; 
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;

require  'includes/paypal.php';


if(isset($_POST['submit'])):  //valida que el envio halla sido por un submit
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d H:i:s');  //agrega fecha del dia en el formaro aaaa/m/d hh:mm:ss
    // Pedidos
    $boletos = $_POST['boletos'];
    $numeroBoletos = $boletos;  ///copia para no afectar el de la base
    $pedidoExtra = $_POST['pedido_extra'];
    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $precioCamisas = $_POST['pedido_extra']['camisas']['precio'];
    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
    $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];
    include 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos, $camisas, $etiquetas);   //agrega a variable el valor devielto del json, json boletos y articulos  
    //eventos
    $eventos = $_POST['registro'];
    $registro = eventos_json($eventos);   //json de talleres
     //crea inserccion a base de forma segura (crea, prepara, ejecuta)


    try {
      require 'includes/funciones/bd_conexion.php';  /* archivo requerido, crea conexion */ 
      $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");  //prepare statements, previene inyeccion sql, prepara la conexion para una mas segura
      $stmt->bind_param("ssssssis",$nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);  //iniciales de tipo de valores a ingresar, variables
      $stmt->execute();  //ejecuta todo lo creado
      $id_registro = $stmt->insert_id;
      $stmt->close(); //cierra el statement
      $conn->close(); //cierra conexion   
    //   header('Location: validar_registro.php?exito=1');  //previene que se recarge la pagina y se duplique informacion en la bd, para eso el codigo de insercion debe de estar antes de toda la vista
    } catch (Exception $e) {
       $error = $e->getMessage();  /* mensaje de error */
    }

endif;

//se crea el metodo de compra
$compra = new Payer(); //intanciar payer par poder seguir con los pagos
$compra->setPaymentMethod('paypal');  //llamada a metodo de pago ('tipo de pago')   


//Articulos a cobrar
    // $articulo = new Item();
    // $articulo->setName($producto)  //nombre articulos
    //          ->setCurrency('MXN')  //tipo de moneda
    //          ->setQuantity(1)   //cantidad
    //          ->setPrice($precio);   //costo

$i = 0;
$arreglo_pedido = array();
//craecion de articulos para boletos
foreach ($numeroBoletos as $key => $value) {
    if ((int) $value['cantidad'] > 0) {
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"} ->setName("Pase: " . $key)  //nombre articulos
                        ->setCurrency('USD')  //tipo de moneda
                        ->setQuantity((int) $value['cantidad'])   //cantidad
                        ->setPrice((int) $value['precio']);   //costo
        $i++;
    }
}

//creacion de atriculos para extras (camisas y etiquetas)
foreach ($pedidoExtra as $key => $value) {
    if ((int) $value['cantidad'] > 0) {
        if ($key == 'camisas') {
            //descuento de camisas
            $precio = (float) $value['precio'] * .93;
        }else {
            $precio = (int) $value['precio'];
        }
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"} ->setName("Extras: " . $key)  //nombre articulos
                        ->setCurrency('USD')  //tipo de moneda
                        ->setQuantity((int) $value['cantidad'])   //cantidad
                        ->setPrice($precio);   //costo
        $i++;
    }
}


//se agrega a lista de compra
$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);   //articulos en un array


//montos a pagar
$cantidad = new Amount();
$cantidad->setCurrency('USD')  //tipo de moneda
         ->setTotal($total);  //costo de los articulos

///transaccion
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)  //cantidad de transaccion
            ->setItemList($listaArticulos)  //lista de articulos 
            ->setDescription('Pago GDLWEBCAMP ')   //titulo de la transaccion
            ->setInvoiceNumber($id_registro);    //numero de seguimiento de pago, registro de base de datos de la persona quien paga

//redireccionar informacion

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO."/pagoFinalizado.php?id_pago={$id_registro}")
              ->setCancelUrl(URL_SITIO."/pagoFinalizado.php?id_pago={$id_registro}");


//realiza el pago de todo
$pago = new Payment();
$pago->setIntent('sale')  //Intencion de pago sale = venta
     ->setPayer($compra)  //metodos de compra
     ->setRedirectUrls($redireccionar)   //urls de redireccion
     ->setTransactions(array($transaccion));  //transacciones en array por si sin varias


try {
    $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
    echo '<pre>';print_r(json_decode($pce->getData()));
    exit;
}

$aprobado = $pago->getApprovalLink();

header("Location: {$aprobado}");
