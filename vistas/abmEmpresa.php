<?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "../modelo/include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		$query1 = Empresa::getAll();
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
	<div class="col-sm-12">
    <div class="navbar-header col-sm-1">
     <img src="../image/logo.png">
    </div>
    <ul class="nav navbar-nav col-sm-4">
        <li><a href="<?php echo "adminLogeado.php";?>">Home</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-new-window" ></span> Logout</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=" <?php echo 'abmCliente.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Cliente</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li class="active"><a href=" <?php echo 'abmEmpresa.php'; ?>"><span class="glyphicon glyphicon-list-alt"></span> Empresa</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=" <?php echo 'abmChofer.php'; ?>"><span class="glyphicon glyphicon-list-alt" ></span> Chofer</a></li>
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
  <h2>Administrador de empresas</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Rol</th>
        <th>Nombre</th>
        <th>Datos adicionales</th>
		<th><button type='button'  class='btn btn-success' data-toggle='modal' data-target='#agregarEmpresa'>Agregar</button></th>

      </tr>
    </thead>
    <tbody>
   	<?php
	while($empresa = mysqli_fetch_assoc($resultado1)){
		echo "<form method='POST' action='../modelo/ejecutarAbmEmpresa.php'>
		 <tr>
		 <td>".$empresa['rol']."</td>
		 <td>".$empresa['nombre']."</td>
		 <td>"."Responsable: ".$empresa['telefono']."</td>

		 <input type='text' name='id' class='hidden' value='".$empresa['id']."'>

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

	<!-- Modal de agregar-->
    <form action="../modelo/ejecutarAbmEmpresa.php" method="POST">
	<div class="modal fade" id="agregarEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLabel">Alta nueva Empresa</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
	        <input type="text" name="nombre" class="col-sm-6 form-control" placeholder="Nombre" required>
	        <input type="text" name="telefono" class="col-sm-6 form-control" placeholder="Telefono" required><br>
	        <input type="text" name="domicilio" class="col-sm-6 form-control" placeholder="Domicilio" required><br>

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