<?php
//include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');

$id = $_POST['id'];
$estado_inactivo = '0';

$sql = $pdo->prepare("UPDATE tbl_usuarios SET estado = '$estado_inactivo' 
                        WHERE id = :id");

    $sql->bindParam(':id', $id);


    if($sql->execute()){
        header('Location:'.$URL.'/views/admin/usuarios/index.php');
        session_start();
        $_SESSION['msj'] = "Usuario Inhabilitado";
    }else{
        header('Location:'.$URL.'/views/admin/usuarios/index.php');
        session_start();
        $_SESSION['msj'] = "Fallo al Inhabilitar Usuario";
    }


?>