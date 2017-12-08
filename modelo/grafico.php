<?php
	session_start();
	if(isset($_SESSION['administrador'])){
		include "include.php";
		$query = Administrador::getAllForId($_SESSION['administrador']);

		$resultado = Conexion::getQuery($query);
		$admin = mysqli_fetch_assoc($resultado);
		
		$query1 = Viaje::getAll();
		$resultado1 = Conexion::getQuery($query1);
	}
	else{		
		header("Location: ....//index.php");
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
<title>Google Charts Tutorial</title>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
     google.charts.load('current', {packages: ['corechart']});     
   </script>
</head>
<body>
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