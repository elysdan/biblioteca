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
            <h1 class="m-0">Listado de libros digitales</h1>

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

        <div class="table-responsive">
        <div class="card">
            <h5 class="card-header">Libros</h5>
            <div class="card-body">
              <script>
                $(document).ready( function(){
                    $('#tabla2').DataTable();
                  }
                );
              </script>
            <table id="tabla2" class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Area</th>
                    <th scope="col">Campo</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Nro. Edicion</th>
                    <th scope="col">Cod. Barra</th>
                    <th scope="col">Acciones</th>

                    <!-- <th scope="col">Publicacion</th> 
                         <th scope="col">Observaciones</th>
                         <th scope="col">Paginas</th>
                         <th scope="col">Ejemplares</th>
                         -->
                </tr>
            </thead>
            <tbody>
              <?php
                $query_libros = $pdo->prepare("SELECT * FROM tbl_libros WHERE formato='DIGITAL'");
                $query_libros->execute();
                $libros = $query_libros->fetchAll(PDO::FETCH_ASSOC);
                foreach($libros as $l){
                  $id = $l['id'];
                  $codigo = $l['codigo'];
                  $titulo = $l['titulo'];
                  $autor = $l['autor'];
                  $area = $l['area'];
                  $campo = $l['campo'];
                  $ciudad = $l['ciudad'];
                  $editorial = $l['editorial'];
                  $anio_pub = $l['anio_pub'];
                  $nro_edicion = $l['nro_edicion'];
                  $paginas = $l['paginas'];
                  $ejemplares = $l['ejemplares'];
                  $observaciones = $l['observaciones'];
                  $cod_barra = $l['cod_barra'];
                  //$estado = $l['estado'];
              ?>
                <tr>
                    <td><?=$l['codigo'];?></td>
                    <td><?=$l['titulo'];?></td>
                    <td><?=$l['autor'];?></td>
                    <td><?=$l['area'];?></td>
                    <td><?=$l['campo'];?></td>
                    <td><?=$l['ciudad'];?></td>
                    <td><?=$l['editorial'];?></td>
                    <td><?=$l['nro_edicion'];?></td>
                    <td><?=$l['cod_barra'];?></td>

                    <!-- <td><?=$l['anio_pub'];?></td>
                     <td><?=$l['paginas'];?></td> 
                     <td><?=$l['observaciones'];?></td>
                     <td><?=$l['ejemplares'];?></td>-->

                    <td>
                      <a href="<?=$URL?>/views/admin/libros/show.php?id=<?=$id?>" class="btn btn-success">Ver</a>
                      <a href="<?=$URL?>/views/admin/libros/edit.php?id=<?=$id?>" class="btn btn-warning">Editar</a>
                      <a href="<?=$URL?>/views/admin/libros/delete.php?id=<?=$id?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
            </div>
        </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
  </div>
  <?=include('../../../layout/admin/segundo.php');?>