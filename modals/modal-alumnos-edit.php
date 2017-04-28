<?php  
  $CodAlu = $_POST['CodAlu'];
  $editAlumnos = $Alumnos->edit($CodAlu);
  $resAlumnos = $editAlumnos->fetch();

  print_r($resAlumnos);

  #Asigno los datos que me devuelve el objeto alumnos - VER => !!esto creo que se podría evitar!!
  $NomAlu = $resAlumnos['NomAlu'];
  $ApeAlu = $resAlumnos['ApeAlu'];
  $DocAlu = $resAlumnos['DocAlu'];
  $dateTime = $resAlumnos['FecNacAlu'];
  $FecNacAlu = date_format($dateTime, 'd/m/Y');
  $CorAlu = $resAlumnos['CorAlu'];
  $CelAlu = $resAlumnos['CelAlu'];
  $TelAlu = $resAlumnos['TelAlu'];
  $DomAlu = $resAlumnos['DomAlu'];
  $CodTipSex = $resAlumnos['CodTipSex'];
  $CodEstCiv = $resAlumnos['CodEstCiv'];
  $CodPais = $resAlumnos['CodPais'];
  $CodTipSan = $resAlumnos['CodTipSan'];
  $CodTipDoc = $resAlumnos['CodTipDoc'];


  #Llamo a todos los objetos de otras tablas para los menues desplegables
  require_once 'class/class.paises.php';
  $Paises = new Paises($db);
  $showPaises = $Paises->show();
  $resPaises = $showPaises->fetchAll();

  require_once 'class/class.tipdoc.php';
  $TipDoc = new Tipdoc($db);
  $showTipDoc = $TipDoc->show();
  $resTipDoc = $showTipDoc->fetchAll();

  require_once 'class/class.tipestciv.php';
  $TipEstCiv = new Tipestciv($db);
  $showTipEstCiv = $TipEstCiv->show();
  $resTipEstCiv = $showTipEstCiv->fetchAll();

  require_once 'class/class.tipsan.php';
  $TipSan = new Tipsan($db);
  $showTipSan = $TipSan->show();
  $resTipSan = $showTipSan->fetchAll();

  require_once 'class/class.tipsex.php';
  $TipSex = new Tipsex($db);
  $showTipSex = $TipSex->show();
  $resTipSex = $showTipSex->fetchAll();
  #fin objetos otras tablas


  #Armo el form, llamando a los campos y poniendo por defecto los campos del alumno editado
  ?>

<div class="container">

    <form class="form" action="edit-alumnos.php" method="post">

      <div class="form-group">

        <label for="CodAlu">Código de Usuario</label>
        <input type="number" name="CodAlu" class="form-control" value="<?php print($CodAlu) ?>" readonly="readonly">

      </div>

      <div class="form-group">

        <label for="NomAlu">Nombre</label>
        <input type="text" name="NomAlu" class="form-control" value="<?php  echo $NomAlu ?>">

      </div>

      <div class="form-group">

        <label for="ApeAlu">Apellido</label>
        <input type="text" name="ApeAlu" class="form-control" value="<?php  echo $ApeAlu ?>">

      </div>

      <div class="form-group">

        <label for="TipDoc">Documento</label>
        <select class="form-control" name="CodTipDoc">
          <?php foreach($resTipDoc as $row){
            if ($row['CodTipDoc'] == $CodTipDoc) {
              echo '<option value="' . $row['CodTipDoc'] . '" selected>' . $row['AbrTipDoc'] . '</option>';
            } else {
              echo '<option value="' . $row['CodTipDoc'] . '">' . $row['AbrTipDoc'] . '</option>';
            }

        }
          ?>
        </select>
        <input type="text" name="DocAlu" class="form-control" value="<?php  echo $DocAlu ?>">

      </div>

      <div class="form-group">

        <label for="FecNacAlu">Fecha de Nacimiento</label>
        <p>Date: <input type="text" id="datepicker" name="FecNacAlu" value="26/09/1992"></p>


      </div>

      <div class="form-group">

        <label for="DomAlu">Domicilio</label>
        <input type="Text" name="DomAlu" class="form-control" value="<?php  echo $DomAlu ?>">

      </div>

      <div class="form-group">

        <label for="CodTipSex">Sexo</label><br>

        <?php foreach($resTipSex as $row){
          if ($row['CodTipSex'] == $CodTipSex) {
            echo '<label class="radio-inline"><input type="radio" name="CodTipSex" value="' . $row['CodTipSex'] . '" checked>' . $row['DesSex'] . '</label>';
          } else {
            echo '<label class="radio-inline"><input type="radio" name="CodTipSex" value="' . $row['CodTipSex'] . '">' . $row['DesSex'] . '</label>';
          }
      }
        ?>

      </div>

      <div class="form-group">

        <label for="CodEstCiv">Estado Civil</label><br>
        <?php foreach($resTipEstCiv as $row){
          if ($row['CodEstCiv'] == $CodEstCiv) {
            echo '<label class="radio-inline"><input type="radio" name="CodEstCiv" value="' . $row['CodEstCiv'] . '" checked>' . $row['DesEstCiv'] . '</label>';
          } else {
            echo '<label class="radio-inline"><input type="radio" name="CodEstCiv" value="' . $row['CodEstCiv'] . '">' . $row['DesEstCiv'] . '</label>';
            }
      }
        ?>

      </div>

      <div class="form-group">

          <label for="CodTipSex">Pais</label><br>
          <select class="form-control" name="CodPais">
            <?php foreach($resPaises as $row){
              if ($row['CodPais'] == $CodPais) {
                echo '<option value="' . $row['CodPais'] . '" selected>' . $row['NomPais'] . '</option>';
              } else {
                echo '<option value="' . $row['CodPais'] . '">' . $row['NomPais'] . '</option>';
              }

          }
            ?>

          </select>

      </div>

      <div class="form-group">
        <label for="sel1">Grupo Sanguíneo:</label>
        <select class="form-control" name="CodTipSan">
          <?php foreach($resTipSan as $row){
            if ($row['CodTipSan'] == $CodTipSan) {
              echo '<option value="' . $row['CodTipSan'] . '" selected>' . $row['AbrTipSan'] . '</option>';
            } else{
              echo '<option value="' . $row['CodTipSan'] . '" S>' . $row['AbrTipSan'] . '</option>';
          }
        }
          ?>
        </select>
      </div>

      <div class="form-group">

        <label for="CorAlu">Correo</label>
        <input type="email" name="CorAlu" class="form-control" value="<?php  echo $CorAlu ?>">

      </div>

      <div class="form-group">

        <label for="CelAlu">Celular</label>
        <input type="text" name="CelAlu" class="form-control" value="<?php  echo $CelAlu ?>">

      </div>

      <div class="form-group">

        <label for="TelAlu">Telefono</label>
        <input type="text" name="TelAlu" class="form-control" value="<?php  echo $TelAlu ?>">

      </div>

      <div class="form-group">

        <button type="submit" class="btn btn-primary" name="btn" value="2">Guardar</button>

      </div>

    </form>

  </div>
