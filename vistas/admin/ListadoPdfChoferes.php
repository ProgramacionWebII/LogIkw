<?php
require "../../dompdf/dompdf_config.inc.php";
include '../../modelo/include.php';

//$html es una variable que va almacenar codigo html entre comillas

$html = "<html><head><link type='text/css' href='style.css' rel='stylesheet' /></head><body><center>";
$html .=  "<H3>LISTADO DE CHOFERES</H3>";//aca sigo con la misma variable solo que le estoy concatenando mas partes del html que estoy creando
//creo la tabla
$html .=  "<table id='customers'>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Dni</th>";
$html .=  "<th>Nombre</th>";
$html .=  "<th>Apellido</th>";
$html .=  "<th>Tipo de Licencia de Conducir</th>";
$html .=  "</tr>";

//obtengo los datos
$con = Conexion::conectar();
  	$query1 = Chofer::getAll();
		$resultado1 = Conexion::getQuery($query1);

		//sigo concatenando partes a la variable $html
while($fila = mysqli_fetch_assoc($resultado1)) {
    $html .=  "<tr>";
    $html .=  "<td>" . $fila["id"]. "</td>";
    $html .=  "<td>" . $fila["dni_chofer"]. "</td>";
	$html .=  "<td>" . $fila["nombre"]. "</td>";
	$html .=  "<td>" . $fila["apellido"]. "</td>";
	$html .=  "<td>" . $fila["tipo_licencia_de_conducir"]. "</td>";
    $html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

//genero un nuevo archivo
$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "portait"); //tamaño a4 en vertical
$mipdf->load_html(utf8_decode($html)); //le paso la variable
$mipdf->render();//codifica el html
$mipdf->set_base_path("style.css");//le digo que le agregue el css que esta 
// la carpeta vista style.css,esto es un error ya que deberia estar en la carpeta
//css del directorio,pero no me lo toma por eso lo deje asi
$mipdf->stream("ListaChoferes.pdf", array("Attachment" => false))
//genera el pdf y lo abre en el navegador


?>
