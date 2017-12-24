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

      $mostrarreporte = $reporte->ReportePorProductor();


    ?>
    <div class="container">
      <h3>Reporte por Producto</h3> <br><br>

      <div class="table-responsive" >
        <table class="table">
          <thead>
            <tr>
              <th>Id material</th>
              <th>Descripcion</th>
              <th>Total de piezas</th>
              <th>Sub total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                if (!empty($mostrarreporte)){
										$num=1 ; foreach ($mostrarreporte as $reporte) { ?>
										<tr>
											<th><?php echo $reporte['IDMATERIAL'];?></th>
											<td><?php echo $reporte['DESCRIPCION']; ?></td>
											<td><?php echo $reporte['TOTALA_PIEZAS_VENDIDAS']; ?></td>
                      <td><?php echo $reporte['SUBTOTAL_TOTAL']; ?></td>

										</tr>
								<?php }
              }else{ ?>
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
