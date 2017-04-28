<?php
echo "<pre>";
#print_r($result);
echo "</pre>";


#Llamo al header, y le seteo el titulo
$setTitle = "Consulta de Alumno | Educ.AR";
require('header.php');

#Fin header

require_once 'class/class.database.php';
require_once 'class/class.alumnos.php';

$database = new database();
$db = $database->getConnection();
$Alumnos = new Alumnos($db);

$NomAlu = 'Guido';
$ApeAlu = 'Caffa';
$DocAlu = '37';

$show = $Alumnos->show2($NomAlu,$ApeAlu,$DocAlu);

print_r($show);

 ?>

<body>

    <div class="container-fluid">

    <div class="table-responsive">
      <table class="table">
        <form class="" action="edit-alumnos.php" method="post">
        <div class="row">
          <div class="col-md-7">

          </div>

          <div class="col-md-5">
            <button type="submit" name="btn" class="btn btn-primary" value="1 ">Editar</button>
            <button type="submit" name="btn" class="btn btn-danger" value="3">Eliminar</button>
            <button type="button" name="btn" class="btn btn-default" data-toggle="modal" data-target="#modalAlumnosCreate">Crear</button>

          </div>

        </div>
        <thead>
          <tr>
            <th></th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Tip. Doc</th>
            <th>Nro. Doc</th>
            <th>Fec. Nacimiento</th>
            <th>Domicilio</th>
            <th>Sexo</th>
            <th>Estado Civil</th>
            <th>Pais</th>
            <th>Grupo Sanguineo</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Telefono</th>
          </tr>
        </thead>
        <?php foreach($result as $row){
          echo '<tr scope="row">';
            echo '<td><input type="radio" name="CodAlu" value="' . $row['CodAlu']. '"></td>';
            echo '<td>' . $row['CodAlu']. '</td>';
            echo '<td>' . $row['NomAlu']. '</td>';
            echo '<td>' . $row['ApeAlu']. '</td>';
            echo '<td>' . $row['AbrTipDoc']. '</td>';
            echo '<td>' . $row['DocAlu']. '</td>';
            echo '<td>' . $row['FecNacAlu']. '</td>';
            echo '<td>' . $row['DomAlu']. '</td>';
            echo '<td>' . $row['DesSex']. '</td>';
            echo '<td>' . $row['DesEstCiv']. '</td>';
            echo '<td>' . $row['NomPais']. '</td>';
            echo '<td>' . $row['AbrTipSan']. '</td>';
            echo '<td>' . $row['CorAlu']. '</td>';
            echo '<td>' . $row['CelAlu']. '</td>';
            echo '<td>' . $row['TelAlu']. '</td>';
          echo '</tr>';
        }
        ?>
      </table>
      </form>
      <?php require('modals/modal-alumnos-create.php'); ?>
    </div>
    </div>



 ?>
