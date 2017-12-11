<?php
require "../../dompdf/dompdf_config.inc.php";
include '../../modelo/include.php';

$html = "<html><head><link type='text/css' href='style.css' rel='stylesheet' /></head><body><center>";
$html .=  "<H3>LISTADO DE MECANICOS</H3>";
$html .=  "<table id='customers'>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Dni</th>";
$html .=  "<th>Nombre</th>";
$html .=  "<th>Apellido</th>";

$html .=  "</tr>";

	$con = Conexion::conectar();
  	$query1 = Mecanico::getAll();
	$resultado1 = Conexion::getQuery($query1);

while($fila = mysqli_fetch_assoc($resultado1)) {
    $html .=  "<tr>";
    $html .=  "<td>" . $fila["id"]. "</td>";
	$html .=  "<td>" . $fila["dni_mecanico"]. "</td>";
    $html .=  "<td>" . $fila["nombre"]. "</td>";
	$html .=  "<td>" . $fila["apellido"]. "</td>";

    $html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "portait");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->set_base_path("style.css");
$mipdf->stream("ListaMecanicos.pdf", array("Attachment" => false))


?>
