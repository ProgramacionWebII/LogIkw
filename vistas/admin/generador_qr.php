<?php
	//Agregamos la libreria para genera códigos QR
	require "phpqrcode/qrlib.php";    
	
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'temp/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'imagenQr.png';

        //Parametros de Configuración
	
	
	$tamaño = 10; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	
	$parametro = $_REQUEST['id'];
	
	
	$contenido = "http://localhost/LogIkw/vistas/reportesChofer.php?id_viaje=".$parametro; //Texto
	
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
        //Mostramos la imagen generada

			
	$var = "
	<thead class='col-sm-offset-3 col-sm-6'>
		<tr class='col-sm-offset-3 col-sm-6'>
			<th>Codigo de reporte</th>
		</tr>
	</thead>
	<tbody class='col-sm-offset-3 col-sm-6'>
		<tr>
			<td><img src='".$dir.basename($filename)."'/></td>
		</tr>
		<tr>
			<td><div id='botonRegresar></div></td>
			<td><div id='botonDescargar onclick='(descargar())'></div></td>
		</tr>
	</tbody>
	";
	echo $var;
?>



