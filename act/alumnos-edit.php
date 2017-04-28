<?php

#Llamo al header, y le seteo el titulo
$setTitle = "Modificar Alumno | Educ.AR";
$setVarHeader = '<meta http-equiv="Refresh" content="5; URL=show-alumnos.php">';
require('header.php');
#Fin header
  if (isset($_POST['CodAlu']) &&
      isset($_POST['NomAlu']) &&
      isset($_POST['ApeAlu']) &&
      isset($_POST['DocAlu']) &&
      isset($_POST['FecNacAlu']) &&
      isset($_POST['CorAlu']) &&
      isset($_POST['CelAlu']) &&
      isset($_POST['TelAlu']) &&
      isset($_POST['DomAlu']) &&
      isset($_POST['CodTipSex']) &&
      isset($_POST['CodEstCiv']) &&
      isset($_POST['CodPais']) &&
      isset($_POST['CodTipSan']) &&
      isset($_POST['CodTipDoc'])) {

        require_once 'class/class.database.php';
        $database = new database();
        $db = $database->getConnection();

        require_once 'class/class.alumnos.php';

        $Alumnos = new Alumnos($db);

        #Asigno de POST a variables VER => !! Esto se puede modificar !!
        $CodAlu = $_POST['CodAlu'];
        $NomAlu = $_POST['NomAlu'];
        $ApeAlu = $_POST['ApeAlu'];
        $DocAlu = $_POST['DocAlu'];
        $FecNacAlu = $_POST['FecNacAlu'];
        $CorAlu = $_POST['CorAlu'];
        $CelAlu = $_POST['CelAlu'];
        $TelAlu = $_POST['TelAlu'];
        $DomAlu = $_POST['DomAlu'];
        $CodTipSex = $_POST['CodTipSex'];
        $CodEstCiv = $_POST['CodEstCiv'];
        $CodPais = $_POST['CodPais'];
        $CodTipSan = $_POST['CodTipSan'];
        $CodTipDoc = $_POST['CodTipDoc'];

        #Hago el update
        $resAlumnos = $Alumnos->update($CodAlu,$NomAlu,$ApeAlu,$DocAlu,$FecNacAlu,$CorAlu,$CelAlu,$TelAlu,$DomAlu,$CodTipSex,$CodEstCiv,$CodPais,$CodTipSan,$CodTipDoc);
      }

  ?>


    <?php
    #Si el ulpdate se realizó correctamente muestro cartel de ok
    if ($resAlumnos) {
    ?>
    <div class="container-fluid">
        <div class="alert alert-success">
        El Alumno <strong><?php echo $NomAlu . " " . $ApeAlu ?></strong> se actualizó correctamente.
        </div>
    </div>
      <?php
    }else {
      #Sino muestro una alerta
      ?>
      <div class="container-fluid">
          <div class="alert alert-alert">
          No se pudo actualizar el alumno <strong><?php echo $NomAlu . " " . $ApeAlu ?></strong> correctamente, vuelva a intentarlo.
          </div>
      </div>
    <?php
    }
    ?>




<?php require('footer.php'); ?>
