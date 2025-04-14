<?php
//include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');

$codigo = $_POST['codigo'];
$campo = $_POST['nombre_campo'];
$estado = 1;

$sql = $pdo->prepare("INSERT INTO tbl_campos
    (codigo, nombre_campo, estado)
    VALUES(:codigo, :nombre_campo, :estado)");

    $sql->bindParam(':codigo', $codigo);
    $sql->bindParam(':nombre_campo', $campo);
    $sql->bindParam(':estado', $estado);


    if($sql->execute()){
        header('Location:'.$URL.'/views/admin/libros/create.php');
        session_start();
        $_SESSION['msj'] = "Registro de Area Exitoso";
    }else{
        header('Location:'.$URL.'/views/admin/libros/create.php');
        session_start();
        $_SESSION['msj'] = "Error en la conexion";
    };