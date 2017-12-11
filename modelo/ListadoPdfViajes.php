<?php
require "dompdf/dompdf_config.inc.php";
include 'include.php';


$html = "<html><head><link type='text/css' href='style.css' rel='stylesheet' /></head><body><center>";
$html .=  "<H3>LISTADO DE VIAJES</H3>";
$html .=  "<table id='customers'>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>ID Vehiculo</th>";
$html .=  "<th>ID Administrador</th>";
$html .=  "<th>Origen</th>";
$html .=  "<th>Destino</th>";
$html .=  "<th>Tipo de Carga</th>";
$html .=  "<th>Fecha de Salida Prevista</th>";
$html .=  "<th>Fecha de Llegada Prevista</th>";
$html .=  "<th>Tiempo Estimado</th>";
$html .=  "<th>Fecha de Salida Real</th>";
$html .=  "<th>Fecha de Llegada Real</th>";
$html .=  "<th>Tiempo Real</th>";
$html .=  "<th>Km Recorridos Previstos</th>";
$html .=  "<th>Km Recorridos Reales</th>";
$html .=  "<th>Combustible Consumido Estimado</th>";
$html .=  "<th>Combustible Consumido Real</th>";

$html .=  "</tr>";

	$con = Conexion::conectar();
  	$query1 = Viaje::getAll();
	$resultado1 = Conexion::getQuery($query1);

while($fila = mysqli_fetch_assoc($resultado1)) {
    $html .=  "<tr>";
    $html .=  "<td>" . $fila["id"]. "</td>";
	$html .=  "<td>" . $fila["id_vehiculo"]. "</td>";
    $html .=  "<td>" . $fila["id_administrador"]. "</td>";
	$html .=  "<td>" . $fila["origen"]. "</td>";
	$html .=  "<td>" . $fila["destino"]. "</td>";
	$html .=  "<td>" . $fila["tipo_de_carga"]. "</td>";
    $html .=  "<td>" . $fila["fecha_de_salida_prevista"]. "</td>";
	$html .=  "<td>" . $fila["fecha_de_llegada_prevista"]. "</td>";
	$html .=  "<td>" . $fila["tiempo_estimado"]. "</td>";
	$html .=  "<td>" . $fila["fecha_de_salida_real"]. "</td>";
    $html .=  "<td>" . $fila["fecha_de_llegada_real"]. "</td>";
	$html .=  "<td>" . $fila["tiempo_real"]. "</td>";
	$html .=  "<td>" . $fila["km_recorridos_previstos"]. "</td>";
	$html .=  "<td>" . $fila["km_recorridos_reales"]. "</td>";
    $html .=  "<td>" . $fila["combustible_consumido_estimado"]. "</td>";
	$html .=  "<td>" . $fila["combustible_consumido_real"]. "</td>";

    $html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A3", "landscape");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->set_base_path("style.css");
$mipdf->stream("ListaViajes.pdf", array("Attachment" => false))


?>
