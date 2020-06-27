<?php 
include 'functions/funciones.php';

if (!isset($_POST['registro'])) {
    die(header('Location: error.php'));
}


if ($_POST['registro'] == 'nuevo') {

    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $boletos = $_POST['boletos'];
    $camisas = $_POST['pedido_extra']['camisas'];
    $etiquetas = $_POST['pedido_extra']['etiquetas'];
    $talleres = $_POST['registro_evento'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $pedido = productos_json($boletos, $camisas, $etiquetas);
    $eventos = eventos_json($talleres);
    

    try {

        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, 1)");
        $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $eventos, $regalo, $total);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Usuario',
                'registro' => 'Nuevo'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Usuario',
                'registro' => 'Nuevo'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error.." . $e->getMessage();
    }

    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {

    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $boletos = $_POST['boletos'];
    $camisas = $_POST['pedido_extra']['camisas'];
    $etiquetas = $_POST['pedido_extra']['etiquetas'];
    $talleres = $_POST['registro_evento'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $pedido = productos_json($boletos, $camisas, $etiquetas);
    $eventos = eventos_json($talleres);

    try {
        $id = $_POST['id_registro'];
            
        $stmt = $conn->prepare("UPDATE registrados SET nombre_registrado = ?, apellido_registrado = ?, email_registrado = ?, fecha_registro = ?, pases_articulos = ?, talleres_registrados = ?, regalo = ?, total_pagado = ?, pagado = 1, editado = NOW() WHERE id_registrado = ?");
        $stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $_POST['fecha_registro'], $pedido, $eventos, $regalo, $total, $id);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Usuario',
                'registro' => 'Actualizar'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Usuario',
                'registro' => 'Actualizar'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error.." . $e->getMessage();
    }
    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'eliminar'){
    $id = $_POST['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM registrados WHERE id_registrado = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'id' => $id,
                'tipo' => 'Usuario',
                'registro' => 'Eliminar'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Usuario',
                'registro' => 'Eliminar'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error.." . $e->getMessage();
    }
    die(json_encode($respuesta));
}


