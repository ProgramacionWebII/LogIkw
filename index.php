<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logística LogIkw</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">LogIkw</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	      <li><a href="#">Page 1</a></li>
	      <li><a href="#">Page 2</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="#"  data-toggle="modal" data-target="#registro"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
	    </ul>
	  </div>
	</nav>

	<header class="col-sm-offset-2 col-sm-8">
		<h1 class="col-sm-offset-4 col-sm-4">LogIkw</h1>
		<h3 class="col-sm-offset-4 col-sm-4">Logística de primer nivel</h3>		
	</header>

	<section class="col-sm-12">
		<div class="col-sm-12 beneficios">
			<h3>Beneficios LogIkw</h3>
			<div class="col-sm-4">
				<h3>Geolocalizacion<img src="image/geo-icon.png"></h3>
			</div>
			<div class="col-sm-4">
				<h3>Gestion de carga<img src="image/gestion-icon.png"></h3>
			</div>
			<div class="col-sm-4">
				<h3>Reputacion de usuario <img src="image/users-icon.png"></h3>
			</div>
		</div>

		<div>
		<img src="image/camion.jpg">
		<img src="image/camion2.jpg">
		</div>
	</section>

	<!-- Modal -->
	<form action="/registro">
	<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <input type="text" name="nombre" placeholder="Juan Roman"><br>
	        <input type="text" name="apellido" placeholder="Fernandez"><br>
	        <input type="text" name="DNI" placeholder="12345678"><br>
	        <input type="text" name="Razon Social" placeholder="Sociedad Log S.A"><br>
	        <input type="text" name="Usuario" placeholder="socsa1234"><br>
	        <input type="text" name="Password1" placeholder="**********"><br>
	        <input type="text" name="Password2" placeholder="**********">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
	</form>

		<!-- Modal -->
	<form action="/Login">
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <input type="text" name="Usuario" placeholder="socsa1234"><br>
	        <input type="text" name="Password1" placeholder="**********">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
	</form>
</body>
</html>