 <?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);
		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Vehiculo::getAllForId($_SESSION['modificar']);
		$resultado1 = Conexion::getQuery($query1);
	}
	else{		
		header("Location: ../../index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>MS Logistica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../../js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/home.css">
</head>
<body>
	
<nav class="navbar navbar-inverse">
	<div class="col-sm-12">
	    <div class="navbar-header col-sm-1">
	     <img src="../../image/logo.png">
	    </div>
	    <ul class="nav navbar-nav col-sm-4">
	      <li class="active"><a href="<?php echo '../adminLogeado.php'; ?>">HOME</a></li>
	    </ul>
		<ul class="dropdown nav navbar-nav navbar-right nombreLogeado" style="padding-top: 0.5%;">
		  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Seccion ABM
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
				<li><a href=" <?php echo 'abmCliente.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Cliente</a></li>
				<li><a href=" <?php echo 'abmEmpresa.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Empresa</a></li>
				<li><a href=" <?php echo 'abmChofer.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Chofer</a></li>
				<li><a href=" <?php echo 'abmMecanico.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Mecanico</a></li>
				<li><a href=" <?php echo 'abmViajes.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Viajes</a></li>
				<li><a href=" <?php echo 'abmVehiculo.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Vehiculos</a></li>
				<li><a href=" <?php echo '../reportes.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Reportes</a></li>
				<li class="divider"></li>
				<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-new-window" ></span> Logout</a></li>
		  </ul>
		</ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href=""><span class="glyphicon glyphicon-user" ></span>Bienvenido <?php echo $admin['nombre'] ?></a></li>
	    </ul>
	</div>
</nav>


  

<div class="col-sm-10 col-sm-offset-1">
  <h2>Actualizar vehiculo</h2>
   	<?php
	while($vehiculo = mysqli_fetch_assoc($resultado1)){
		echo "<form method='POST' action='../../modelo/ejecutarAbmVehiculo.php' class='col-sm-12'>
		<div class='form-group col-sm-offset-3 col-sm-6'>
		 <input type='text' name='id' class='hidden' value='".$vehiculo['id']."'><br>
		
		
		
		<label>Patente:</label>
		<input type='text' name='patente' class='form-control' value='".$vehiculo['patente']."'><br>
		<label>Nro chasis:</label>
		<input type='text' name='nro_chasis' class='form-control' value='".$vehiculo['nro_chasis']."'><br>
		<label>Nro motor:</label>
		<input type='text' name='nro_motor' class='form-control' value='".$vehiculo['nro_motor']."'><br>
		<label>Marca:</label>
		<input type='text' name='marca' class='form-control' value='".$vehiculo['marca']."'><br>
		<label>Modelo:</label>
		<input type='text' name='modelo' class='form-control' value='".$vehiculo['modelo']."'><br>
		<label>Año de fabricacion:</label>
		<input type='text' name='anio_fabricacion' class='form-control' value='".$vehiculo['anio_fabricacion']."'><br>
		<label>Tipo:</label>
		<input type='text' name='tipo' class='form-control' value='".$vehiculo['tipo']."'><br>
		<label>Estado:</label>
		<input type='text' name='estado' class='form-control' value='".$vehiculo['estado']."'><br>
		
		
		 </div>
		 <div class='form-group col-sm-offset-3 col-sm-6''>
		 <button type='submit' name='alterar' value='a' class='btn btn-primary'>Modificar</button>
		 <a href='abmVehiculo.php'><button type='button' class='btn btn-danger'>Regresar</button></a>
		 </div>
  		 </form>";
	}
   	?>
</div>