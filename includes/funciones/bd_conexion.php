<?php 

    $conn = new mysqli('localhost' /* conexion */, 'root'/* usuario */, 'root'/* contraseña */, 'gdlwebcamp' /* base */);

    if ($conn->connect_error) {
        echo $error->$connect_error; 
    }
?>