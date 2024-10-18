<?php
ob_start();

?>

<?php 
 
session_start();
?>
<?php
require_once 'cnn.php';


  //se verifica si se presiona el botón llamado validar
  if (isset($_POST['iniciar-sesion']))
  {
  //se guarda en las variables$us y $ps
  $usuario=$_POST['usuario'];
  
  //Query de consulta
  $query = $cnnPDO->prepare('SELECT * from escolarsesion WHERE usuario =:usuario');
  $query->bindParam(':usuario', $usuario);
  $query->execute(); 
  $count=$query->rowCount();
  $campo = $query->fetch();

    if($count)  
            { 
                     
              $_SESSION['usuario'] = $campo['usuario'];
              $_SESSION['password'] = $campo['password'];
              header("location:usuarios.php");  
            } 
            else 
            {
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR de datos!</strong> Verifique El Usuario
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <?php 
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
<body style="background: url('escuela2.jpeg') no-repeat; background-size: 1536px 745px">
<nav class="navbar navbar-black bg-light">
  <div class="container-fluid">
    <span class="navbar-text"><h3 style="font-family:impact;">SISTEMA WEB DE CONTROL ESCOLAR</h3>
    </span>
  </div>
</nav>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <form style=" width: 25vw; margin-left : 38vw;" id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
  <!-- User input -->
  <div class="form-outline mb-4">
    <input type="text" id="form1Example1" class="form-control" name="usuario" />
    <label class="form-label" for="form1Example1">Usuario</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form1Example2" class="form-control" name="password" required />
    <label class="form-label" for="form1Example2">Contraseña</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
        <label class="form-check-label" for="form1Example3"> Recordarme </label>
      </div>
    </div>

  </div>

  <!-- Submit button -->
  <div style="width:100%; height:100%" class="form-group">
    <div class="col-md-12 control">
  <button name="iniciar-sesion" id="btn-login" type="submit" class="btn btn-black btn-block">Iniciar Sesion</button>
</div>
</div>
</form>
