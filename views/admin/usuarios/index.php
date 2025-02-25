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
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="card">
            <h5 class="card-header">Creacion de usuarios</h5>
            <div class="card-body">

            </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
  </div>
  <?=include('../../../layout/admin/segundo.php');?>
