<?php 
use Dompdf\Dompdf;

include_once "libreria/dompdf/autoload.inc.php";
$pdf=new Dompdf();
$html=file_get_contents('http://localhost/Sistema%20Escolar/reportespdf.php');
$pdf->loadHtml($html);
$pdf->setPaper("A4","landingpage");
$pdf->render();
$pdf->stream();
 ?>