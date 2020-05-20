<?php 

$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$pass = $_POST['password'];

if (isset($_POST['agregar-admin'])) {
    $opciones = array('costo' => 12);
    $password = password_hash($pass, PASSWORD_BCRYPT, $opciones);
    include 'functions/funciones.php';

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

if (isset($_POST['login-admin'])) {
    include 'functions/funciones.php';
    try {
         //Seleccionar el usurio en el base de datos
         $stmt = $conn->prepare("SELECT usuario, nombre, password FROM admins WHERE usuario = ?");
         $stmt->bind_param("s", $usuario);
         $stmt->execute();
         $stmt->bind_result($usuarioBD, $nombre_usuarioBD, $pass_usuarioDB); //resultados de la consulta y asigna a variables declaradas
         $stmt->fetch();
         if ($nombre_usuarioBD) {
             //el usuario existe y verificara el password
             if (password_verify($pass, $pass_usuarioDB)) {
                 //iniciar la sesion
                 session_start();
                 $_SESSION['nombre'] = $nombre_usuarioBD;
                 $_SESSION['usuario'] = $usuarioBD;
                 $_SESSION['login'] = true;
                 //login correcto
                 $respuesta = array(
                     'respuesta' => 'correcto',
                     'nombre' => $nombre_usuarioBD,
                     'tipo' => 'login'
                 );
             } else {
                 //login incorrecto
                 $respuesta = array(
                     'respuesta' => 'Password incorrecto'
                 );
             }
             
         } else {
             $respuesta = array(
                 'error' => 'Usuario no existe'
             );
         }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error.." . $e->getMessage();
    }

    die(json_encode($respuesta));
}