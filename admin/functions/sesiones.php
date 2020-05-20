<?php 
//control para abrir paginas unicamente logeado
function usuario_autenticado() {

    if (!revisar_usuario()) {
        header('Location:login.php');
        exit();
    }
}

function revisar_usuario() {
    //valida que halla una sesion iniciada
    return isset($_SESSION['nombre']);  //valida que exista un nombre en session
}

session_start();  //arranca la sesion, sin necesidad de estar logenado en cualquier pagina

usuario_autenticado();



