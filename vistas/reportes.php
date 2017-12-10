
<?php 
	session_start();

	/* Compruebo que la session "administrador" esté viva
	En caso de estar viva, hago las declaraciones correspondientes para trabajar.
	Caso contrario, redirijo al index impidiendo mostrar cualquier cosa */

	if(isset($_SESSION['administrador'])){
		include "../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);

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
	<div class="col-sm-12">
	    <div class="navbar-header col-sm-1">
	     <img src="../image/logo.png">
	    </div>
	    <ul class="nav navbar-nav col-sm-4">
	      <li class="active"><a href="<?php echo 'adminLogeado.php'; ?>">HOME</a></li>
	    </ul>
		<ul class="dropdown nav navbar-nav navbar-right nombreLogeado" style="padding-top: 0.5%;">
		  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Seccion ABM
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
				<li><a href=" <?php echo 'admin/abmCliente.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Cliente</a></li>
				<li><a href=" <?php echo 'admin/abmEmpresa.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Empresa</a></li>
				<li><a href=" <?php echo 'admin/abmChofer.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Chofer</a></li>
				<li><a href=" <?php echo 'admin/abmMecanico.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Mecanico</a></li>
				<li><a href=" <?php echo 'admin/abmViajes.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Viajes</a></li>
				<li><a href=" <?php echo 'admin/abmVehiculo.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span>Vehiculos</a></li>
				<li><a href=" <?php echo 'reportes.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span>reportes</a></li>
				<li class="divider"></li>
				<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-new-window" ></span> Logout</a></li>
		  </ul>
		</ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href=""><span class="glyphicon glyphicon-user" ></span>Bienvenido <?php echo $admin['nombre'] ?></a></li>
	    </ul>
	</div>
</nav>




  
	
<input type="submit"  class='btn btn-primary' value="Reportes de Vehiculos" onclick = "location='../modelo/consultarReporteVehiculo.php'"/>
  	
<input type="submit"  class='btn btn-success' value="Reportes de Viajes" onclick = "location='../modelo/consultarReporteViajes.php'"/>
		 




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