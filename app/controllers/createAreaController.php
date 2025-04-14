<?php
//include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');

$codigo = $_POST['codigo'];
$area = $_POST['nombre_area_h'];
$estado = 1;

$sql = $pdo->prepare("INSERT INTO tbl_areas
    (codigo, nombre_area_h, estado)
    VALUES(:codigo, :nombre_area_h, :estado)");

    $sql->bindParam(':codigo', $codigo);
    $sql->bindParam(':nombre_area_h', $area);
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
