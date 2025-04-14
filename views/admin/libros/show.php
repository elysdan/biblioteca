<?php
echo error_reporting(E_ALL);
echo ini_set("display_errors", 1);
include('../../../app/config/config.php');
include('../../../app/config/conn.php');
include('../../../app/config/session.php');
?>

<?=include('../../../layout/admin/primero.php');

$id_get = $_GET['id'];

$query_libros = $pdo->prepare("SELECT * FROM tbl_libros WHERE id = '$id_get'");
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
                    $formato = $l['formato'];
                    $ejemplares = $l['ejemplares'];
                    $observaciones = $l['observaciones'];
                    $cod_barra = $l['cod_barra'];
                    $estado = $l['estado'];
                    $imageList = $l['imagen'];
                }

?>


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$titulo?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        
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

        <div class="content-wrapper">
            <div class="content-header">
            <?php if (!empty($imageList)): ?>
                        <img src="<?php echo $imageList; ?>" alt="Imagen cargada" onclick="openModal('<?php echo $imageList; ?>')">
                <?php else: ?>
                    <p>No hay imágenes cargadas todavía.</p>
                <?php endif; ?>
            <div class="container-fluid">
                <div class="container mt-3">
                <h2 class="mb-3">Informacion del Libro</h2>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Dato</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">CODIGO</th>
                            <td><?=$l['codigo'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">AUTOR</th>
                            <td><?=$l['autor'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">AREA</th>
                            <td><?=$l['area'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">CAMPO</th>
                            <td><?=$l['campo'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">CIUDAD</th>
                            <td><?=$l['ciudad'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">EDITORIAL</th>
                            <td><?=$l['editorial'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">AÑO DE PUBLICACION</th>
                            <td><?=$l['anio_pub'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">NUMERO DE EDICION</th>
                            <td><?=$l['nro_edicion'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">PAGINAS</th>
                            <td><?=$l['paginas'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">FORMATO</th>
                            <td><?=$l['formato'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">EJEMPLARES</th>
                            <td><?=$l['ejemplares'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">OBSERVACIONES</th>
                            <td><?=$l['observaciones'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">CODIGO DE BARRA</th>
                            <td><?=$l['cod_barra'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">ESTADO</th>
                            <td><?=$l['estado'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <div id="myModal" class="modal">
      <span class="close-modal" onclick="closeModal()">&times;</span>
      <img class="modal-content" id="imgModal">
    </div>

    <script>
        // Funciones para el Modal
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("imgModal");

        function openModal(imgSrc) {
            modal.style.display = "block";
            modalImg.src = imgSrc;
        }

        function closeModal() {
            modal.style.display = "none";
        }

        // Cerrar modal si se hace clic fuera de la imagen
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>

  <?=include('../../../layout/admin/segundo.php');?>