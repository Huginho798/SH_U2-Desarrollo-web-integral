<?php
ob_start();
?>
<?php
session_start();
require_once 'cnn.php';
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
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="usuarios.php"><h3 style="font-family:impact;">CONTROL ESCOLAR</h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="alumnos.php"><h5 style="font-family:luminari;">Alumnos</h5></a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="reportes.php"><h5 style="font-family:luminari;">Reportes</h3></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profesores.php"><h5 style="font-family:luminari;">Profesores</h3></a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="materias.php"><h5 style="font-family:luminari;">Materias</h3></a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="mat-pro.php"><h5 style="font-family:luminari;">Mat-Pro</h3></a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="alu-mat.php"><h5 style="font-family:luminari;">Alu-Mat</h3></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h7 style="font-family:impact;">Opciones</h7></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php">Cerrar Sesion</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<br>
<br>
<br>
<h1 style="font-family:impact;";><center>Asignacion De Alumnos-Materias</center></h1>

<br>
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
