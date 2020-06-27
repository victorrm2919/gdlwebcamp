<?php 
include 'functions/funciones.php';
if (!isset($_POST['usuario'])) {
    die(header('Location: error.php'));
}

$usuario = $_POST['usuario'];
$pass = $_POST['password'];

if (isset($_POST['login-admin'])) {
    try {
         //Seleccionar el usurio en el base de datos
         $stmt = $conn->prepare("SELECT id, usuario, nombre, password, nivel FROM admins WHERE usuario = ?");
         $stmt->bind_param("s", $usuario);
         $stmt->execute();
         $stmt->bind_result($id_usuarioDB, $usuarioBD, $nombre_usuarioBD, $pass_usuarioDB, $nivel_usuarioDB); //resultados de la consulta y asigna a variables declaradas
         $stmt->fetch();
         if ($nombre_usuarioBD) {
             //el usuario existe y verificara el password
             if (password_verify($pass, $pass_usuarioDB)) {
                 //iniciar la sesion
                 session_start();
                 $_SESSION['nombre'] = $nombre_usuarioBD;
                 $_SESSION['usuario'] = $usuarioBD;
                 $_SESSION['nivel'] = $nivel_usuarioDB;
                 $_SESSION['id'] = $id_usuarioDB;
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