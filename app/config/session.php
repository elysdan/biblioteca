<?php

session_start();
if (isset($_SESSION['sesion_correo'])) {
    //echo "OK";
}else{
    header("Location:".$URL."/login");
}

$correo_sesion = $_SESSION['sesion_correo'];
$query_usuario = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE correo = :correo AND estado = 1");
$query_usuario->bindParam(':correo', $correo_sesion, PDO::PARAM_STR);
$query_usuario->execute();

$sesion_usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);

foreach($sesion_usuarios as $su){
    //var_dump($su);
    $user_id = $su['id'];
    $user_name = $su['nombre'];
    $user_lastname = $su['apellido'];
    $user_email = $su['correo'];
    $user_passwd = $su['contrasena'];
    $user_fechaNac = $su['fecha_nac'];
    $user_estado = $su['estado'];
}

?>