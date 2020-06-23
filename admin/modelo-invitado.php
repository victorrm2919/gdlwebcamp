<?php 
include 'functions/funciones.php';


if ($_POST['registro'] == 'nuevo') {

    $nombre_invitado = $_POST['nombre-invitado'];
    $apellido_invitado = $_POST['apellido-invitado'];
    $descripcion = $_POST['biografia'];
    
    $directorio = '../img/invitados/';

    if(!is_dir($directorio)) {   /* Valida direcctorio */
        mkdir($directorio, 0755, true);  /* crea directorio con permisos en caso de no estar */
    }

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_FILES['imagen']['name'] )) {
        $imagen_url = $_FILES['imagen']['name'];
        $img_resultado = 'Se subio correctamente';
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {

        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre_invitado, $apellido_invitado, $descripcion, $imagen_url);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Invitado',
                'img_resultado' => $img_resultado,
                'registro' => 'Nuevo'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Invitado',
                'stmt' => $stmt->error
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
    $nombre_invitado = $_POST['nombre-invitado'];
    $apellido_invitado = $_POST['apellido-invitado'];
    $descripcion = $_POST['biografia'];

    $directorio = '../img/invitados/';
    $id = $_POST['id_registro'];

    if(!is_dir($directorio)) {   /* Valida direcctorio */
        mkdir($directorio, 0755, true);  /* crea directorio con permisos en caso de no estar */
    }

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_FILES['imagen']['name'] )) {
        $imagen_url = $_FILES['imagen']['name'];
        $img_resultado = 'Se subio correctamente';
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {      
        if ($_FILES['imagen']['size'] > 0 ) {
            //con imagen
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ?, editado = NOW() WHERE invitado_id = ?");
            $stmt->bind_param("ssssi", $nombre_invitado, $apellido_invitado, $descripcion, $imagen_url, $id);
        } else {
            //sin imagen
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, editado = NOW() WHERE invitado_id = ?");
            $stmt->bind_param("sssi", $nombre_invitado, $apellido_invitado, $descripcion, $id);
        }
        
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Invitado',
                'registro' => 'Actualizar'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Invitado'
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
        $stmt = $conn->prepare("DELETE FROM invitados WHERE invitado_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'id' => $id,
                'tipo' => 'Invitado',
                'registro' => 'Eliminar'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Invitado',
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


