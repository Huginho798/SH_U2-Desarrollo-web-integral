<?php 
require_once 'cdn.html';
require_once 'cnn.php';
?>
<?php
    //Valida que el usuario hizo click en el Boton 
    if (isset($_POST['asignar'])) 
    {
    //Trae datos del formulario
    $nombre=$_POST['nombre']; 
    $profesor=$_POST['profesor'];
    $materia=$_POST['materia'];
    
   
        //Validar que las cajas no esten vacias
        if (!empty($nombre) && !empty($profesor) && !empty($materia))
            {
              //Insertar datos en la tabla de la db  
              $sql=$cnnPDO->prepare("INSERT INTO matpro
                (nombre, profesor, materia) VALUES (:nombre, :profesor, :materia)");

              //Asignar las variables a los campos de la tabla
              $sql->bindParam(':nombre',$nombre);
              $sql->bindParam(':profesor',$profesor);
              $sql->bindParam(':materia',$materia);
             
              //Ejecutar la variable $sql
              $sql->execute();
              unset($sql);
              unset($cnnPDO);
            }
    }
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
<h1 style="font-family:impact;";><center>Asignacion De Materia-Profesor</center></h1>

<br>
<br>
<br>
<form id="loginform" class="form-horizontal" role="form"  method="POST" autocomplete="off">
<center><select class="controls" name="nombre" aria-label="Default select example">
            <option selected >Alumno</option>
            <?php
    include 'cnn.php';
    $sentencia=$cnnPDO->query("SELECT * FROM alumnos");
    $alumnos=$sentencia->fetchALL(PDO::FETCH_OBJ);
    ?>

    <?php
    foreach ($alumnos as $dato){
    ?>
            <option value="<?php echo $dato->nombre; ?>"><?php echo $dato->nombre; ?></option>
           
           <?php
    }
          echo "</select>";
    ?>
   <select class="controls" name="profesor" aria-label="Default select example">
            <option selected >Profesor</option>
            <?php
    include 'cnn.php';
    $sentencia=$cnnPDO->query("SELECT * FROM profesores");
    $alumnos=$sentencia->fetchALL(PDO::FETCH_OBJ);
    ?>

    <?php
    foreach ($alumnos as $dato){
    ?>
            <option value="<?php echo $dato->nombre; ?>"><?php echo $dato->nombre; ?></option>
           
           <?php
    }
          echo "</select>";
    ?>
   <select class="controls" name="materia" aria-label="Default select example">
            <option selected >Materia</option>
            <?php
    include 'cnn.php';
    $sentencia=$cnnPDO->query("SELECT * FROM materia");
    $alumnos=$sentencia->fetchALL(PDO::FETCH_OBJ);
    ?>

    <?php
    foreach ($alumnos as $dato){
    ?>
            <option value="<?php echo $dato->nombre; ?>"><?php echo $dato->nombre; ?></option>
           
           <?php
    }
          echo "</select>";
    ?></select></center>
    <br>
    <br>
    <br>
    <!-- Submit button -->
  <center><div style="width:20%; height:100%" class="form-group">
    <div class="col-md-12 control">
  <button name="asignar" type="submit" class="btn btn-black btn-block">Asignar</button>
</div>
</div></center>

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
