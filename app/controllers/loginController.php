<?php
//echo "entro en el controlador";
include('../../debug/errores.php');
include('../config/config.php');
include('../config/conn.php');
//echo password_hash('qwerty', PASSWORD_DEFAULT);
//die();

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Para obtencion de errores de PDO

    $correo = $_POST['correo']; 
    $password = $_POST['contrasena'];
    //$error = header("Location:".$URL."/views/error/loginError.php");
    //Valida si los campos estan vacios.
    if (empty($correo && $password)) {
        //$error;
        die();
        //throw new Exception('No puede dejar campos vacios');
    }

    $sql = "SELECT * FROM tbl_usuarios WHERE correo = :correo AND estado = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR); //Evita injeccion SQL
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($usuarios);
    //die();
    $contador = 0;
        foreach($usuarios as $u){
            $contador += 1;
            $pass = $u['contrasena'];

           // var_dump($pass);
            //die();
        }

        if($contador == "0"){ // Verifica datos existentes
            //header('Location:'.$URL.'/views/error/loginError.php');
            echo "Los datos ingresados no pertenecen a un usuario Activo, por favor verifique nuevamente los datos ingresados";
        }else{
            if (password_verify($password, $pass)) {
                session_start();
                $_SESSION['sesion_correo'] = $correo;
                header('Location:'.$URL.'/views/admin');
                //echo "Contrasena correcta";
                //die();
            }else{
                //die($password . '  ' . $pass);
                //header("Location:".$URL."/views/error/loginError.php");
                echo "Contrasena incorrecta";
            }
        }     
} catch (PDOException $e) {
    echo "Error de base de datos: " . $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>