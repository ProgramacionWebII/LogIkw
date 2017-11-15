<?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Chofer::getAll();
		$resultado1 = Conexion::getQuery($query1);
	}
	else{		
		header("Location: ....//index.php");
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
  <script type="text/javascript" src="../../js/abm.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="col-sm-12">
    <div class="navbar-header col-sm-1">
     <img src="../../image/logo.png">
    </div>
     <ul class="nav navbar-nav col-sm-4">
        <li><a href="<?php echo "../adminLogeado.php";?>">Home</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-new-window" ></span> Logout</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=" <?php echo 'abmCliente.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Cliente</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=" <?php echo 'abmEmpresa.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Empresa</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li class="active"><a href=" <?php echo 'abmChofer.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Chofer</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=" <?php echo 'abmMecanico.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Mecanico</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=" <?php echo 'abmViajes.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Viajes</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""><span class="glyphicon glyphicon-user" ></span> Bienvenido <?php echo $admin['nombre'] ?></a></li>
	</ul>
	</div>
</nav>
  

<div class="col-sm-10 col-sm-offset-1">
  <h2>Administrador de choferes</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
	     <th>Nombre</th>
        <th>DNI</th>
        <th>Telefono</th>
		<th><button type='button'  class='btn btn-success' data-toggle='modal' data-target='#agregarChofer'>Agregar</button></th>

      </tr>
    </thead>
    <tbody>
   	<?php
	while($chofer = mysqli_fetch_assoc($resultado1)){
		echo "<form method='POST' action='../../modelo/ejecutarAbmChofer.php'>
		 <tr>
		 <td>".$chofer['nombre']."</td>
		 <td>".$chofer['dni_chofer']."</td>
		 <td>".$chofer['telefono']."</td>

		 <input type='text' name='id' class='hidden' value='".$chofer['id']."'>

		 <td><button type='submit' id='modificar' onclick= 'modificar()' name='alterar' value='modificar' class='btn btn-primary'>Modificar</button></td>

		 <td><button type='submit' id='eliminar' onclick= 'eliminar()' name='alterar' value='eliminar' class='btn btn-danger'>Eliminar</button></td>

		 </tr>
  		 </form>";
	}
   	?>
    </tbody>
  </table>
</div>


	<!-- Modal logout-->
	<form action="../../modelo/logout.php" method="POST">
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

	<!-- Modal de agregar-->
    <form action="../../modelo/ejecutarAbmChofer.php" method="POST">
	<div class="modal fade" id="agregarChofer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLabel">Alta nuevo Chofer</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
   	        <input type="text" name="dni_chofer" class="form-control col-sm-6" placeholder="Dni" required><br>
	        <input type="text" name="nombre" class="form-control col-sm-6" placeholder="Nombre y apellido" required>
	        <input type="text" name="usuario" class="form-control col-sm-6" placeholder="usuario" required>
	        <input type="text" name="telefono" class="form-control col-sm-6" placeholder="Telefono" required><br>
	        <input type="date" name="fecha_de_nacimiento" class="form-control col-sm-6" placeholder="Fecha de nacimiento" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"><br>
	        <input type="text" name="tipo_licencia_de_conducir" class="form-control col-sm-6" placeholder="Tipo licencia de conducir" required><br>
	        <input type="text" name="alterar" value="agregar" class="hidden">
	      </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Cargar">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>
</body>
</html>