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
        echo'<script type="text/javascript">
        alert("Usuario Inhabilitado");
        </script>';
        //header('Location:');
    }else{
        echo'<script type="text/javascript">
        alert("Fallo al Inhabilitar Usuario");
        </script>';
        //header('Location:');
    }


?>