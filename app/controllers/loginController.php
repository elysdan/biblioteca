<?php
//echo "entro en el controlador";
include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');

try {

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Para obtencion de errores de PDO

    $correo = $_POST['correo']; 
    $password = $_POST['contrasena'];

    //Valida si los campos estan vacios.
    if (empty($correo && $password)) {
        throw new Exception("Todos los datos son requeridos.");
    }

    $sql = "SELECT * FROM tbl_usuarios WHERE correo = :correo AND estado = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR); //Evita injeccion SQL
    $stmt->execute();

} catch (PDOException $e) {
    echo "Error de base de datos: " . $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>