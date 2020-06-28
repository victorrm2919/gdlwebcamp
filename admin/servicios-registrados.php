<?php 

include 'functions/funciones.php';
include 'functions/sesiones.php';

    
    try {
        $sql = "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY DATE(fecha_registro) ORDER BY fecha_registro";
        $resultado = $conn->query($sql);

        $arreglos_registros = array();
        while ($registro_dia = $resultado->fetch_assoc()) {
            $registro['fecha'] = date('Y-m-d',strtotime($registro_dia['fecha_registro']));
            $registro['cantidad'] = $registro_dia['resultado'];
            $arreglos_registros[] = $registro;
        }

        $resultado = array(
            'datos' => $arreglos_registros,
            'respuesta' => 'correcto'
        );
        $conn->close();
        
    } catch (\Throwable $th) {
        $resultado =  array(
            'datos' => $th->getMessage(),
            'respuesta' => 'error'
        );
    }

    die(json_encode($resultado));
