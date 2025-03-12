<?php
//include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$verificar_contrasena = $_POST['verificar_contrasena'];
$estado = $_POST['estado'];
$fecha_nac = $_POST['fecha_nac'];

$contrasenaEncrypt = password_hash($contrasena, PASSWORD_DEFAULT);

if ($contrasena == $verificar_contrasena) {
    //echo "contraseñas iguales";

    $sql = $pdo->prepare("INSERT INTO tbl_usuarios
    (nombre, apellido, correo, contrasena, estado, fecha_nac)
    VALUES(:nombre, :apellido, :correo, :contrasena, :estado, :fecha_nac)");

    $sql->bindParam(':nombre', $nombre);
    $sql->bindParam(':apellido', $apellido);
    $sql->bindParam(':correo', $correo);
    $sql->bindParam(':contrasena', $contrasenaEncrypt);
    $sql->bindParam(':estado', $estado);
    $sql->bindParam(':fecha_nac', $fecha_nac);

    if($sql->execute()){
        echo'<script type="text/javascript">
        alert("Registro de Usuario Exitoso");
        </script>';
        header("Location: Formulario.php");
    }else{
        echo'<script type="text/javascript">
        alert("Error en la conexion");
        </script>';
        header("Location: Formulario.php");
    };

}else{
    //header('Location:'.$URL.'/views/admin/usuarios/index.php');
    echo'<script type="text/javascript">
    alert("Contraseñas no son iguales");
    </script>';
    //header('Location:'.$URL.'/views/admin/usuarios/index.php');
   // window.location.href="index.php";
}