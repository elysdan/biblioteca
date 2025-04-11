<?php
//echo error_reporting(E_ALL);
//echo ini_set("display_errors", 1);
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
                }

?>


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Libro <?=$titulo?></h1>
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

        <div class="card">
            <h5 class="card-header">Ingrese la informacion solicitada</h5>
            <div class="card-body">
              <form action="<?=$URL?>/app/controllers/createBookController.php" method="post">
<!--Fila 1 -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" value="<?=$l['codigo'];?>" class="form-control" placeholder="Codigo" disabled>
                            <input type="text" name="codigo" value="<?=$l['codigo'];?>" class="form-control" placeholder="Codigo" hidden>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" name="titulo" class="form-control" placeholder="Titulo" 
                            value="<?=$l['titulo']?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="campo" id="campo" required>
                                            <?php
                                                $query_campos = $pdo->prepare("SELECT info_completa FROM vista_campos");
                                                $query_campos->execute();
                                                $campos = $query_campos->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($campos as $c){
                                                    $id = $c['id'];
                                                    $campo = $c['info_completa'];
                                            ?>
                                            <option value="<?=$l['campo'];?>"><?=$campo;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCampo">
                                            +
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="area" id="area" required>
                                            <?php
                                                $query_areas = $pdo->prepare("SELECT info_completa FROM vista_areas");
                                                $query_areas->execute();
                                                $areas = $query_areas->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($areas as $a){
                                                    $id = $a['id'];
                                                    $area = $a['info_completa'];
                                            ?>

                                            <option value="<?=$area;?>"><?=$area;?></option>

                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            +
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div> 
                </div>


<!--Fila 2 -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="editorial" id="editorial" required>
                                            <?php
                                                $query_editoriales = $pdo->prepare("SELECT CONCAT(codigo, ' - ', nombre_editorial) 
                                                AS info FROM tbl_editoriales");
                                                $query_editoriales->execute();
                                                $editoriales = $query_editoriales->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($editoriales as $e){
                                                    $id = $e['id'];
                                                    $editorial = $e['info'];
                                            ?>
                                            <option value="<?=$editorial;?>"><?=$editorial;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditorial">
                                            +
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" name="autor" class="form-control" placeholder="Autor" 
                            value="<?=$l['autor']?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" 
                            value="<?=$l['ciudad']?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" name="anio_pub" class="form-control" placeholder="Año de publicacion"
                            value="<?=$l['anio_pub']?>">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="number" name="paginas" class="form-control" placeholder="NºPag."
                            value="<?=$l['paginas']?>">
                        </div>
                    </div>
                </div>


<!--Fila 3 -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" name="nro_edicion" class="form-control" placeholder="Nº Edicion"
                            value="<?=$l['nro_edicion']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <select name="formato" id="formato" class="form-control">
                            <option value="DIGITAL">DIGITAL</option>
                            <option value="FISICO">FISICO</option>
                            <option value="AMBOS" hidden>AMBOS</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="number" name="ejemplares" class="form-control" placeholder="Ejemplares"
                            value="<?=$l['ejemplares']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" name="cod_barra" class="form-control" placeholder="Cod. Barra"
                            value="<?=$l['cod_barra']?>">
                        </div>
                    </div>
                </div>

<!--Fila 4 -->

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="observaciones" class="form-control" placeholder="Observaciones"
                            value="<?=$l['observaciones']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                            <input type="text" name="estado" class="form-control" placeholder="Estado" hidden
                            value="<?=$l['estado']?>">
                        </div>
                    </div>
                </div>
                
<hr>
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?=$URL?>/views/admin" class="btn btn-default">Cancelar</a>

                    <button type="submit" onclick="return confirm('¿Todos los datos son correctos?');" class="btn btn-primary">Cargar</button>
                  </div>
                  </div>
                </div>
              </form>
            </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
  </div>
  <?=include('../../../layout/admin/segundo.php');?>

  <script>
        // Función para validar teclas presionadas
        function validarTecla(event) {
            const tecla = event.key;
            // Bloquear: espacios, números del 0 al 9 y teclado numérico
            if (tecla === ' ' || 
                (event.keyCode >= 48 && event.keyCode <= 57) ||  // Teclado principal
                (event.keyCode >= 96 && event.keyCode <= 105)) { // Teclado numérico
                event.preventDefault();
                return false;
            }
            return true;
        }

        // Validación de Bootstrap
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>