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


      if(isset($_GET['search']) && is_string($_GET['search']) && strlen($_GET['search']) == 15){
    	  $clientes->Set("RFC", $_GET['search']);
        $mostrarclientes = $clientes->BuscarCliente();
    	}else{
    	  $mostrarclientes = $clientes->MostrarClientes();
    	}
    ?>
    <div class="container">
      <div class="pull-left">

        <a href="agregar.php" class="btn btn-primary">Agregar producto</a> <br><br>
        <form class="" action="clientes.php" method="GET">
          <div class="form-group">
            <input type="search" name="search" class="form-control" placeholder="Search" maxlength="15">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
      </div>

      <div class="table-responsive" style="padding-left:20px;">
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
                      <td><a href="../reportes/por_cliente.php?RFC=<?php echo $cliente['RFC']; ?>">Ver reporte</a></td>
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
