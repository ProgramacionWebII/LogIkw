<?php
	session_start();
	if(isset($_SESSION['mecanico'])){
		include "../../modelo/include.php";
		$query = Mecanico::getAllForId($_SESSION['mecanico']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Mantenimiento::getAll();
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
        <li><a href="<?php echo "../mecanicoLogeado.php";?>">Home</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-new-window" ></span> Logout</a></li>
	</ul>
	
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""><span class="glyphicon glyphicon-user" ></span> Bienvenido</a></li>
	</ul>
	</div>
</nav>
  

<div class="col-sm-10 col-sm-offset-1">
  <h2>Mantenimiento de vehiculos</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
	     <th>Id empresa-mecanico</th>
        <th>Patente</th>
        <th>N°Chasis</th>
		<th><button type='button'  class='btn btn-success' data-toggle='modal' data-target='#agregarMantenimiento'>Agregar</button></th>

      </tr>
    </thead>
    <tbody>
   	<?php
	while($mantenimiento = mysqli_fetch_assoc($resultado1)){
		echo "<form method='POST' action='../../modelo/ejecutarAbmMantenimiento.php'>
		 <tr>
		 <td>".$mantenimiento['id_empresa']." ".$mantenimiento['id_mecanico']."</td>
		 <td>".$mantenimiento['patente']."</td>
		 <td>".$mantenimiento['nro_chasis']."</td>

		 <input type='text' name='id' class='hidden' value='".$mantenimiento['id']."'>

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
    <form action="../../modelo/ejecutarAbmMantenimiento.php" method="POST">
	<div class="modal fade" id="agregarMantenimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLabel">Alta nuevo Mantenimiento</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
   	        <input type="text" name="id_empresa" class="form-control col-sm-6" placeholder="id_empresa" required><br>
	        <input type="text" name="id_mecanico" class="form-control col-sm-6" placeholder="id_mecanico" required>
	        <input type="text" name="patente" class="form-control col-sm-6" placeholder="patente" required><br>
	        <input type="text" name="nro_chasis" class="form-control col-sm-6" placeholder="nro_chasis" required><br>
	        <input type="text" name="nro_motor" class="form-control col-sm-6" placeholder="nro_motor" required><br>
			<input type="text" name="fecha_service" class="form-control col-sm-6" placeholder="fecha_service" required>
	        <input type="text" name="km_de_la_unidad" class="form-control col-sm-6" placeholder="km_de_la_unidad" required><br>
	        <input type="text" name="costo" class="form-control col-sm-6" placeholder="costo" required><br>
	        <input type="text" name="tipo" class="form-control col-sm-6" placeholder="tipo" required><br>
			<input type="text" name="repuestos_cambiados" class="form-control col-sm-6" placeholder="repuestos_cambiados" required><br>
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