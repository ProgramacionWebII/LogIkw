<?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Viaje::getAll();
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
		<li><a href=" <?php echo 'abmChofer.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Chofer</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=" <?php echo 'abmMecanico.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Mecanico</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li class="active"><a href=" <?php echo 'abmViajes.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Viajes</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""><span class="glyphicon glyphicon-user" ></span> Bienvenido <?php echo $admin['nombre'] ?></a></li>
	</ul>
	</div>
</nav>
  

<div class="col-sm-10 col-sm-offset-1">
  <h2>Administrador de viajes</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Origen</th>
        <th>Destino</th>
        <th>Admin Responsable</th>
        <th>Chofer Responsable</th>
		<th><button type='button'  class='btn btn-success' data-toggle='modal' data-target='#agregarViaje'>Agregar</button></th>

      </tr>
    </thead>
    <tbody>
   	<?php
	while($viaje = mysqli_fetch_assoc($resultado1)){

		$buscarIdAdmin = Administrador::getAllForId($viaje['id_administrador']);
		$admin = Conexion::getQuery($buscarIdAdmin);
		$resultado = mysqli_fetch_assoc($admin);
		$buscarIdChofer = Chofer::getAllForId($viaje['id_chofer']);
		$chofer = Conexion::getQuery($buscarIdChofer);
		$resultado2 = mysqli_fetch_assoc($chofer);
		echo "<form method='POST' action='../../modelo/ejecutarAbmViajes.php'>
		 <tr>
		 <td>".$viaje['origen']."</td>
		 <td>".$viaje['destino']."</td>
		 <td>".$resultado['nombre']."</td>
		 <td>".$resultado2['nombre']."</td>

		 <input type='text' name='id' class='hidden' value='".$viaje['id']."'>

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
    <form action="../../modelo/ejecutarAbmViajes.php" method="POST">
	<div class="modal fade" id="agregarViaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLabel">Alta nuevo Viaje</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
	      	<label class='col-sm-6'>Chofer:</label><br>
	      	<select class='col-sm-6 form-control' name='id_chofer'>
	      	<?php
			$buscarIdChoferes = Chofer::getAll();
			$chofer = Conexion::getQuery($buscarIdChoferes);
			while($resultado3 = mysqli_fetch_assoc($chofer)){

			echo "<label>Chofer:</label>";
			echo "<option name ='id_chofer' value = '".$resultado3['id']."'>";
			echo $resultado3['nombre'];
			echo "</option>";
			}
   	        ?>
   	        </select>

	      	<label class='col-sm-6'>Administrador:</label><br>
	      	<select class='col-sm-6 form-control' name='id_administrador'>
	      	<?php
			$query3 = Administrador::getAllForId($_SESSION['administrador']);

			$resultado4 = Conexion::getQuery($query3);
			while($admin3 = mysqli_fetch_assoc($resultado4)){

			echo "<label>Chofer:</label>";
			echo "<option name ='id_chofer' value = '".$admin3['id']."'>";
			echo $admin3['nombre'];
			echo "</option>";
			}
   	        ?>
   	        </select>
	        <input type="text" name="origen" class="col-sm-6 form-control" placeholder="origen" required>
	        <input type="text" name="destino" class="col-sm-6 form-control" placeholder="destino" required><br>
	        <input type="text" name="tipo_de_carga" class="col-sm-6 form-control" placeholder="tipo_de_carga" required><br>
	        <input type="date" name="fecha_de_salida_prevista" class="col-sm-6 form-control" placeholder="fecha_de_salida_prevista" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"><br>
			<input type="date" name="fecha_de_llegada_prevista" class="col-sm-6 form-control" placeholder="fecha_de_llegada_prevista" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"><br>
			<input type="text" name="tiempo_estimado" class="col-sm-6 form-control" placeholder="tiempo_estimado" required><br>
	        <input type="date" name="fecha_de_salida_real" class="col-sm-6 form-control" placeholder="fecha_de_salida_real" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
	        <input type="date" name="fecha_de_llegada_real" class="col-sm-6 form-control" placeholder="fecha_de_llegada_real" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"><br>
	        <input type="text" name="tiempo_real" class="col-sm-6 form-control" placeholder="tiempo_real" required><br>
	        <input type="text" name="km_recorridos_previstos" class="col-sm-6 form-control" placeholder="km_recorridos_previstos" required><br>
			<input type="text" name="desviacion_km" class="col-sm-6 form-control" placeholder="desviacion_km" required><br>
	        <input type="text" name="combustible_consumido_estimado" class="col-sm-6 form-control" placeholder="combustible_consumido_estimado" required>
	        <input type="text" name="combustible_consumido_real" class="col-sm-6 form-control" placeholder="combustible_consumido_real" required><br>
	       
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