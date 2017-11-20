<?php 
	session_start();

	/* Compruebo que la session "chofer" esté viva
	En caso de estar viva, hago las declaraciones correspondientes para trabajar.
	Caso contrario, redirijo al index impidiendo mostrar cualquier cosa */

	if(isset($_SESSION['mecanico'])){
		include "../modelo/include.php";

		
		
			$query= CalendarioService::getAll();

		$resultado = Conexion::getQuery($query);
		$service = mysqli_fetch_assoc($resultado);
		
	}
	else{		
		header("Location: ../index.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
  <title>MS Logistica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid col-sm-12">
    <div class="navbar-header col-sm-1">
     <img src="../image/logo.png">
    </div>
    <ul class="nav navbar-nav col-sm-4">
      <li class="active"><a href="mecanicoLogeado.php">HOME</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
	</ul>
</nav>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id Vehiculo</th>
        <th>Km unidad</th>
        <th>Descripcion</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $service['id_vehiculo']?></td>
              <td><?php echo $service['km_de_la_unidad']?></td>
            <td><?php echo $service['descripcion']?></td>
      </tr>
      <tr>
        <td><?php echo $service['id_vehiculo']?></td>
                 <td><?php echo $service['km_de_la_unidad']?></td>
            <td><?php echo $service['descripcion']?></td>
      </tr>
      <tr>
        <td><?php echo $service['id_vehiculo']?></td>
                 <td><?php echo $service['km_de_la_unidad']?></td>
            <td><?php echo $service['descripcion']?></td>
      </tr>
    </tbody>
  </table>
</div>
  

	<!-- Modal logout-->
	<form action="../modelo/logout.php" method="POST">
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header col-sm-8 col-sm-offset-2">
	        <h2 class="modal-title" id="exampleModalLabel">¿Desea delogearse?</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
		      </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Delogearse">
	      </div>
	    </div>
	  </div>
	</div>
	</form>
</body>
</html>