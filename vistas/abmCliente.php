<?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Cliente::getAll();
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
  <h2>Administrador de usuarios</h2>
  <form method="POST" action="../modelo/abm.php">
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Rol</th>
        <th>Nombre</th>
        <th>Datos adicionales</th>
		<th><button type='button'  class='btn btn-success' data-toggle='modal' data-target='#agregarCliente'>Agregar</button></th>

      </tr>
    </thead>
    <tbody>
   	<?php
	while($cliente = mysqli_fetch_assoc($resultado1)){
		echo "<tr>";
		echo "<td>".$cliente['rol']."</td>";
		echo "<td>".$cliente['razon_social']."</td>";
		echo "<td>"."Responsable: ".$cliente['nombre']."</td>";
		echo "<td><button type='button' class='btn btn-primary' onclick='modificar(" .$cliente['id'].") '>Modificar</button></td>";
		echo "<td><button type='button' class='btn btn-danger' onclick='eliminar(" .$cliente['id'].") '>Eliminar</button></td>";
		echo "</tr>";
	}
   	?>
    </tbody>
  </table>
  </form>
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
    <form action="../modelo/abm.php" method="POST">
	<div class="modal fade" id="agregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header col-sm-12">
	        <h2 class="modal-title" id="exampleModalLabel">Alta nuevo Cliente</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
   	        <input type="text" name="razonSocial" class="col-sm-10 col-sm-offset-1" placeholder="Razón social" required><br>
	        <input type="text" name="nombre" class="col-sm-10 col-sm-offset-1" placeholder="Nombre" required>
	        <input type="text" name="telefono" class="col-sm-10 col-sm-offset-1" placeholder="Telefono" required><br>
	        <input type="text" name="domicilio" class="col-sm-10 col-sm-offset-1" placeholder="Domicilio" required><br>
	        <input type="email" name="email" class="col-sm-10 col-sm-offset-1" placeholder="email" required><br>
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