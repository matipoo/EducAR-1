<?php
  #Creo objetos de las siguientes tablas para luego utilizarlas:
  #TipDoc, Paises, TipEstCiv, TipSan, TipSex, Alumnos
  #Esto se usara luego para los menues desplegables a la hora de crear usuarios
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

  $Codigo = $Alumnos->traercodigo();

  #Fin de la creación de objetos


?>
    <div class="modal fade" id="modalAlumnosCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    				<h4 class="modal-title" id="myModalLabel">Alta de Alumno</h4>
    			</div>
    			<div class="modal-body">
            <form class="form" action="act/alumnos-create.php" method="post">

              <div class="form-group">

                <label for="CodAlu">Código de Usuario</label>
                <input type="number" name="CodAlu" class="form-control" value="<?php print($Codigo) ?>" readonly="readonly">

              </div>

              <div class="form-group">

                <label for="NomAlu">Nombre</label>
                <input type="text" name="NomAlu" class="form-control">

              </div>

              <div class="form-group">

                <label for="ApeAlu">Apellido</label>
                <input type="text" name="ApeAlu" class="form-control">

              </div>

              <div class="form-group">

                <label for="TipDoc">Documento</label>
                <select class="form-control" name="CodTipDoc">
                  <?php foreach($resTipDoc as $row){
                  echo '<option value="' . $row['CodTipDoc'] . '">' . $row['AbrTipDoc'] . '</option>';
                }
                  ?>
                </select>
                <input type="number" name="DocAlu" class="form-control">

              </div>

              <div class="form-group">

                <label for="FecNacAlu">Fecha de Nacimiento</label>
                    <p>Date: <input type="text" id="datepicker" name="FecNacAlu"></p>

              </div>

              <div class="form-group">

                <label for="DomAlu">Domicilio</label>
                <input type="Text" name="DomAlu" class="form-control">

              </div>

              <div class="form-group">

                <label for="CodTipSex">Sexo</label><br>

                <?php foreach($resTipSex as $row){
                echo '<label class="radio-inline"><input type="radio" name="CodTipSex" value="' . $row['CodTipSex'] . '">' . $row['DesSex'] . '</label>';
              }
                ?>

              </div>

              <div class="form-group">

                <label for="CodEstCiv">Estado Civil</label><br>
                <?php foreach($resTipEstCiv as $row){
                echo '<label class="radio-inline"><input type="radio" name="CodEstCiv" value="' . $row['CodEstCiv'] . '">' . $row['DesEstCiv'] . '</label>';
              }
                ?>

              </div>

              <div class="form-group">

                  <label for="CodTipSex">Pais</label><br>
                  <select class="form-control" name="CodPais">
                    <?php foreach($resPaises as $row){
                    echo '<option value="' . $row['CodPais'] . '">' . $row['NomPais'] . '</option>';
                  }
                    ?>

                  </select>

              </div>

              <div class="form-group">
                <label for="sel1">Grupo Sanguíneo:</label>
                <select class="form-control" name="CodTipSan">
                  <?php foreach($resTipSan as $row){
                  echo '<option value="' . $row['CodTipSan'] . '">' . $row['AbrTipSan'] . '</option>';
                }
                  ?>
                </select>
              </div>

              <div class="form-group">

                <label for="CorAlu">Correo</label>
                <input type="email" name="CorAlu" class="form-control">

              </div>

              <div class="form-group">

                <label for="CelAlu">Celular</label>
                <input type="text" name="CelAlu" class="form-control">

              </div>

              <div class="form-group">

                <label for="TelAlu">Telefono</label>
                <input type="text" name="TelAlu" class="form-control">

              </div>

              <div class="form-group">

                <button type="submit" class="btn btn-primary">Crear</button>

              </div>

            </form>
    			</div>
    		</div>
    	</div>
    </div>
