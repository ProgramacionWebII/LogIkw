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
	$i=0;
	while($viajes = mysqli_fetch_assoc($resultado1)){
				

		 $ids_viajes[$i]=	$viajes['id'];
		 $km_previstos[$i]=	$viajes['km_recorridos_previstos'];
		 $km_reales[$i]=	$viajes['km_recorridos_reales'];
$i++;

	}
?>

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
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
     google.charts.load('current', {packages: ['corechart']});     
   </script>
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
		  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Salir
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
		
				<li class="divider"></li>
				<li><a href=""  data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-new-window" ></span> Logout</a></li>
		  </ul>
		</ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href=""><span class="glyphicon glyphicon-user" ></span>Bienvenido <?php echo $admin['nombre'] ?></a></li>
	    </ul>
	</div>
</nav>

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


<div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>

<script language="JavaScript">
function drawChart() {
	
	 var viajes=<?php echo json_encode($ids_viajes);?>;
	 var km_previstos=<?php echo json_encode($km_previstos);?>;
	 var km_reales=<?php echo json_encode($km_reales);?>;

	 
	 var data = new google.visualization.DataTable();
 
      data.addColumn('number', 'Viaje');
      data.addColumn('number', 'Km Previstos');
	  data.addColumn('number', 'Km Reales');

	var	tam = viajes.length;
	
      for(var i = 0; i < tam ; i++) {
        data.addRow([parseInt(viajes[i]), parseInt(km_previstos[i]), parseInt(km_reales[i])])
      }

 
   // Set chart options
   var options = {
      title : 'Desviacion Km por Viaje',
      vAxis: {title: 'Km'},
      hAxis: {title: 'Viaje'},
      seriesType: 'bars',
      series: {2: {type: 'line'}}
   };

   // Instantiate and draw the chart.
   var chart = new google.visualization.ColumnChart(document.getElementById('container'));
   chart.draw(data, options);
}
google.charts.setOnLoadCallback(drawChart);
</script>
</body>
</html>