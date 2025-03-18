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
            <h1 class="m-0">Cargar Libro</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="card">
            <h5 class="card-header">Ingrese la informacion solicitada</h5>
            <div class="card-body">
              <form action="<?=$URL?>/app/controllers/createUserController.php" method="post">
<!--Fila 1 -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Codigo" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Titulo">
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Autor">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="areas" id="areas">
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
                            <input type="text" class="form-control" placeholder="Campo">
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ciudad">
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Editorial">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Año de publicacion">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="NºPag.">
                        </div>
                    </div>
                </div>


<!--Fila 3 -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Nº Edicion">
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <select name="" id="" class="form-control">
                            <option value="DIGITAL">DIGITAL</option>
                            <option value="FISICO">FISICO</option>
                            <option value="AMBOS">AMBOS</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="form-group">
                            <input type="number" class="form-control" placeholder="Ejemplares">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Cod. Barra">
                        </div>
                    </div>
                </div>

<!--Fila 4 -->

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Observaciones">
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Estado">
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
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
