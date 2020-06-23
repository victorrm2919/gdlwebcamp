<?php 

    $conn = new mysqli('localhost' /* conexion */, 'root'/* usuario */, ''/* contraseña */, 'gdlwebcamp' /* base */);

    if ($conn->connect_error) {
        echo $conn->$connect_error; 
    }
?>