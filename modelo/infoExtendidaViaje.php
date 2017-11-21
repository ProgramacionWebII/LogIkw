<?php

	include "include.php";

	$id_viaje = $_REQUEST['id'];

	$query = Viaje::getAllTableOnViaje($id_viaje);
	$resultado = Conexion::getQuery($query);

	$viaje = mysqli_fetch_assoc($resultado);

	$var1 =  	    "<thead>
				      <tr>
				        <th>Responsable alta</th>
				        <th>Chofer</th>
				        <th>Origen - destino</th>
				        <th>Tipo de carga</th>
				      </tr>
				    </thead>";
	
	$var2 = "<tbody>
				<tr>
					<td>".$viaje['nombreAdmin']." ".$viaje['apellidoAdmin']."</td>
					<td>".$viaje['nombreChofer']." ".$viaje['apellidoChofer']."</td>
			    	<td>".$viaje['origen']." - ".$viaje['destino']."</td>
					<td>".$viaje['tipo_de_carga']."</td>
				</tr>
			</tbody><th><th><th>";

	$var3 =  	    "<thead>
				      <tr>
				        <th>Fechas previstas</th>
				        <th>Tiempo Estimado</th>
				        <th>Combustible Estimado</th>
				        <th>Km Estimado</th>
				      </tr>
				    </thead>";

	$var4 = "<tbody>
				<tr>
					<td>".$viaje['fecha_de_salida_prevista']." ".$viaje['fecha_de_llegada_prevista']."</td>
					<td>".$viaje['tiempo_estimado']." "."HS"."</td>
			    	<td>".$viaje['combustible_consumido_estimado']."</td>
					<td>".$viaje['km_recorridos_previstos']."</td>
				</tr>
			</tbody><th><th><th>";

	$var5 =  	    "<thead>
				      <tr>
				        <th>Fecha y hora de ultima actualización</th>
				        <th>Ubicacion</th>
				      </tr>
				    </thead>";

	$var6 = "<tbody>
				<tr>
					<td>".$viaje['fecha']."</td>
					<td id='latitud'>".$viaje['latitud']."</td>
					<td id='longitud'>".$viaje['longitud']."</td>
					<td id='mapa'style='width:500px; height:400px;'></td>
				</tr>
			</tbody>";

	echo $var1.$var2.$var3.$var4.$var5.$var6;
?>