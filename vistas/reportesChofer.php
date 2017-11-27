<?php 
	session_start();

	/* Compruebo que la session "chofer" esté viva
	En caso de estar viva, hago las declaraciones correspondientes para trabajar.
	Caso contrario, redirijo al index impidiendo mostrar cualquier cosa */

	if(isset($_SESSION['chofer'])){
		include "../modelo/include.php";
		$query = Chofer::getAllForId($_SESSION['chofer']);

		$resultado = Conexion::getQuery($query);
		$chofer = mysqli_fetch_assoc($resultado);
		
		
	}
	else{
		
	$variable=$_GET['id_viaje'];	
	header("Location: ../index.php?id_viaje=$variable");}
	
	$variable=$_GET['id_viaje'];
	/*if(isset ($_GET['id_viaje']))
	{$variable=$_GET['id_viaje'];}
	//echo $variable;}
	else{$variable=0;}*/
?>

<!DOCTYPE html>
<html>
<head>
  <title>MS Logistica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid col-sm-12">
    <div class="navbar-header col-sm-1">
     <img src="../image/logo.png">
    </div>
    <ul class="nav navbar-nav col-sm-4">
	 
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""><span class="glyphicon glyphicon-user" ></span> Bienvenido <?php echo $chofer['nombre'] ?></a></li>
	</ul>
	
</nav>
  

<div class="col-sm-8 col-sm-offset-2">
	<div class="col-sm-12">		
		<H2 class="col-sm-offset-2 col-sm-8">Seleccione el tipo de reporte a realizar</H2>
	</div>  
	<div class="col-sm-12">
	<button type='button'  class='btn btn-primary col-sm-4' data-toggle='modal' data-target='#posicion' onclick="getLocation()">POSICION</button>
	<button type='button'  class='btn btn-danger col-sm-4' data-toggle='modal' data-target='#incidente'>INCIDENTE</button>
	<button type='button'  class='btn btn-success col-sm-4' data-toggle='modal' data-target='#cargaDeCombustible'>CARGA DE COMBUSTIBLE</button>
	</div>
</div>
<br>	
<br>	
<br>	
<br>	
<br>	
<br>	
<br>	
<br>	
<br>	
<br>	
<br>	
<br>	
<br>	
<div class="panel panel-success">
  <div class="panel-heading text-center"><h2>CONTACTO</h2></div>
</div>
		
<!-- Footer -->


<footer class="footer-distributed ">
	<div class="container">
    	<div class="row">
      		<div class="col-sm-5 col-sm-offset-1">
	
				<h3>MS Logistica</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>  ·
					<a href="#">La Empresa</a> ·
					<a href="#">Servicios</a> ·
					<a href="#">Contacto</a>
				</p>
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

				<p class="footer-company-about">
					<span>About the company</span>
					Todos los derechos reservados
				</p>

				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>
				</div>
			</div>      
	  
	  
	<form class="col-sm-5" action="#" method="post">
  		<div class="form-group" >
    		<label for="exampleInputEmail1">Email:</label>
    		<input type="email" class="form-control" placeholder="Enter email"> 
  		</div>
    	<div class="form-group">
 			<label for="exampleMessage">Mensaje:</label>
    		<textarea  class="form-control"  placeholder="Mensaje"></textarea>
    	</div>
 
  		<button type="submit" class="btn btn-primary">Enviar</button>
	</form>
</footer>
	
	<!-- Modal de POSICION-->
	  <form action="../modelo/agregar_reporte.php" method="POST" id="demo">
	<div class="modal fade" id="posicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLabel">¿Desea enviar su posición?</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
   	        <input type="text" name="latitud" id="lat" class="form-control col-sm-6 hidden" placeholder="latitud" required><br>
	        <input type="text" name="longitud" id="long" class="form-control col-sm-6 hidden" placeholder="longitud" required>
	        <input type="text" name="tipo_reporte" value="posicion" class="hidden">
       		<input type='text' name='variable' class='hidden' value="<?php echo $variable; ?>">
	      
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Enviar">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>
	
	
	<!-- Modal de INCIDENTE-->
	  <form action="../modelo/agregar_reporte.php" method="POST">
	<div class="modal fade" id="incidente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLabel">Reportar Incidente</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
		  <input type="date" name="fecha" class="form-control col-sm-6" placeholder="fecha" required><br>
   	        <input type="text" name="incidente" class="form-control col-sm-6" placeholder="descripcion" required><br>
	            <input type="text" name="tipo_reporte" value="incidente" class="hidden">
					       		<input type='text' name='variable' class='hidden' value="<?php echo $variable; ?>">
	      </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Cargar">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>
	
	
	<!-- Modal de cargaDeCombustible-->
	  <form action="../modelo/agregar_reporte.php" method="POST">
	<div class="modal fade" id="cargaDeCombustible" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content col-sm-12">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLabel">Carga De Combustible</h2>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        </button>
	      </div>
	      <div class="modal-body col-sm-12">
		       <input type="date" name="fecha" class="form-control col-sm-6" placeholder="Fecha" required><br>
   	        <input type="text" name="ubicacion" class="form-control col-sm-6" placeholder="Lugar" required><br>
	        <input type="text" name="combustible_cargado" class="form-control col-sm-6" placeholder="Cantidad De Litros" required><br>
	       <input type="text" name="importe_combustible" class="form-control col-sm-6" placeholder="importe" required><br>
		   <input type="text" name="km_unidad" class="form-control col-sm-6" placeholder="Km de la unidad" required><br>
		         <input type="text" name="tipo_reporte" value="combustible" class="hidden">
	  			       		<input type='text' name='variable' class='hidden' value="<?php echo $variable; ?>">
	      </div>
	      <div class="modal-footer col-sm-12">
	        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
	        <input type="submit" class="btn btn-primary" value="Cargar">
	      </div>
	    </div>
	  </div>
	</div>
   	</form>
	

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
	        <input type="submit" class="btn btn-primary" value="Logearse">
	      </div>
	    </div>
	  </div>
	</div>
	</form>
	
<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
	
	$("#lat").attr({value: position.coords.latitude});
	$("#long").attr({value: position.coords.longitude});
}

</script>	

</body>
</html>