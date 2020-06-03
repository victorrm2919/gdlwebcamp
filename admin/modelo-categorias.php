<?php 
include 'functions/funciones.php';
$categoria = $_POST['nombre'];
$icono = $_POST['icono'];

if ($_POST['registro'] == 'nuevo') {
  

    try {

        $stmt = $conn->prepare("INSERT INTO categoria_evento (cat_evento, icono) VALUES (?, ?)");
        $stmt->bind_param("ss", $categoria, $icono);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Categoria'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Categoria'
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
            
        $stmt = $conn->prepare("UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ?");
        $stmt->bind_param("ssi", $categoria, $icono, $id);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => 'Categoria'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Categoria'
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
                'tipo' => 'Categoria'
            );
        }else {
            $respuesta = array(
                'respuesta' => 'Error',
                'tipo' => 'Categoria'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error.." . $e->getMessage();
    }
    die(json_encode($respuesta));
}


