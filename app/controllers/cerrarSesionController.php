<?php
//include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');
session_start();
    if(isset($_SESSION['sesion_correo'])){
        session_destroy();
        header("Location:".$URL."/login");
    }else{
        //echo "no existe sesion";
    }
?>