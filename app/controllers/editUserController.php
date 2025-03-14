<?php
//echo "Entro en editar";
//include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');
//include('../config/session.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$estado = $_POST['estado'];
$fecha_nac = $_POST['fecha_nac'];

$sql = $pdo->prepare("UPDATE tbl_usuarios SET
    nombre = :nombre, 
    apellido = :apellido, 
    correo = :correo, 
    estado = :estado, 
    fecha_nac = :fecha_nac WHERE id = :id");

    $sql->bindParam(':id', $id);
    $sql->bindParam(':nombre', $nombre);
    $sql->bindParam(':apellido', $apellido);
    $sql->bindParam(':correo', $correo);
    $sql->bindParam(':estado', $estado);
    $sql->bindParam(':fecha_nac', $fecha_nac);

    if($sql->execute()){
        echo'<script type="text/javascript">
        alert("Actualizacion de Usuario Exitoso");
        </script>';
    }else{
        echo'<script type="text/javascript">
        alert("Fallo al Actualizar");
        </script>';
    }
?>