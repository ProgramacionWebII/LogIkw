<?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);
		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Cliente::getAllForId($_SESSION['modificar']);
		$resultado1 = Conexion::getQuery($query1);
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid col-sm-12">
    <div class="navbar-header col-sm-1">
     <img src="../image/logo.png">
    </div>
     <ul class="nav navbar-nav col-sm-6">
         <li class="active"><a href="<?php echo "adminLogeado.php";?>">Home</a></li>
	    <li><a href="<?php echo "abmCliente.php";?>">Cliente</a></li>
	  <li><a href="<?php echo "abmEmpresa.php";?>">Empresa</a></li>
      <li><a href="<?php echo "abmChofer.php";?>">Chofer</a></li>
      <li><a href="<?php echo "abmMecanico.php";?>">Mecanico</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""><span class="glyphicon glyphicon-log-in" ></span> Bienvenido <?php echo $admin['nombre']; ?></a></li>
	</ul>
</nav>
  

<div class="col-sm-10 col-sm-offset-1">
  <h2>Actualizar cliente</h2>
   	<?php
	while($cliente = mysqli_fetch_assoc($resultado1)){
		echo "<form method='POST' action='../modelo/ejecutarAbmCliente.php' class='col-sm-12'>
		<div class='form-group col-sm-offset-3 col-sm-6'>
		 <input type='text' name='id' class='hidden' value='".$cliente['id']."'><br>
		razon Social: <input type='text' name='razonSocial' class='form-control' value='".$cliente['razon_social']."'><br>
		 nombre:<input type='text' name='nombre' class='form-control' value='".$cliente['nombre']."'><br>
		 telefono:<input type='text' name='telefono' class='form-control' value='".$cliente['telefono']."'><br>
		domicilio:<input type='text' name='domicilio' class='form-control' value='".$cliente['domicilio']."'><br>
		 email:<input type='text' name='email' class='form-control' value='".$cliente['email']."'>
		 <input type='text' name='alterar' class='hidden' value='a'>
		 </div>
		 <div class='form-group col-sm-offset-3 col-sm-6''>
		 <button type='submit' class='btn btn-primary'>Modificar</button>
		 <a href='abmCliente.php'><button type='submit' class='btn btn-danger'>Regresar</button></a>
		 </tr>
		 </div>
  		 </form>";
	}
   	?>
</div>