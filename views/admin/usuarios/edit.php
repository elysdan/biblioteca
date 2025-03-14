<?php
//echo error_reporting(E_ALL);
//echo ini_set("display_errors", 1);
include('../../../app/config/config.php');
include('../../../app/config/conn.php');
include('../../../app/config/session.php');
?>

<?=include('../../../layout/admin/primero.php');

$id_get = $_GET['id'];

$query_usuarios = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE id = '$id_get'");
                $query_usuarios->execute();
                $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
                foreach($usuarios as $us){
                  $id = $us['id'];
                  $nombre = $us['nombre'];
                  $apellido = $us['apellido'];
                  $correo = $us['correo'];
                  $fecha_nac = $us['fecha_nac'];
                  $estado = $us['estado'];
                }

?>


  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Usuario</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="card">
            <h5 class="card-header"><?=$us['nombre'].' '.$us['apellido']?></h5>
            <div class="card-body">
              <form action="<?=$URL?>/app/controllers/editUserController.php" method="post">
<!--Fila 1 -->
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" name="nombre" value="<?=$us['nombre']?>" class="form-control" 
                       id="campoSinEspacios" 
                       onkeydown="return event.key != ' '" 
                       oninput="this.value = this.value.replace(/[\s\d]/g, '')"
                       pattern="^[^\s\d]*$" 
                       required 
                       placeholder="Nombre">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" name="apellido" value="<?=$us['apellido']?>" class="form-control" 
                       id="campoSinEspacios" 
                       onkeydown="return event.key != ' '" 
                       oninput="this.value = this.value.replace(/[\s\d]/g, '')"
                       pattern="^[^\s\d]*$" 
                       required 
                       placeholder="Apellido">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <select name="estado" id="" class="form-control">
                        <option value="<?=$us['estado']?>">"<?=$us['estado']?>"</option>
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                      </select>
                    </div>
                  </div>

                </div>
<!--Fila 2 -->
                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="date" name="fecha_nac" value="<?=$us['fecha_nac']?>" class="form-control" placeholder="Fecha de Nacimiento">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="email" name="correo" value="<?=$us['correo']?>" class="form-control" placeholder="Correo">
                      <input type="text" name="id" value="<?=$id_get?>" hidden>
                    </div>
                  </div>

                </div>
<hr>
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?=$URL?>/views/admin" class="btn btn-default">Cancelar</a>

                    <button type="submit" onclick="return confirm('¿Todos sus datos son correctos?');" 
                    class="btn btn-primary">Guardar Cambios</button>
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