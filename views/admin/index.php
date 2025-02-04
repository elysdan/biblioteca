<?php
include('../../app/config/config.php');
include('../../app/config/conn.php');
session_start();
if (isset($_SESSION['sesion_correo'])) {
    //echo "OK";
}else{
    header("Location:".$URL."/login");
}
?>

<a href="../../app/controllers/cerrarSesionController.php">Cerrar Sesion</a>