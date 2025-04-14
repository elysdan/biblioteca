<?php
include('../../app/config/config.php');
include('../../app/config/conn.php');
//include('../../debug/errores.php');
include('../../app/config/session.php');

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
        <div class="container mt-3">
        <h2 class="mb-3">Datos Personales</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Dato</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">NOMBRE</th>
                    <td><?=$su['nombre'];?></td>
                </tr>
                <tr>
                    <th scope="row">APELLIDO</th>
                    <td><?=$su['apellido'];?></td>
                </tr>
                <tr>
                    <th scope="row">FECHA NACIMIENTO</th>
                    <td><?=$su['fecha_nac'];?></td>
                </tr>
                <tr>
                    <th scope="row">ESTADO</th>
                    <td><?=$su['estado'];?></td>
                </tr>
            </tbody>
        </table>
    </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
<?=include('../../layout/admin/segundo.php');?>

<!-- <a href="../../app/controllers/cerrarSesionController.php">Cerrar Sesion</a> -->