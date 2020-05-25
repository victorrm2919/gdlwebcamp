<?php 
include 'functions/funciones.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$pass = $_POST['password'];

if ($_POST['registro'] == 'nuevo') {
    $opciones = array('costo' => 12);
    $password = password_hash($pass, PASSWORD_BCRYPT, $opciones);

    try {

        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $nombre, $password);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error'
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
                'nivel' => $_SESSION['nivel']
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error'
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
                'id' => $id
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error.." . $e->getMessage();
    }
    die(json_encode($respuesta));
}


