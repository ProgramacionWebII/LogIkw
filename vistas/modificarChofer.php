<?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);
		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Chofer::getAllForId($_SESSION['modificar']);
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
  <h2>Actualizar chofer</h2>
   	<?php
	while($chofer = mysqli_fetch_assoc($resultado1)){
		echo "<form method='POST' action='../modelo/ejecutarAbmChofer.php' class='col-sm-12'>
		<div class='form-group col-sm-offset-3 col-sm-6'>
		 <input type='text' name='id' class='hidden' value='".$chofer['id']."'><br>
		 dni:<input type='text' name='dni_chofer' class='form-control' value='".$chofer['dni_chofer']."'><br>
		 nombre:<input type='text' name='nombre' class='form-control' value='".$chofer['nombre']."'><br>
		 apellido:<input type='text' name='apellido' class='form-control' value='".$chofer['apellido']."'><br>
		 fecha_de_nacimiento:<input type='text' name='fecha_de_nacimiento' class='form-control' value='".$chofer['fecha_de_nacimiento']."'><br>
		tipo_licencia_de_conducir: <input type='text' name='tipo_licencia_de_conducir' class='form-control' value='".$chofer['tipo_licencia_de_conducir']."'><br>
		 <input type='text' name='alterar' class='hidden' value='a'>
		 </div>
		 <div class='form-group col-sm-offset-3 col-sm-6''>
		 <button type='submit' class='btn btn-primary'>Modificar</button>
		 <a href='abmChofer.php'><button type='submit' class='btn btn-danger'>Regresar</button></a>
		 </tr>
		 </div>
  		 </form>";
	}
   	?>
</div>