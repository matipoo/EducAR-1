<?php
    $setVarHeader = '<meta http-equiv="Refresh" content="2; URL=show-alumnos.php">';
    $setTitle = "Eliminar Alumno | Educ.AR"

    require('header.php');

    $CodAlu = $_POST['CodAlu'];
    $NomAlu = $_POST['NomAlu'];
    $ApeAlu = $_POST['ApeAlu'];

    require_once 'class/class.database.php';
    require_once 'class/class.alumnos.php';

    $database = new database();
    $db = $database->getConnection();
    $Alumnos = new Alumnos($db);
    $resAlumnos = $Alumnos->delete($CodAlu);

    if($resAlumnos){?>
      <div class="container-fluid">
        <div class="alert alert-success">
            Se eliminó el alumno: <strong><?php echo $NomAlu . " " . $ApeAlu ?></strong>.
        </div>
        </div>
      <?php
    }else{?>
      <div class="container-fluid">
        <div class="alert alert-warning">
            No se pudo eliminar el alumno: <strong><?php echo $NomAlu . " " . $ApeAlu ?></strong>. Intentelo luego.
        </div>
        </div>

<?php }

require('header.php');
?>
