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
      include "../../models/reporte.php";
      include "../includes/header.php";

      $reporte = new Reporte();

      $reporte->Set("RFC", $_GET['RFC']);
      $mostrarreporte = $reporte->ReporteCliente();


    ?>
    <div class="container">
      <h3>Reporte Del Cliente</h3> <br><br>

      <div class="table-responsive" >
        <table class="table">
          <thead>
            <tr>
              <th>IDCLIENTE</th>
              <th>RFC</th>
              <th>Razon social</th>
              <th>Sub total</th>
              <th>Total</th>
              <th>Total de ventas</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                if (!empty($mostrarreporte)){?>
										<tr>
											<th><?php echo $mostrarreporte->IDCLIENTE;?></th>
											<td><?php echo $mostrarreporte->RFC; ?></td>
											<td><?php echo $mostrarreporte->RAZON_SOCIAL; ?></td>
                      <td><?php echo $mostrarreporte->SUBTOTAL; ?></td>
											<td><?php echo $mostrarreporte->TOTAL; ?></td>
                      <td><?php echo $mostrarreporte->total_ventas; ?></td>
										</tr>
              <?php }else{ ?>
              <h5>No hay clientes...</h5>
            <?php } ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <script src="../..javascript/jquery.min.js"></script>
    <script src="../..javascript/tether.min.js"></script>
    <script src="../..javascript/bootstrap.js"></script>
  </body>
</html>
