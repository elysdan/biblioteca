<?php

session_start();
if (isset($_SESSION['sesion_correo'])) {
    echo "Sesion abierta";
}else{
    echo "Session esta cerrada";
}

?>