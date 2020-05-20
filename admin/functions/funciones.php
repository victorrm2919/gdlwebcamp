<?php 

require_once '../includes/funciones/bd_conexion.php';


function obtenerPaginaActual() {
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace('.php', '', $archivo);
    return $pagina;
}
