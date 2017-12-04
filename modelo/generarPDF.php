<?php

require "../dompdf/dompdf_config.inc.php";


$html =
"<html>
<body>
	<img src='../vistas/admin/temp/imagenQr.png'>
</body>
</html>";

$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");


?>
