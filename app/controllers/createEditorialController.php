<?php
//include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');

$codigo = $_POST['codigo'];
$editorial = $_POST['nombre_editorial'];
$descripcion = $_POST['descripcion'];
$estado = 1;

$sql = $pdo->prepare("INSERT INTO tbl_editoriales
    (codigo, nombre_editorial, descripcion, estado)
    VALUES(:codigo, :nombre_editorial, :descripcion, :estado)");

    $sql->bindParam(':codigo', $codigo);
    $sql->bindParam(':nombre_editorial', $editorial);
    $sql->bindParam(':descripcion', $descripcion);
    $sql->bindParam(':estado', $estado);


    if($sql->execute()){
        header('Location:'.$URL.'/views/admin/libros/create.php');
        session_start();
        $_SESSION['msj'] = "Registro de Editorial Exitoso";
    }else{
        header('Location:'.$URL.'/views/admin/libros/create.php');
        session_start();
        $_SESSION['msj'] = "Error en la conexion";
    };
