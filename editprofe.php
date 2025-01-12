<?php 
session_start();
ob_start();
require_once 'cdn.html';
require_once 'cnn.php';
?>


<!-- Códigos de ACTUALIZAR -->
<?php 
//se verifica si se presiona el botón llamado ACTUALIZAR
if (isset($_POST['actualizar']))
{
  //se guarda en las variables$us y $ps
  $empleado=$_POST['empleado'];
  
  //Query de consulta
  $query = $cnnPDO->prepare('UPDATE from profesores WHERE empleado =:empleado');

  //Manejo de parámetros
  $query->bindParam(':empleado', $empleado);

}
?>
<!-- Códigos de ELIMINAR -->
<?php 
//se verifica si se presiona el botón llamado eliminar
if (isset($_POST['eliminar']))
{
  //se guarda en las variables$us y $ps
  $empleado=$_POST['empleado'];
  
  //Query de consulta
  $query = $cnnPDO->prepare('DELETE from profesores WHERE empleado =:empleado');

  //Manejo de parámetros
  $query->bindParam(':empleado', $empleado);

  //Execución del query
  $query->execute(); 
}
?>

<!-- Códigos de BUSQUEDA -->
<?php 
//se verifica si se presiona el botón llamado validar
if (isset($_POST['buscar']))
{
  //se guarda en las variables$us y $ps
  $empleado=$_POST['empleado'];
  
  //Query de consulta
  $query = $cnnPDO->prepare('SELECT * from profesores WHERE empleado =:empleado');

  //Manejo de parámetros
  $query->bindParam(':empleado', $empleado);

  //Execución del query
  $query->execute(); 
  //$count=$query->rowCount();

  //Asigna los datos del registro a la variable $campo
  $campo = $query->fetch(); 
}
?>

<?php
     //Valida que el usuario hizo clik en el Boton 
    if (isset($_POST['actualizar'])) 
    {
    //Trae datos del formulario
    $empleado=$_POST['empleado']; 
    $nombre=$_POST['nombre'];
   
    
        //Validar que las cajas no esten vacias
       if (!empty($empleado) && !empty($nombre))
            {
               //Actualizamod los datos en la tabla de la db  
              $sql = $cnnPDO->prepare(
                'UPDATE profesores SET empleado =:empleado, nombre = :nombre  WHERE empleado = :empleado'
              );
              //Asignar las variables a los campos de la tabla
              $sql->bindParam(':empleado',$empleado);
              $sql->bindParam(':nombre',$nombre);
      
              //Ejecutar la variable $sql
              $sql->execute();
              unset($sql);
              unset($cnnPDO);
            }
           // header("location:index.php"); 
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
<br>
<h1 style="font-family:impact;";><center>Editar Profesores</center></h1>
<form id="loginform" class="form-horizontal" role="form"  method="POST" autocomplete="off">
<section class="vh-100">
  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
  <div class="form-outline mb-4">
    <input type="text" id="form6Example3" class="form-control" name="empleado" placeholder="Empleado"/>
    <label style="color:#FFFFFF" class="form-label" for="form6Example3">Numero De Empleado</label>
  </div>

   <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example3" class="form-control" name="nombre" placeholder="Nombre(s) Y Apellidos"/>
    <label style="color:#FFFFFF" class="form-label" for="form6Example3">Nombre Y Apellido</label>
  </div>

  </div>
  <!-- Submit button -->
   <center><div style="width:50%; height:50%">
 <button name="actualizar" id="btn-registro" type="submit" class="btn btn-black btn-block mb-4">Actualizar</button></center>
<br>
<!-- Submit button -->
   <center><div style="width:50%; height:50%">
 <button name="eliminar" id="btn-registro" type="submit" class="btn btn-black btn-block mb-4">Eliminar</button></center>
<br>
</div>
</form>
<br>
<br>
<table class="table table-dark table-bordered" align="center" style="width: 800px;" border="3px;">
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