 <?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);
		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Cliente::getAllForId($_SESSION['modificar']);
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
				<li><a href=" <?php echo 'abmUsuario.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Usuario</a></li>
				<li><a href=" <?php echo 'abmEmpresa.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Empresa</a></li>
				<li><a href=" <?php echo 'abmChofer.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Chofer</a></li>
				<li><a href=" <?php echo 'abmMecanico.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Mecanico</a></li>
				<li><a href=" <?php echo 'abmViajes.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Viajes</a></li>
				<li><a href=" <?php echo 'abmVehiculo.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span>Vehiculos</a></li>
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
  <h2>Actualizar cliente</h2>
   	<?php
	while($cliente = mysqli_fetch_assoc($resultado1)){
		echo "<form method='POST' action='../../modelo/ejecutarAbmCliente.php' class='col-sm-12'>
		<div class='form-group col-sm-offset-3 col-sm-6'>
		 <input type='text' name='id' class='hidden' value='".$cliente['id']."'><br>
		<label>Razon Social:</label>
		<input type='text' name='razonSocial' class='form-control' value='".$cliente['razon_social']."'><br>
		<label>Nombre:</label>
		<input type='text' name='nombre' class='form-control' value='".$cliente['nombre']."'><br>
		<label>Teléfono:</label>
		<input type='text' name='telefono' class='form-control' value='".$cliente['telefono']."'><br>
		<label>Domicilio:</label>
		<input type='text' name='domicilio' class='form-control' value='".$cliente['domicilio']."'><br>
		<label>Email:</label>
		<input type='text' name='email' class='form-control' value='".$cliente['email']."'>
		 </div>
		 <div class='form-group col-sm-offset-3 col-sm-6''>
		 <button type='submit' name='alterar' value='a' class='btn btn-primary'>Modificar</button>
		 <a href='abmCliente.php'><button type='button' class='btn btn-danger'>Regresar</button></a>
		 </div>
  		 </form>";
	}
   	?>
</div>