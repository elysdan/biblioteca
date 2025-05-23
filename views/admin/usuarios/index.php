<?php
//echo error_reporting(E_ALL);
//echo ini_set("display_errors", 1);
include('../../../app/config/config.php');
include('../../../app/config/conn.php');
include('../../../app/config/session.php');
?>

<?=include('../../../layout/admin/primero.php');?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listado de usuarios</h1>

          <?php
            if (isset($_SESSION['msj'])) { 
              $respuesta = $_SESSION['msj'];?>
             <script>
                 Swal.fire({
                  title: "¡Excelente!",
                  text: "<?=$respuesta?>",
                  icon: "success"
                });
             </script> 
          <?php 
            unset($_SESSION['msj']);   
            }
          ?>

          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="card">
            <h5 class="card-header">Crear usuario</h5>
            <div class="card-body">
              <script>
                $(document).ready( function(){
                    $('#tabla1').DataTable();
                  }
                );
              </script>
            <table id="tabla1" class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">F. Nacimiento</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $query_usuarios = $pdo->prepare("SELECT * FROM tbl_usuarios");
                $query_usuarios->execute();
                $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
                foreach($usuarios as $us){
                  $id = $us['id'];
                  $nombre = $us['nombre'];
                  $apellido = $us['apellido'];
                  $correo = $us['correo'];
                  $fecha_nac = $us['fecha_nac'];
                  $estado = $us['estado'];
              ?>
                <tr>
                    <td><?=$us['nombre'];?></td>
                    <td><?=$us['apellido'];?></td>
                    <td><?=$us['correo'];?></td>
                    <td><?=$us['fecha_nac'];?></td>
                    <td><?=$us['estado'];?></td>
                    <td>
                      <a href="<?=$URL?>/views/admin/usuarios/show.php?id=<?=$id?>" class="btn btn-success">Ver</a>
                      <a href="<?=$URL?>/views/admin/usuarios/edit.php?id=<?=$id?>" class="btn btn-warning">Editar</a>
                      <a href="<?=$URL?>/views/admin/usuarios/delete.php?id=<?=$id?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
            </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
  </div>
  <?=include('../../../layout/admin/segundo.php');?>
