<?php 
use Dompdf\Dompdf;

include_once "libreria/dompdf/autoload.inc.php";
$pdf=new Dompdf();
$html=file_get_contents('https://hugogiovanni.000webhostapp.com/Sistema%20Escolar/alumatepdf.php');
$pdf->loadHtml($html);
$pdf->setPaper("A4","landingpage");
$pdf->render();
$pdf->stream();
 ?>