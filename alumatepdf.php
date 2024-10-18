<?php
require_once 'cdn.html';
?>
<!DOCTYPE html>
<html>
<head>
<title>Sistema Web De Control Escolar</title>
<meta charset="utf-8">
  <title>Sistema Web De Control Escolar</title>

  <!-- CSS -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

  <!-- JavaScript -->

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</head>
<body style="background-color:#2E86C1;">
<br>
<br>

<table class="table table-dark table-bordered" align="center" style="width: 1300px;" border="3px;">
    
    <tr>
      
      <td scope="row">Alumno</td>
      <td scope="row">Profesor</td>
      <td scope="row">Materia</td>
          
    </tr>

    <?php
    include 'cnn.php';
    $sentencia=$cnnPDO->query("SELECT * FROM matpro");
    $alumnos=$sentencia->fetchALL(PDO::FETCH_OBJ);
    ?>
    
    <?php
    foreach ($alumnos as $dato){
    ?>
     <tr>
            <td><?php echo $dato->nombre; ?> </td>
           <td><?php echo $dato->materia; ?> </td>
          <td><?php echo $dato->profesor; ?> </td>
        </tr>
        <?php
    }

    ?>

  </tbody>
</table>
<br>
<?php 
$html=ob_get_clean();
//echo "$html";
require_once 'libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
//$dompdf->setPaper('A4','landscape');

$dompdf->render();
$dompdf->stream("archivo.pdf",array("Attachment" => false ));

 ?>

