<?php
include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');

//$id = $_POST['id'];
$codigo = $_POST['codigo'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$area = $_POST['area'];
$campo = $_POST['campo'];
$ciudad = $_POST['ciudad'];
$editorial = $_POST['editorial'];
$anio_pub = $_POST['anio_pub'];
$nro_edicion = $_POST['nro_edicion'];
$paginas = $_POST['paginas'];
$formato = $_POST['formato'];
$ejemplares = $_POST['ejemplares'];
$observaciones = $_POST['observaciones'];
$cod_barra = $_POST['cod_barra'];
$estado = 1;

$sentencia = $pdo->prepare('INSERT INTO tbl_libros
(codigo,titulo,autor,area,campo,ciudad,editorial,anio_pub,nro_edicion,paginas,formato,ejemplares,observaciones,cod_barra, estado)
VALUES ( :codigo,:titulo,:autor,:area,:campo,:ciudad,:editorial,:anio_pub,:nro_edicion,:paginas,:formato,:ejemplares,:observaciones,:cod_barra,:estado)');

//$sentencia->bindParam(':id',$id);
$sentencia->bindParam(':codigo',$codigo);
$sentencia->bindParam(':titulo',$titulo);
$sentencia->bindParam(':autor',$autor);
$sentencia->bindParam(':area',$area);
$sentencia->bindParam(':campo',$campo);
$sentencia->bindParam(':ciudad',$ciudad);
$sentencia->bindParam(':editorial',$editorial);
$sentencia->bindParam(':anio_pub',$anio_pub);
$sentencia->bindParam(':nro_edicion',$nro_edicion);
$sentencia->bindParam(':paginas',$paginas);
$sentencia->bindParam(':formato',$formato);
$sentencia->bindParam(':ejemplares',$ejemplares);
$sentencia->bindParam(':observaciones',$observaciones);
$sentencia->bindParam(':cod_barra',$cod_barra);
$sentencia->bindParam('estado',$estado);

if($sentencia->execute()){
echo 'success';
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
}

?>