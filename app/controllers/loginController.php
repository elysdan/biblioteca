<?php
//echo "entro en el controlador";
include('../../debug/errores.php');
$correo = $_POST['correo'];
$password = $_POST['password'];

echo 'controlador capturo correo: ' . $correo . "<br>";

echo 'controlador capturo password: ' . $password;
?>