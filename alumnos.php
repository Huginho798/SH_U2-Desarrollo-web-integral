<?php
ob_start();
?>

<?php
  require_once 'cnn.php';
?>

<!-- Códigos de REGISTRO -->
<?php
     //Valida que el usuario hizo clik en el Boton
 
    if (isset($_POST['registrar'])) 
    {
    //Trae datos del formulario
    $matricula=$_POST['matricula'];
    $nombre=$_POST['nombre'];
    $carrera=$_POST['carrera'];
   
        //Validar que las cajas no esten vacias
        if (!empty($matricula) && !empty($nombre) && !empty($carrera))
            {
              //Insertar datos en la tabla de la db  
              $sql=$cnnPDO->prepare("INSERT INTO alumnos (matricula, nombre, carrera) VALUES (:matricula, :nombre, :carrera)");

              //Asignar el contenido de las variables a los parametros
              $sql->bindParam(':matricula',$matricula);
              $sql->bindParam(':nombre',$nombre);
              $sql->bindParam(':carrera',$carrera);

              //Ejecutar la variable $sql
              $sql->execute();
              unset($sql);
              unset($cnnPDO);
            }
            //header("location:usuario.php");
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
<h1 style="font-family:impact;";><center>Registro De Alumnos</center></h1>
<form id="loginform" class="form-horizontal" role="form"  method="POST" autocomplete="off">
<section class="vh-100">
  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example3" class="form-control" name="matricula" placeholder="Matricula"/>
    <label style="color:#FFFFFF" class="form-label" for="form6Example3">Matricula</label>
  </div>

   <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example3" class="form-control" name="nombre" placeholder="Nombre(s) Y Apellidos"/>
    <label style="color:#FFFFFF" class="form-label" for="form6Example3">Nombre y Apellido</label>
  </div>

<label for="perfil"></label>
     <select class="custom-select custom-select-lg mb-3" name="carrera" id="perfil">
      <option value="8">Carrera</option>
      <option value="TI">Tecnologias De La Informacion</option>
      <option value="Meca">Mecatronica</option>
      <option value="Proce">Procesos</option>
      <option value="DSN">Desarrollo De Negocios</option>
      <option value="Bio">Biotecnologia</option>
      <option value="Mntn">Mantenimiento</option>

</select>
  </div>
  <!-- Submit button -->
   <center><div style="width:50%; height:50%">
 <button name="registrar" id="btn-registro" type="submit" class="btn btn-black btn-block mb-4">Registar Alumno</button></center>
</div>
</form>

