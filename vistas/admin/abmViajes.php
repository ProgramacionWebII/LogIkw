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
  <h2>Administrador de viajes</h2>
 
  
  <table class="table table-condensed col-sm-12">
    <thead id="headTable">
      <tr>
        <th>Nro Viaje</th>
        <th>Origen - Destino</th>
        <th>Fecha salida</th>
        <th>Fecha llegada</th>
        <th>Responsable de alta</th>
		<th>Codigo Qr</th>
		  <th>Mapa</th>
		<th><button type='button'  class='btn btn-success' data-toggle='modal' data-target='#agregarViaje'>Agregar</button></th>

      </tr>
    </thead>
    <tbody>
   	<?php
	while($viaje = mysqli_fetch_assoc($resultado1)){
		$sqlAdmin = Administrador::getAllForId($viaje['id_administrador']);
		$consultaAdmin = Conexion::getQuery($sqlAdmin);
		$admin = mysqli_fetch_assoc($consultaAdmin);
		echo "<form method='POST' action='../../modelo/ejecutarAbmViajes.php'>
		 <input type='text' name='id' id='idViaje' class='hidden' value='".$viaje['id']."'>
		 <tr id='viajeNro".$viaje['id']."'> 
		 <td>".$viaje['id']."</div></td>
		 <td>".$viaje['origen']." - ".$viaje['destino']."</td>
		 <td>".$viaje['fecha_de_salida_real']."</td>
		 <td>".$viaje['fecha_de_llegada_real']."</td>
		 <td>".$admin['nombre']." ".$admin['apellido']."</td>

		 


		<td><button type='button' onclick='(generarQr())' id='qr' class='btn btn-info btn-md glyphicon glyphicon-qrcode' value='".$viaje['id']."'></button></td>
		  
		 <td><button type='button' onclick='(infoExtendida(".$viaje['id']."))' name='info' class='btn btn-info glyphicon glyphicon-plus-sign'></button></td>

		 <td><button type='submit' id='modificar' onclick= 'modificar()' name='alterar' value='modificar' class='btn btn-primary '>Modificar</button></td>

		 <td><button type='submit' id='eliminar' onclick= 'eliminar()' name='alterar' value='eliminar' class='btn btn-danger'>Eliminar</button></td>

		 </tr>
  		 </form>";
	}
   	?>
    </tbody>
  </table>
  <div ></div>
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
		    <input type="text" name="id_vehiculo" class="col-sm-6 form-control" placeholder="Id vehiculo" required><br>
   	        <input type="text" name="id_administrador" class="col-sm-6 form-control" placeholder="Id administrador" required><br>
	        <input type="text" name="origen" class="col-sm-6 form-control" placeholder="Origen" required>
	        <input type="text" name="destino" class="col-sm-6 form-control" placeholder="Destino" required><br>
	        <input type="text" name="tipo_de_carga" class="col-sm-6 form-control" placeholder="Tipo de carga" required><br>
			
		
	        <input type="text" name="fecha_de_salida_prevista" class="col-sm-6 form-control" 	onfocus="(this.type='date')"  id="date" placeholder="Fecha de salida prevista" required><br>
			<input type="text" name="fecha_de_llegada_prevista" class="col-sm-6 form-control" onfocus="(this.type='date')"  id="date"  placeholder="Fecha de llegada prevista" required><br>
			
			
			<input type="text" name="tiempo_estimado" class="col-sm-6 form-control" placeholder="Tiempo estimado" required><br>
			
			
	        <input type="text" name="fecha_de_salida_real" class="col-sm-6 form-control" onfocus="(this.type='date')"  id="date" placeholder="Fecha de salida real" required>
	        <input type="text" name="fecha_de_llegada_real" class="col-sm-6 form-control" onfocus="(this.type='date')"  id="date" placeholder="Fecha de llegada real" required><br>
			
			
	        <input type="text" name="tiempo_real" class="col-sm-6 form-control" placeholder="Tiempo real" required><br>
	        <input type="text" name="km_recorridos_previstos" class="col-sm-6 form-control" placeholder="Km recorridos previstos" required><br>
			<input type="text" name="km_recorridos_reales" class="col-sm-6 form-control" placeholder="Km recorridos reales" required><br>
	        <input type="text" name="combustible_consumido_estimado" class="col-sm-6 form-control" placeholder="Combustible consumido estimado" required>
	        <input type="text" name="combustible_consumido_real" class="col-sm-6 form-control" placeholder="Combustible consumido real" required><br>

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
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBZGkBOCBsr2y1CWsZdAbgQLp48v081Elk"></script>
<script type="text/javascript" src="../../js/abm.js"></script>
<script type="text/javascript" src="../../js/abmViajes.js"></script>

	<input type="submit"  class='btn btn-primary' value="Listado pdf" onclick = "location='../../modelo/ListadoPdfViajes.php'"/>
</body>
</html>