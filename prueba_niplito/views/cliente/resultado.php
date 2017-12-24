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
      include "../../models/cliente.php";
      include "../includes/header.php";

      $clientes = new Cliente();
      $mostrarclientes = $clientes->MostrarClientes();
    ?>
    <div class="container">

      <button class="btn btn-primary">Agregar producto</button>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Razon social</th>
              <th>RFC</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                if (!empty($mostrarclientes)){
										$num=1 ; foreach ($mostrarclientes as $cliente) { ?>
										<tr>
											<th><?php echo $num; $num++;?></th>
											<td><?php echo $cliente['RAZON_SOCIAL']; ?></td>
											<td><?php echo $cliente['RFC']; ?></td>
										</tr>
								<?php }
							} ?>
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
