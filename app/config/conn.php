<?php
//include('config.php'); //se incluye config.php para importar las variables definidas en el.

//Abrimos una nueva conexion persistente usando la funcion reservada pg_pconnect y unimos los parametros definidos en el archivo config.php
//Caso contrario arrojara error 500
if(//pg_pconnect('host=' . PGHOST . ' port=' . PGPORT . ' dbname=' . PGDATABASE . ' user=' . PGUSER . ' password=' . PGPASSWORD) || 
   pg_pconnect('host=' . PGHOST_B . ' port=' . PGPORT_B . ' dbname=' . PGDATABASE_B . ' user=' . PGUSER_B . ' password=' . PGPASSWORD_B)){
   
    //echo "<script> alert('conectado');</script>";

}else{
   //echo ERROR_ON_CONNECT_FAILED;
   echo ERROR_ON_CONNECT_FAILED_B;
}