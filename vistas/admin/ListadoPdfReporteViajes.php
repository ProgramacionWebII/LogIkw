<?php
require "../../dompdf/dompdf_config.inc.php";
include '../../modelo/include.php';


$html = "<html><head><link type='text/css' href='style.css' rel='stylesheet' /></head><body><center>";
$html .=  "<H3>REPORTE DE VIAJES</H3>";
$html .=  "<table id='customers'>";
$html .=  "<tr>";
$html .=  "<th>Id viaje</th>";
$html .=  "<th>Km estimado</th>";
$html .=  "<th>Km real</th>";
$html .=  "<th>Desviacion km</th>";
$html .=  "<th>Tiempo estimado hs</th>";
$html .=  "<th>Tiempo real hs</th>";
$html .=  "<th>Desviacion hs </th>";
$html .=  "<th>Combustible estimado </th>";
$html .=  "<th>Combustible real </th>";
$html .=  "<th>Desviacion combustible </th>";

$html .=  "</tr>";

	$con = Conexion::conectar();
		$query = "SELECT id,km_recorridos_previstos,km_recorridos_reales,
	km_recorridos_reales-km_recorridos_previstos as desviacion_k,tiempo_estimado,tiempo_real,
tiempo_real-tiempo_estimado as desviacion_t,combustible_consumido_estimado,combustible_consumido_real,combustible_consumido_real-combustible_consumido_estimado as desviacion_c	from viaje";
		$var = Conexion::getQuery($query);
	
	while($fila = mysqli_fetch_assoc($var)){
    $html .=  "<tr>";
    $html .=  "<td>" . $fila["id"]. "</td>";
	$html .=  "<td>" . $fila["km_recorridos_previstos"]. "</td>";
    $html .=  "<td>" . $fila["km_recorridos_reales"]. "</td>";
	$html .=  "<td>" . $fila["desviacion_k"]. "</td>";
	$html .=  "<td>" . $fila["tiempo_estimado"]. "</td>";
	$html .=  "<td>" . $fila["tiempo_real"]. "</td>";
	$html .=  "<td>" . $fila["desviacion_t"]. "</td>";
	$html .=  "<td>" . $fila["combustible_consumido_estimado"]. "</td>";
    $html .=  "<td>" . $fila["combustible_consumido_real"]. "</td>";
	$html .=  "<td>" . $fila["desviacion_c"]. "</td>";

	
    $html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "landscape");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->set_base_path("style.css");
$mipdf->stream("ListaReporteViajes.pdf", array("Attachment" => false))


?>
