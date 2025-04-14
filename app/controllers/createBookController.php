<?php
//include('../../debug/errores.php');
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
$directorio = $URL."/app/controllers/uploads/"; // Directorio donde se guardarán las imágenes
$allowed_types = ['jpg', 'jpeg', 'png']; // Tipos de archivo permitidos
$max_file_size = 5 * 1024 * 1024; // Tamaño máximo permitido en bytes (ej: 5MB)
$message = ""; 

// --- LÓGICA DE SUBIDA DE ARCHIVOS ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {

    if (!file_exists($directorio)) {
        if (!mkdir($directorio, 0775, true)) { 
            die("Error: No se pudo crear el directorio de subidas.");
        }
    } elseif (!is_writable($directorio)) {
        die("Error: El directorio de subidas no tiene permisos de escritura.");
    }

    $file = $_FILES["imagen"];
    $uploadOk = 1;

    if ($file["error"] !== UPLOAD_ERR_OK) {
        $message = "Error al subir el archivo. Código: " . $file["error"];
        $uploadOk = 0;
    } else {
        $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $target_file_name = uniqid("img_", true) . '.' . $imageFileType; // Generar nombre único
        $target_file_path = $directorio . $target_file_name;

        // 1. Verificar si es una imagen real (usando getimagesize)
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            $message = "El archivo no es una imagen válida.";
            $uploadOk = 0;
        }

        // 2. Verificar tamaño del archivo
        if ($uploadOk && $file["size"] > $max_file_size) {
            $message = "Lo siento, tu archivo es demasiado grande (Máx: " . ($max_file_size / 1024 / 1024) . " MB).";
            $uploadOk = 0;
        }

        // 3. Permitir ciertos formatos de archivo
        if ($uploadOk && !in_array($imageFileType, $allowed_types)) {
            $message = "Lo siento, solo se permiten archivos " . implode(", ", $allowed_types) . ".";
            $uploadOk = 0;
        }

        // 4. Intentar mover el archivo si todo está OK
        if ($uploadOk) {
            if (move_uploaded_file($file["tmp_name"], $target_file_path)) {
                $message = "El archivo " . htmlspecialchars(basename($file["name"])) . " ha sido subido como ". $target_file_name .".";
            } else {
                $message = "Lo siento, hubo un error al mover el archivo subido.";
                // error_log("Error moving uploaded file: " . print_r(error_get_last(), true));
            }
        }
    }


}

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
$sentencia->bindParam(':imagen',$target_file_path);

        if($sentencia->execute()){         
            header('Location:'.$URL.'/views/admin/libros/create.php');
            session_start();
            $_SESSION['msj'] = "Registro del Libro ".$titulo." Exitoso";  
        } else{
        header('Location:'.$URL.'/views/admin/libros/create.php');
        session_start();
        $_SESSION['msj'] = "Error en la conexion";
    }

    function getUploadedImages($dir) {
        $images = [];
        if (is_dir($dir)) {
            // Usar glob para buscar patrones de archivo de imagen
            $files = glob($dir . "*.{jpg,jpeg,png}", GLOB_BRACE);
            if ($files) {
                foreach ($files as $file) {
                    $images[] = $file;
                }
            }
        }
        return $images;
    }

    $imageList = getUploadedImages($directorio);

?>