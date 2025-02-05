<?php
include('../../app/config/config.php');
include('../../app/config/conn.php');
//include('../../debug/errores.php');

session_start();
if (isset($_SESSION['sesion_correo'])) {
    //echo "OK";
}else{
    header("Location:".$URL."/login");
}

$correo_sesion = $_SESSION['sesion_correo'];
$query_usuario = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE correo = :correo AND estado = 1");
$query_usuario->bindParam(':correo', $correo_sesion, PDO::PARAM_STR);
$query_usuario->execute();

$sesion_usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);

foreach($sesion_usuarios as $su){
    //var_dump($su);
    $user_id = $su['id'];
    $user_name = $su['nombre'];
    $user_lastname = $su['apellido'];
    $user_email = $su['correo'];
    $user_passwd = $su['contrasena'];
    $user_fechaNac = $su['fecha_nac'];
    $user_estado = $su['estado'];
}

//echo $user_id;

?>

<?=include('../../layout/admin/primero.php');?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                </tr>
            </thead>
            <tbody>
<tr>
    <th>1</th>
    <td>a</td>
    <td>b</td>
    <td>c</td>
    <td>d</td>
</tr>
            </tbody>
            </table>
      </div><!-- /.container-fluid -->
    </div>
  </div>
<?=include('../../layout/admin/segundo.php');?>

<!-- <a href="../../app/controllers/cerrarSesionController.php">Cerrar Sesion</a> -->