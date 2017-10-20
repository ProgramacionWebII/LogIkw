<?php 
	session_start();

	/* Compruebo que la session "administrador" esté viva
	En caso de estar viva, hago las declaraciones correspondientes para trabajar.
	Caso contrario, redirijo al index impidiendo mostrar cualquier cosa */

	if(isset($_SESSION['administrador'])){
		include "../modelo/include.php";
		$query = Administrador::getAll($_SESSION['administrador']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
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
	  <li><a href="#">LA EMPRESA</a></li>
      <li><a href="#">SERVICIOS</a></li>
      <li><a href="#">CONTACTO</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=" <?php echo 'abmCliente.php'; ?>"><span class="glyphicon glyphicon-log-in" ></span> Sección ABM</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""><span class="glyphicon glyphicon-log-in" ></span> Bienvenido <?php echo $admin['nombre'] ?></a></li>
	</ul>
</nav>
  
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="../image/1.jpg" width="100%">
    </div>

    <div class="item">
      <img src="../image/2.jpg" width="100%" >
    </div>

    <div class="item">
      <img src="../image/3.jpg" width="100%">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--  Container (Grid) -->
<div class="container-fluid col-sm-12">    
  <h3 class="margin col-sm-2 col-sm-offset-5">SERVICIOS</h3><br>
  <div class="col-sm-10 col-sm-offset-1">
    <div class="col-sm-3">

      <img src="../image/caja.png" class="img-responsive margin" alt="Image">
	        <br><p>Depósito Central con playón exclusivo para la recepción de carga</p>
    </div>
    <div class="col-sm-3"> 

      <img src="../image/cajas.png" class="img-responsive margin"  alt="Image">
	       <br> <p>Preparación de pedidos para despachos a todo el país</p>
    </div>
    <div class="col-sm-3"> 
      
      <img src="../image/camion2.png" class="img-responsive margin" alt="Image">
	        <br><p>Entregas en Capital y GBA con móviles exclusivos. Envíos a todo el País a través de Expresos de primera línea.</p>
    </div>
	
	<div class="col-sm-3"> 
      
      <img src="../image/auriculares.png" class="img-responsive margin" alt="Image">
	       <br> <p>Ejecutivos de cuenta en constante comunicación con cada cliente.</p>
    </div>
  </div>
</div>
<!-- Footer -->
	<footer class="footer-distributed">

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
</body>
</html>