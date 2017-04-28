
<?php
#Llamo al header, y le seteo el titulo
$setTitle = "Consulta de Alumno | Educ.AR";
$setVarHeader = '<meta http-equiv="Refresh" content="5; URL=alumnos.php">';
require('../header.php');



#Si tengo seteado los campos creo el usuario
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

    #llamo a la clase alumnos
    require_once '../class/class.database.php';
    require_once '../class/class.alumnos.php';

    #asigno las variables que vienen por post a una variable (esto capaz no sea necesario y se puede saltar)
    $CodAlu = $_POST['CodAlu'];
    $NomAlu = trim($_POST['NomAlu']);
    $ApeAlu = trim($_POST['ApeAlu']);
    $DocAlu = $_POST['DocAlu'];
    $TimeStamp = $_POST['FecNacAlu'];
    $FecNacAlu = date("Y-m-d H:i:s", strtotime($TimeStamp));
    $CorAlu = trim($_POST['CorAlu']);
    $CelAlu = $_POST['CelAlu'];
    $TelAlu = $_POST['TelAlu'];
    $DomAlu = trim($_POST['DomAlu']);
    $CodTipSex = $_POST['CodTipSex'];
    $CodEstCiv = $_POST['CodEstCiv'];
    $CodPais = $_POST['CodPais'];
    $CodTipSan = $_POST['CodTipSan'];
    $CodTipDoc = $_POST['CodTipDoc'];

    #Creo nuevo objeto alumnos, y luego le pido que haga un Create pasandole los campos.
    $database = new database();
    $db = $database->getConnection();
    $Alumnos = new Alumnos($db);
    $resAlumnos = $Alumnos->create($CodAlu,$NomAlu,$ApeAlu,$DocAlu,$FecNacAlu,$CorAlu,$CelAlu,$TelAlu,$DomAlu,$CodTipSex,$CodEstCiv,$CodPais,$CodTipSan,$CodTipDoc);

    #Si la ejecución es correcta, devuelvo un mensaje
    if ($resAlumnos) {?>
      <div class="container-fluid">
        <div class="alert alert-success">
            Se creó el alumno: <strong><?php echo $NomAlu . " " . $ApeAlu . "( " . $CodAlu . " )"?></strong>.
        </div>
      </div>

    <?php
  }else{
    #Si la ejecucion tiene algun problema, devuelvo una alerta
    ?>
    <div class="container-fluid">
      <div class="alert alert-warning">
          No se pudo crear el alumno: <strong><?php echo $NomAlu . " " . $ApeAlu ?></strong>.
      </div>
    </div>
      <?php
    }

  }else {
    echo "Faltaron parametros";
  }
?>
<?php require('../ footer.php'); ?>
