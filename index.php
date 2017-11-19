<!DOCTYPE html>

<html>
<head>
  <title>MS Logistica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  	<div class="col-sm-12">
  	<div class="container-fluid">
	    <div class="navbar-header col-sm-1">
	     <img src="image/logo.png">
	    </div>
	    <ul class="nav navbar-nav col-sm-4">
	      <li class="active"><a href="index.php">HOME</a></li>
		  <li><a href="#">LA EMPRESA</a></li>
	      <li><a href="#">SERVICIOS</a></li>
	      <li><a href="#">CONTACTO</a></li>
	    </ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a data-toggle="modal" data-target="#login" href=""><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
		</ul>
  	</div>
  	</div>
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
      <img src="image/1.jpg" width="100%">
    </div>

    <div class="item">
      <img src="image/2.jpg" width="100%" >
    </div>

    <div class="item">
      <img src="image/3.jpg" width="100%">
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
<br>

<div class="panel panel-success">
    <div class="panel-heading text-center">
    	<h2>SERVICIOS</h2>
    </div>
	<div class="panel-body">	  
		<div class="container-fluid col-sm-12">    

				<div class="col-sm-10 col-sm-offset-1">

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-sm-3">
							<img src="image/caja.png" class="img-responsive margin" alt="Image">
							<br><p>Depósito Central con playón exclusivo para la recepción de carga</p>
						</div>
						<div class="col-sm-3"> 
							<img src="image/cajas.png" class="img-responsive margin"  alt="Image">
							<br> <p>Preparación de pedidos para despachos a todo el país</p>
						</div>
					    <div class="col-sm-3"> 
						    <img src="image/camion2.png" class="img-responsive margin" alt="Image">
							<br><p>Entregas en Capital y GBA con móviles exclusivos. Envíos a todo el País a través de Expresos de primera línea.</p>
					    </div>		
					    <div class="col-sm-3"> 
					    	<img src="image/auriculares.png" class="img-responsive margin" alt="Image">
							<br> <p>Ejecutivos de cuenta en constante comunicación con cada cliente.</p>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		
<div class="panel panel-success">
  <div class="panel-heading text-center"><h2>CONTACTO</h2></div>
</div>
		
<!-- Footer -->


<footer class="footer-distributed ">
	<div class="container">
    	<div class="row">
      		<div class="col-lg-5 col-sm-offset-1">
	
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
	  
	  
	<form class="col-lg-5" action="#" method="post">
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


	<!-- Modal -->
	<form action="modelo/login.php" method="POST">
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content col-sm-12">
		      <div class="modal-header">
		        <h2 class="modal-title" id="exampleModalLabel">Login</h2>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body col-sm-12">
		        <input type="text" name="usuario" class="col-sm-6 form-control" placeholder="Usuario o DNI" required>
		        <br>
		        <input type="password" name="password" class="col-sm-6 form-control" placeholder="**********" required>
		      </div>
		      <div class="modal-footer col-sm-12">
		        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
		        <input type="submit" class="btn btn-primary" value="Logearse">
		      </div>
		    </div>
		  </div>
		</div>
	</form>
</body>
</html>