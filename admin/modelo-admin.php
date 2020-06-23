<?php 
include 'functions/funciones.php';


if ($_POST['registro'] == 'nuevo') {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $pass = $_POST['password'];
    $opciones = array('costo' => 12);
    $password = password_hash($pass, PASSWORD_BCRYPT, $opciones);

    try {

        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $nombre, $password);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Administrador',
                'registro' => 'Nuevo'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Administrador',
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
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $pass = $_POST['password'];
    try {
        $id = $_POST['id_registro'];
            
        if(!empty($pass)) {
            //si se envia actualizacion de pasword
            $opciones = array('costo' => 12);
            $password = password_hash($pass, PASSWORD_BCRYPT, $opciones);
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW() WHERE id = ?");
            $stmt->bind_param("sssi", $usuario, $nombre, $password, $id);
        } else {
            //sin actualizacion de password
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id = ?");
            $stmt->bind_param("ssi", $usuario, $nombre, $id);
        }
        
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'nivel' => $_POST['nivel'],
                'tipo' => 'Administrador',
                'registro' => 'Actualizar'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Administrador',
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
        $stmt = $conn->prepare("DELETE FROM admins WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'id' => $id,
                'tipo' => 'Administrador',
                'registro' => 'Eliminar'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Administrador',
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


