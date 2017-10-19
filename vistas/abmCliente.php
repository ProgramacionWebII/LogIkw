<?php
	include "../modelo/include.php";
	session_start();
	$query = "SELECT * FROM administrador";

	$resultado = Conexion::getQuery($query);
	while($admin = mysqli_fetch_assoc($resultado)){
		if($_SESSION['administrador'] == $admin['id']){

		$query1 = "SELECT * FROM cliente";
		$resultado1 = Conexion::getQuery($query1);

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
		<li><a href=""><span class="glyphicon glyphicon-log-in" ></span> Bienvenido <?php echo $admin['nombre'] ?></a></li>
	</ul>
</nav>
  

<div class="col-sm-10 col-sm-offset-1">
  <h2>Administrador de usuarios</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Rol</th>
        <th>Nombre</th>
        <th>Datos adicionales</th>
		<th><button type='button'  class='btn btn-success' data-toggle='modal' data-target='#agregarCliente'>Agregar</button></th>;

      </tr>
    </thead>
    <tbody>
   	<?php
	while($cliente = mysqli_fetch_assoc($resultado1)){
		echo "<tr>";
		echo "<td>".$cliente['rol']."</td>";
		echo "<td>".$cliente['razon_social']."</td>";
		echo "<td>"."Responsable: ".$cliente['nombre']."</td>";
		echo "<td><button type='button'  class='btn btn-primary'>Modificar</button></td>";
		echo "<td><button type='button'  class='btn btn-danger'>Eliminar</button></td>";
		echo "</tr>";
	}
   	?>
    </tbody>
  </table>
</div>

<!-- Footer -->
	<footer class="footer-distributed col-sm-12">

			<div class="footer-left">

				<h3>MS Logistica</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">La Empresa</a>
					·
					<a href="#">Servicios</a>
					·
					<a href="#">Contacto</a>
					
				
				</p>

			
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Av.Cuenca 412</span>, Buenos Aires, Argentina</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p> +54 011 4852-4454</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:mslogistica@empresa.com.ar">mslogistica@empresa.com.ar</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>
			
			

				<p class="glyphicon glyphicon-envelope">Contáctenos</p>

				<form action="#" method="post">

					<input type="text" name="email" placeholder="Email" required /> <br><br>
					<textarea name="message" placeholder="Mensaje" required></textarea>
					<br><button class="btn btn-primary">Send</button>

				</form>
			

		</footer>
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
	        <h2 class="modal-title" id="exampleModalLabel">Seleccion</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
   	        <input type="text" name="razonSocial" class="col-sm-10 col-sm-offset-1" placeholder="Razón social"><br>
	        <input type="text" name="nombre" class="col-sm-10 col-sm-offset-1" placeholder="Nombre">
	        <input type="text" name="telefono" class="col-sm-10 col-sm-offset-1" placeholder="Telefono"><br>
	        <input type="text" name="domicilio" class="col-sm-10 col-sm-offset-1" placeholder="Domicilio"><br>
	        <input type="email" name="email" class="col-sm-10 col-sm-offset-1" placeholder="email"><br>
	      </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Delogearse">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>

	<!-- Modal Empresa-->
    <form action="../modelo/abm.php" method="POST">
	<div class="modal fade" id="agregarEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header col-sm-12">
	        <h2 class="modal-title" id="exampleModalLabel">Seleccion</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
		        <input type="text" name="nombre" class="col-sm-10 col-sm-offset-1" placeholder="Nombre">
	        <input type="text" name="telefono" class="col-sm-10 col-sm-offset-1" placeholder="Telefono"><br>
	        <input type="text" name="domicilio" class="col-sm-10 col-sm-offset-1" placeholder="Domicilio"><br>
	       </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Delogearse">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>

	<!-- Modal Chofer-->
    <form action="../modelo/abm.php" method="POST">
	<div class="modal fade" id="agregarChofer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header col-sm-12">
	        <h2 class="modal-title" id="exampleModalLabel">Seleccion</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
   	        <input type="text" name="dni" class="col-sm-10 col-sm-offset-1" placeholder="DNI"><br>
   	        <input type="text" name="nombre" class="col-sm-10 col-sm-offset-1" placeholder="Nombre"><br>
	        <input type="text" name="apellido" class="col-sm-10 col-sm-offset-1" placeholder="Apellido">
	        <input type="text" name="fechaNac" class="col-sm-10 col-sm-offset-1" placeholder="Fecha de nacimiento"><br>
	        <input type="text" name="tipoLicencia" class="col-sm-10 col-sm-offset-1" placeholder="Tipo de licencia">
	       </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Delogearse">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>

	<!-- Modal Mecanico-->
    <form action="../modelo/abm.php" method="POST">
	<div class="modal fade" id="agregarMecanico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header col-sm-12">
	        <h2 class="modal-title" id="exampleModalLabel">Seleccion</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
   	        <input type="text" name="dni" class="col-sm-10 col-sm-offset-1" placeholder="dni"><br>
	        <input type="text" name="nombre" class="col-sm-10 col-sm-offset-1" placeholder="Nombre"><br>
	        <input type="text" name="apellido" class="col-sm-10 col-sm-offset-1" placeholder="apellido">
	       </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Delogearse">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>

</body>
</body>
</html>

<?php }

}
header("Location: ../index.php");


?>