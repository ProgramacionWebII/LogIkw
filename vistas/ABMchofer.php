<?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Chofer::getAll();
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
  <script type="text/javascript" src="../js/abm.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid col-sm-12">
    <div class="navbar-header col-sm-1">
     <img src="../image/logo.png">
    </div>
    <ul class="nav navbar-nav col-sm-6">
      <li class="active"><a href="#">HOME</a></li>
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
  <h2>Administrador de choferes</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Rol</th>
        <th>Nombre</th>
        <th>Datos adicionales</th>
		<th><button type='button'  class='btn btn-success' data-toggle='modal' data-target='#agregarChofer'>Agregar</button></th>

      </tr>
    </thead>
    <tbody>
   	<?php
	while($chofer = mysqli_fetch_assoc($resultado1)){
		echo "<form method='POST' action='../modelo/ejecutarAbmchofer.php'>";
		echo "<tr>";
		echo "<td>".$chofer['rol']."</td>";
		echo "<td>".$chofer['nombre']."</td>";
		echo "<td>"."Licencia: ".$chofer['tipo_licencia_de_conducir']."</td>";

		echo "<input type='text' name='id' class='hidden' value='".$chofer['id']."'>";

		echo "<td><button type='submit' id='modificar' name='alterar' class='btn btn-primary' value='modificar' onclick='modificar()'>Modificar</button></td>";

		echo "<td><button type='submit'  id='eliminar' name='alterar' class='btn btn-danger' value='eliminar' onclick='eliminar()'>Eliminar</button></td>";

		echo "</tr>";
  		echo "</form>";
	}
   	?>
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

	<!-- Modales de agregar-->
    <form action="../modelo/ejecutarAbmchofer.php" method="POST">
	<div class="modal fade" id="agregarChofer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header col-sm-12">
	        <h2 class="modal-title" id="exampleModalLabel">Alta nuevo Chofer</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
   	        <input type="text" name="dni_chofer" class="col-sm-10 col-sm-offset-1" placeholder="DNI" required><br>
	        <input type="text" name="nombre" class="col-sm-10 col-sm-offset-1" placeholder="NOMBRE" required><br>
	        <input type="text" name="apellido" class="col-sm-10 col-sm-offset-1" placeholder="APELLIDO" required><br>
	        <input type="text" name="fecha_de_nacimiento" class="col-sm-10 col-sm-offset-1" placeholder="FECHA DE NACIMIENTO" required><br>
			 <input type="text" name="tipo_licencia_de_conducir" class="col-sm-10 col-sm-offset-1" placeholder="Tipo de licencia de conducir" required><br>
	      </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Cargar">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>
</body>
</html>