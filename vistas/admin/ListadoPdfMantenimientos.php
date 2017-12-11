<?php
require "../../dompdf/dompdf_config.inc.php";
include '../../modelo/include.php';


$html = "<html><head><link type='text/css' href='style.css' rel='stylesheet' /></head><body><center>";
$html .=  "<H3>LISTADO DE MANTENIMIENTO DE VEHICULOS</H3>";
$html .=  "<table id='customers'>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Id vehiculo</th>";
$html .=  "<th>Id empresa</th>";
$html .=  "<th>Id mecanico</th>";
$html .=  "<th>Patente</th>";
$html .=  "<th>Nro. chasis</th>";
$html .=  "<th>Nro. motor</th>";
$html .=  "<th>Fecha Service</th>";
$html .=  "<th>Km de la unidad</th>";
$html .=  "<th>Costo</th>";
$html .=  "<th>Tipo</th>";
$html .=  "<th>Repuestos cambiados</th>";
$html .=  "</tr>";

	$con = Conexion::conectar();
  	$query1 = Mantenimiento::getAll();
	$resultado1 = Conexion::getQuery($query1);

while($fila = mysqli_fetch_assoc($resultado1)) {
    $html .=  "<tr>";
    $html .=  "<td>" . $fila["id"]. "</td>";
    $html .=  "<td>" . $fila["id_vehiculo"]. "</td>";
	$html .=  "<td>" . $fila["id_empresa"]. "</td>";
	$html .=  "<td>" . $fila["id_mecanico"]. "</td>";
	$html .=  "<td>" . $fila["patente"]. "</td>";
	$html .=  "<td>" . $fila["nro_chasis"]. "</td>";
	$html .=  "<td>" . $fila["nro_motor"]. "</td>";
    $html .=  "<td>" . $fila["fecha_service"]. "</td>";
	$html .=  "<td>" . $fila["km_de_la_unidad"]. "</td>";
	$html .=  "<td>" . $fila["costo"]. "</td>";
	$html .=  "<td>" . $fila["tipo"]. "</td>";
	$html .=  "<td>" . $fila["repuestos_cambiados"]. "</td>";
    $html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A3", "landscape");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->set_base_path("style.css");
$mipdf->stream("ListaMantenimiento.pdf", array("Attachment" => false))


?>
