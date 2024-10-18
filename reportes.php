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
        <a class="nav-link" href="editaralum.php"><h5 style="font-family:luminari;">Editar Alumnos</h5></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="editprofe.php"><h5 style="font-family:luminari;">Editar Profesores</h3></a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="editmateri.php"><h5 style="font-family:luminari;">Editar Materias</h3></a>
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
<h1 style="font-family:impact;";><center>Registros</center></h1>
<br>
<table class="table table-dark table-bordered" align="center" style="width: 1300px;" border="3px;">
    
    <tr>
      
      <th>Matricula</th>
      <th>Nombre</th>
      <th>Carrera</th>
    </tr>

    <?php
    include 'cnn.php';
    $sentencia=$cnnPDO->query("SELECT * FROM alumnos");
    $alumnos=$sentencia->fetchALL(PDO::FETCH_OBJ);
    ?>
    
    <?php
    foreach ($alumnos as $dato){
    ?>
     <tr>
          <td><?php echo $dato->matricula; ?> </td>
          <td><?php echo $dato->nombre; ?> </td>
          <td><?php echo $dato->carrera; ?> </td>
        </tr>
        <?php
    }

    ?>

  </tbody>
</table>

<br>
<br>
<table class="table table-dark table-bordered" align="center" style="width: 1300px;" border="3px;">
  <tbody align="center">
    
    <tr>
      
      <th>Numero De Empleado</th>
      <th>Nombre</th>
    </tr>

    <?php
    include 'cnn.php';
    $sentencia=$cnnPDO->query("SELECT * FROM profesores");
    $alumnos=$sentencia->fetchALL(PDO::FETCH_OBJ);
    ?>
    
    <?php
    foreach ($alumnos as $dato){
    ?>
     <tr>
          <td><?php echo $dato->empleado; ?> </td>
          <td><?php echo $dato->nombre; ?> </td>
        </tr>
        <?php
    }

    ?>

  </tbody>
</table>

<br>
<br>
<table class="table table-dark table-bordered" align="center" style="width: 1300px;" border="3px;">
  <tbody align="center">
    
    <tr>
      
      <th>Id De La Materia</th>
      <th>Nombre</th>
    </tr>

    <?php
    include 'cnn.php';
    $sentencia=$cnnPDO->query("SELECT * FROM materia");
    $alumnos=$sentencia->fetchALL(PDO::FETCH_OBJ);
    ?>
    
    <?php
    foreach ($alumnos as $dato){
    ?>
     <tr>
          <td><?php echo $dato->idmateria; ?> </td>
          <td><?php echo $dato->nombre; ?> </td>
        </tr>
        <?php
    }

    ?>

  </tbody>
</table>
<br><br>
<center><a href="pdf.php" class="btn btn-blue">Generar PDF</a>
<br></center>
<br>
<div class="text-center p-3" style="background-color: #39C0ED;">
    © 2022 Derechos Reservados: Hugo Giovanni :)
    </div>
  </div>
