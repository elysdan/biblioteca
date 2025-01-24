<?php
/**
 * otra db por si acaso la local no funciona
 * postgresql://neondb_owner:npg_G4tSPRTw0XEO@ep-fragrant-block-a4w7aqq6-pooler.us-east-1.aws.neon.tech/neondb?sslmode=require
 * 
 */

//Definimos la conexion a la base de datos PostgreSQL

//DB LOCAL
define('PGHOST','localhost');
define('PGPORT',5432);
define('PGDATABASE','biblioteca');
define('PGUSER', 'postgres');
define('PGPASSWORD', 'postgres');
define('PGCLIENTENCODING','UNICODE');
define('ERROR_ON_CONNECT_FAILED','No se pudo conectar a la base de datos local.');

//DB NEON
define('PGHOST_B','ep-fragrant-block-a4w7aqq6-pooler.us-east-1.aws.neon.tech');
define('PGPORT_B',5432);
define('PGDATABASE_B','library');
define('PGUSER_B', 'neondb_owner');
define('PGPASSWORD_B', 'npg_G4tSPRTw0XEO');
define('PGCLIENTENCODING_B','UNICODE');
define('ERROR_ON_CONNECT_FAILED_B','No se pudo conectar a la base de datos neon.');

//DB SUPABASE
/*
define('PGHOST_C','ep-fragrant-block-a4w7aqq6-pooler.us-east-1.aws.neon.tech');
define('PGPORT_C',5432);
define('PGDATABASE_C','library');
define('PGUSER_C', 'neondb_owner');
define('PGPASSWORD_C', 'npg_G4tSPRTw0XEO');
define('PGCLIENTENCODING_C','UNICODE');
define('ERROR_ON_CONNECT_FAILED_C','No se pudo conectar a la base de datos neon.');
*/

$URL = 'http://localhost/biblioteca'
?>