<?php
?>
<h1><center>Registro</center></h1>
<br>
<table>
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
<table>
  <tbody>
    
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
<table>
  <tbody >
    
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
<br>
