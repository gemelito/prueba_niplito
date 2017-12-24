<!DOCTYPE html>
<html>
  <head>
    <title>Clientes</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
  </head>
  <body>
    <?php
      include "../../models/config.php";
      include "../../models/guardar_datos.php";
      include "../includes/header.php";

      $guardar_datos = new GuardarDatos();

      if (isset($_POST['guardar_datos']) && !empty(['guardar_datos'])  && $_POST['guardar_datos'] == 'enviar' ) {
      	$guardar_datos->AgregarDatos();
      }

    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-6">
          <a href="agregar.php" class="btn btn-primary">Agregar producto</a> <br><br>
          <form class="" action="clientes.php" method="GET">
            <div class="form-group">
              <input type="search" name="search" class="form-control" placeholder="Search" maxlength="15">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>
        </div>

        <div class="col-md-9 col-xs-12 col-sm-6">
          <?php
          // show negative messages
            if ($guardar_datos->errors) {
              foreach ($guardar_datos->errors as $error) { ?>
                <h4 class="alert alert-warning" role="alert"><?php  echo $error;  ?></h4>
            <?php }
            }
            // show positive messages
            if ($guardar_datos->messages) {
               foreach ($guardar_datos->messages as $message) { ?>
                 <h4 class="alert alert-success" role="alert"><?php  echo $message;  ?></h4>
            <?php }
            }
          ?>
          <form class="form-horizontal" action="agregar.php" method="POST">
            <div class="form-group">
              <label>Id material</label>
              <input type="number" name="IDMATERIAL" class="form-control">
            </div>
            <div class="form-group">
              <label>Descripcion</label>
              <input type="text" name="DESCRIPCION" class="form-control">
            </div>
            <div class="form-group">
              <label>Unidad medida</label>
              <input type="text" name="UNIDADMEDIDA" class="form-control">
            </div>
            <div class="form-group">
              <label>Precio</label>
              <input type="number" name="PRECIO1" class="form-control">
            </div>
            <div class="form-group">
              <label>Id cliente</label>
              <input type="number" name="IDCLIENTE" class="form-control">
            </div>
            <div class="form-group">
              <label>RAZON SOCIAL</label>
              <input type="text" name="RAZON_SOCIAL" class="form-control">
            </div>
            <div class="form-group">
              <label>RFC</label>
              <input type="text" name="RFC" class="form-control" maxlength="15">
            </div>
            <div class="form-group">
              <label>Id Codigo</label>
              <input type="number" name="IDCODIGO" class="form-control">
            </div>
            <div class="form-group">
              <label>Cantidad</label>
              <input type="text" name="CANTIDAD" class="form-control">
            </div>
            <div class="form-group">
              <label>Sub total</label>
              <input type="number" name="SUBTOTAL" class="form-control">
            </div>
            <div class="form-group">
              <label>Iva</label>
              <input type="number" name="IVA" class="form-control">
            </div>
            <div class="form-group">
              <label>Total</label>
              <input type="number" name="TOTAL" class="form-control">
            </div>
            <div class="form-group pull-right">
              <button type="submit" class="btn btn-success"value="enviar" name="guardar_datos">Guardar producto</button>
            </div>
          </form>

        </div>
      </div>

    </div>
    <script src="../..javascript/jquery.min.js"></script>
    <script src="../..javascript/tether.min.js"></script>
    <script src="../..javascript/bootstrap.js"></script>
  </body>
</html>
