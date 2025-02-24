<?php
//include('config.php'); //se incluye config.php para importar las variables definidas en el.
//include('../../debug.php');
//Abrimos una nueva conexion persistente usando la funcion reservada pg_pconnect y unimos los parametros definidos en el archivo config.php
//Caso contrario arrojara error 500
try {
   $pdo = new PDO("pgsql:".'host=' . PGHOST . ' port=' . PGPORT . ' dbname=' . PGDATABASE . 
  ' user=' . PGUSER . ' password=' . PGPASSWORD);/*
   $pdo = new PDO("pgsql:".'host=' . PGHOST_B . ' port=' . PGPORT_B . ' dbname=' . PGDATABASE_B . 
  ' user=' . PGUSER_B . ' password=' . PGPASSWORD_B);*/
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   die("Error de conexión: " . $e->getMessage());
}

if($pdo){
   // echo "<script> alert('conectado');</script>";
}else{
   echo ERROR_ON_CONNECT_FAILED;
}

