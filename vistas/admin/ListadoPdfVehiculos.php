<?php
require "../../dompdf/dompdf_config.inc.php";
include '../../modelo/include.php';

$html = "<html><head><link type='text/css' href='style.css' rel='stylesheet' /></head><body><center>";
$html .=  "<H3>LISTADO DE VEHICULOS</H3>";
$html .=  "<table id='customers'>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Patente</th>";
$html .=  "<th>Nro. Chasis</th>";
$html .=  "<th>Nro. Motor</th>";
$html .=  "<th>Marca</th>";
$html .=  "<th>Modelo</th>";
$html .=  "<th>Año de Fabricacion</th>";
$html .=  "<th>Tipo</th>";
$html .=  "<th>Estado</th>";

$html .=  "</tr>";

	$con = Conexion::conectar();
  	$query1 = Vehiculo::getAll();
	$resultado1 = Conexion::getQuery($query1);

while($fila = mysqli_fetch_assoc($resultado1)) {
    $html .=  "<tr>";
    $html .=  "<td>" . $fila["id"]. "</td>";
	$html .=  "<td>" . $fila["patente"]. "</td>";
    $html .=  "<td>" . $fila["nro_chasis"]. "</td>";
	$html .=  "<td>" . $fila["nro_motor"]. "</td>";
	$html .=  "<td>" . $fila["marca"]. "</td>";
	$html .=  "<td>" . $fila["modelo"]. "</td>";
    $html .=  "<td>" . $fila["anio_fabricacion"]. "</td>";
	$html .=  "<td>" . $fila["tipo"]. "</td>";
	$html .=  "<td>" . $fila["estado"]. "</td>";

    $html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "portait");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->set_base_path("style.css");
$mipdf->stream("ListaVehiculos.pdf", array("Attachment" => false))


?>
