<?php
include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');

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
$imagen = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];
$formatoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
$directorio_digital = $URL."/views/admin/libros/portadas_digitales/".$nombreImagen.$formatoImagen;
$directorio_fisico = $URL."/views/admin/libros/portadas_fisicos/".$nombreImagen.$formatoImagen;

$text_area = $_POST['area'];
$arrayTA = explode(" ", $text_area);
$let_extraida_TA = "";
foreach($arrayTA as $letra){
    $array_letra = str_split($letra,1);
    $let_extraida_TA = $let_extraida_TA.$array_letra['0'];
}
$sentencia = $pdo->prepare('INSERT INTO tbl_libros
(codigo,titulo,autor,area,campo,ciudad,editorial,anio_pub,nro_edicion,paginas,formato,ejemplares,observaciones,cod_barra, estado, imagen)
VALUES ( :codigo,:titulo,:autor,:area,:campo,:ciudad,:editorial,:anio_pub,:nro_edicion,:paginas,:formato,:ejemplares,:observaciones,:cod_barra,:estado,:imagen)');

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

if ($formato == "DIGITAL") {
    $sentencia->bindParam(':imagen',$directorio_digital);
} else {
    $sentencia->bindParam(':imagen',$directorio_fisico);
}

    if ($formatoImagen = 'jpg' || $formatoImagen = 'jpeg' || $formatoImagen = 'png') {

        if($sentencia->execute()){
            
            header('Location:'.$URL.'/views/admin/libros/create.php');
            session_start();
            $_SESSION['msj'] = "Registro del Libro ".$titulo." Exitoso";
        } elseif (false) {
            header('Location:'.$URL.'/views/admin/libros/create.php');
            session_start();
            $_SESSION['msj'] = "Formato de archivo no permitido, debe ser JPG, JPEG o PNG";
        } 
    } else{
        header('Location:'.$URL.'/views/admin/libros/create.php');
        session_start();
        $_SESSION['msj'] = "Error en la conexion";
    }


?>