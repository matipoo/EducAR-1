<?php

$CodAlu = $_POST['CodAlu'];
$getAlumnos = $Alumnos->getName($CodAlu);
$resAlumnos = $getAlumnos->fetch();

?>
<div class="container-fluid">
  <div class="alert alert-warning">
      Se eliminará el alumno: <strong><?php echo $resAlumnos['NomAlu'] . " " . $resAlumnos['ApeAlu'] ?> ( <?php echo $resAlumnos['DocAlu']?> )</strong>.
  </div>

  <!-- Creo el form con type hidden para que no se vean pero se pasen por POST-->
  <!-- Envio todo a delete-alumnos que termina la tarea-->
  <form class="" action="act/alumnos-delete.php" method="post">
    <input type="hidden" name="CodAlu" value="<?php echo $CodAlu ?>">
    <input type="hidden" name="NomAlu" value="<?php echo $resAlumnos['NomAlu'] ?>">
    <input type="hidden" name="ApeAlu" value="<?php echo $resAlumnos['ApeAlu'] ?>">


    <input type="submit" name="btn" value="Confirmar" class="btn btn-danger">

    <!-- Si cancela lo envío a la consulta de alumnos -->
    <!-- ESTO CON EL MODAL PUEDE DESAPARECER
    <a href="alumnos.php"><button type="button" name="btn" class="btn btn-default">Cancelar</button></a>
    -->

  </form>

  </div>
