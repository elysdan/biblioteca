<?php
//echo error_reporting(E_ALL);
//echo ini_set("display_errors", 1);
include('../../../app/config/config.php');
include('../../../app/config/conn.php');
include('../../../app/config/session.php');
?>
<style>
    .file-select {
    position: relative;
    display: inline-block;
    }
    .custom-button {
        /* Estilos del botón personalizado */
    }
    .filename {
        /* Estilos para mostrar el nombre del archivo */
    }
</style>
<?=include('../../../layout/admin/primero.php');?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cargar Libro</h1>
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
              <form action="<?=$URL?>/app/controllers/createBookController.php" method="post" enctype="multipart/form-data">
<!--Fila 1 -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        <?php
                        $contador_id = 0;
                            $query_id = $pdo->prepare("SELECT * FROM tbl_libros");
                            $query_id->execute();
                            $ids = $query_id->fetchAll(PDO::FETCH_ASSOC);
                            foreach($ids as $i){
                                $contador_id+=1;
                        ?>
                        <?php
                            }
                            $contador_id+=1;
                        ?>
                            <input type="text" value="<?=$contador_id;?>" class="form-control" placeholder="Codigo" disabled>
                            <input type="text" name="codigo" value="<?=$contador_id;?>" class="form-control" placeholder="Codigo" hidden>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" name="titulo" class="form-control" placeholder="Titulo" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="campo" id="campo" required>
                                            <option label="SELECCIONE UN CAMPO"></option>
                                            <?php
                                                $query_campos = $pdo->prepare("SELECT info_completa FROM vista_campos");
                                                $query_campos->execute();
                                                $campos = $query_campos->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($campos as $c){
                                                    $id = $c['id'];
                                                    $campo = $c['info_completa'];
                                            ?>
                                            <option value="<?=$campo;?>"><?=$campo;?></option>
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
                                        <option label="SELECCIONE UN AREA" ></option>
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
                                        <option label="SELECCIONE UNA EDITORIAL" ></option>
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
                            <input type="text" name="autor" class="form-control" placeholder="Autor" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" name="anio_pub" class="form-control" placeholder="Año de publicacion">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="number" name="paginas" class="form-control" placeholder="NºPag.">
                        </div>
                    </div>
                </div>


<!--Fila 3 -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" name="nro_edicion" class="form-control" placeholder="Nº Edicion">
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
                            <input type="number" name="ejemplares" class="form-control" placeholder="Ejemplares">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" name="cod_barra" class="form-control" placeholder="Cod. Barra">
                        </div>
                    </div>
                </div>

<!--Fila 4 -->

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="observaciones" class="form-control" placeholder="Observaciones">
                        </div>
                    </div>
                    <div class="col-md-1">
                    <div class="form-group">
                            <input type="text" name="estado" class="form-control" placeholder="Estado" hidden>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="file-select">
                            <input type="file" id="file-input" name="imagen" style="opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;" />
                            <button type="button" class="btn btn-success">Subir Portada</button>
                            <span class="filename"></span>
                        </div>                    
                    </div>
                </div>
                
<hr>
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?=$URL?>/views/admin" class="btn btn-default">Cancelar</a>

                    <button type="submit" name="cargar" onclick="return confirm('¿Todos los datos son correctos?');" class="btn btn-primary">Cargar</button>
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

<!-- Modal Area-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Area Nueva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=$URL?>/app/controllers/createAreaController.php" method="post">
            <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                             <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo Area"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 3);" 
                                pattern="[0-9]{3}" 
                                maxlength="3"
                                required 
                            >
                        </div>
                    </div>
                    <!--<div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre_area_p" id="nombre_area_p" placeholder="Area Principal" hidden>
                        </div>
                    </div> --->
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre_area_h" id="nombre_area_h" placeholder="Area" 
                            oninput="this.value = this.value.replace(/[\d]/g, '')" 
                            pattern="^[^\d]*$"
                            required>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" onclick="return confirm('¿Todos los datos son correctos?');" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>






<!-- Modal Campo-->
<div class="modal fade" id="modalCampo" tabindex="-1" aria-labelledby="modalCampo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCampo">Agregar Campo Nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=$URL?>/app/controllers/createCampoController.php" method="post">
            <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                             <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo Campo"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 3);" 
                                pattern="[0-9]{3}" 
                                maxlength="3"
                                required 
                            >
                        </div>
                    </div>
                    <!--<div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre_area_p" id="nombre_area_p" placeholder="Area Principal" hidden>
                        </div>
                    </div> --->
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre_campo" id="nombre_campo" placeholder="Campo" 
                            oninput="this.value = this.value.replace(/[\d]/g, '')" 
                            pattern="^[^\d]*$"
                            required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" onclick="return confirm('¿Todos los datos son correctos?');" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Campo-->
<div class="modal fade" id="modalEditorial" tabindex="-1" aria-labelledby="modalEditorial" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditorial">Agregar Campo Nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=$URL?>/app/controllers/createEditorialController.php" method="post">
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                             <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo Editorial"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);" 
                                pattern="[0-9]{12}" 
                                maxlength="12"
                                required 
                            >
                        </div>
                    </div>
                    <!--<div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre_area_p" id="nombre_area_p" placeholder="Area Principal" hidden>
                        </div>
                    </div> --->
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre_editorial" id="nombre_editorial" placeholder="Editorial" 
                            oninput="this.value = this.value.replace(/[\d]/g, '')" 
                            pattern="^[^\d]*$"
                            required>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <textarea type="text" class="form-control" 
                            name="descripcion" id="descripcion" placeholder="Descripcion" 
                            oninput="this.value = this.value.replace(/[\d]/g, '')" 
                            pattern="^[^\d]*$"
                            cols="40"
                            rows="8"
                            maxlength="250"
                            required></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" onclick="return confirm('¿Todos los datos son correctos?');" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    const fileInput = document.getElementById('file-input');
    const customButton = document.querySelector('.custom-button');
    const filenameDisplay = document.querySelector('.filename');

    customButton.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            filenameDisplay.textContent = fileInput.files[0].name;
        }
    });
</script>