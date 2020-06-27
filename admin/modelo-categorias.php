<?php 
include 'functions/funciones.php';
if (!isset($_POST['registro'])) {
    die(header('Location: error.php'));
}

if ($_POST['registro'] == 'nuevo') {
    $categoria = $_POST['nombre'];
    $icono = $_POST['icono'];
    

    try {

        $stmt = $conn->prepare("INSERT INTO categoria_evento (cat_evento, icono) VALUES (?, ?)");
        $stmt->bind_param("ss", $categoria, $icono);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Categoria',
                'registro' => 'Nuevo'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Categoria',
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
    $categoria = $_POST['nombre'];
    $icono = $_POST['icono'];

    try {
        $id = $_POST['id_registro'];
            
        $stmt = $conn->prepare("UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ?");
        $stmt->bind_param("ssi", $categoria, $icono, $id);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Categoria',
                'registro' => 'Actualizar'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Categoria',
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
        $stmt = $conn->prepare("DELETE FROM categoria_evento WHERE id_categoria = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'id' => $id,
                'tipo' => 'Categoria',
                'registro' => 'Eliminar'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Categoria',
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


