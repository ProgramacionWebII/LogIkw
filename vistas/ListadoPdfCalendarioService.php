<?php
require "../dompdf/dompdf_config.inc.php";
include '../modelo/include.php';


$html = "<html><head><link type='text/css' href='style.css' rel='stylesheet' /></head><body><center>";
$html .=  "<H3>LISTADO CALENDARIO SERVICE</H3>";
$html .=  "<table id='customers'>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Id vehiculo</th>";
$html .=  "<th>Fecha Service</th>";
$html .=  "<th>Km de la unidad</th>";
$html .=  "<th>Notificacion</th>";

$html .=  "</tr>";

	$con = Conexion::conectar();
  	$query = CalendarioService::getAll();
	$resultado = Conexion::getQuery($query);
	
while($fila = mysqli_fetch_assoc($resultado)) {
	
	if( $fila['km_de_la_unidad']>100000)
{$notificacion="Cambiar cadena de distribucion";}
	
	elseif( $fila['km_de_la_unidad']>10000)
	{$notificacion="Cambiar pastilla de frenos";}
	
	elseif( $fila['km_de_la_unidad']>5000 )
	{$notificacion="Cambiar aceite";}

		else{$notificacion="";}
		



    $html .=  "<tr>";
    $html .=  "<td>" . $fila["id"]. "</td>";
    $html .=  "<td>" . $fila["id_vehiculo"]. "</td>";
    $html .=  "<td>" . $fila["fecha_service"]. "</td>";
	$html .=  "<td>" . $fila["km_de_la_unidad"]. "</td>";
	$html .=  "<td><strong>$notificacion</strong></td>";
	$html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "portrait");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->set_base_path("style.css");
$mipdf->stream("ListaCalendarioService.pdf", array("Attachment" => false))


?>
