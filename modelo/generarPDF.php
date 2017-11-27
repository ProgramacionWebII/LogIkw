<?php

require "../dompdf/dompdf_config.inc.php";

def("DOMPDF_ENABLE_REMOTE", false);

$html =
"<html>
<body>
	<img src='../xampp/vistas/admin/temp/imagenQr.png'>
</body>
</html>";

$dompdf = new Dompdf(array('enable_remote' => true));
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");


?>
