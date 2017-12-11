<?php
require "dompdf/dompdf_config.inc.php";
include 'include.php';


$html = "<html><head><link type='text/css' href='style.css' rel='stylesheet' /></head><body><center>";
$html .=  "<H3>REPORTE DE VEHICULOS</H3>";
$html .=  "<table id='customers'>";
$html .=  "<tr>";
$html .=  "<th>Id vehiculo</th>";
$html .=  "<th>Viajes realizados</th>";
$html .=  "<th>Km totales recorridos</th>";
$html .=  "<th>Horas de servicio</th>";
$html .=  "<th>Costo mantenimiento $</th>";
$html .=  "<th>Costo por Km $ </th>";

$html .=  "</tr>";

	$con = Conexion::conectar();
	$query = "SELECT v.id_vehiculo, count(DISTINCT v.id)as viajes , SUM(DISTINCT v.km_recorridos_previstos) as km, SUM(DISTINCT v.tiempo_estimado)as tm , SUM(DISTINCT m.costo)as c , SUM(DISTINCT m.costo)/SUM(DISTINCT v.km_recorridos_previstos) as ckm FROM viaje v INNER JOIN mantenimiento m on v.id_vehiculo=m.id_vehiculo group by id_vehiculo";
	$var = Conexion::getQuery($query);
	
	while($fila = mysqli_fetch_assoc($var)){
    $html .=  "<tr>";
    $html .=  "<td>" . $fila["id_vehiculo"]. "</td>";
	$html .=  "<td>" . $fila["viajes"]. "</td>";
    $html .=  "<td>" . $fila["km"]. "</td>";
	$html .=  "<td>" . $fila["tm"]. "</td>";
	$html .=  "<td>" . $fila["c"]. "</td>";
	$html .=  "<td>" . $fila["ckm"]. "</td>";
	
    $html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "portait");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->set_base_path("style.css");
$mipdf->stream("ListaReporteVehiculos.pdf", array("Attachment" => false))


?>
