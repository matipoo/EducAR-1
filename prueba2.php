<?php

$NomAlu = 'Guido';
$ApeAlu = 'Caffa';
$DocAlu = '37';

$query = 'SELECT
  AL.CodAlu AS CodAlu,
  AL.NomAlu AS NomAlu,
  AL.ApeAlu AS ApeAlu,
  TD.AbrTipDoc AS AbrTipDoc,
  AL.DocAlu AS DocAlu,
  AL.FecNacAlu AS FecNacAlu,
  AL.DomAlu AS DomAlu,
  TSE.DesSex AS DesSex,
  TEC.DesEstCiv AS DesEstCiv,
  PA.NomPais AS NomPais,
  TS.AbrTipSan AS AbrTipSan,
  AL.CorAlu AS CorAlu,
  AL.CelAlu AS CelAlu,
  AL.TelAlu AS TelAlu
FROM Alumnos AL
INNER JOIN TipDoc TD ON TD.CodTipDoc = AL.CodTipDoc
INNER JOIN TipEstCiv TEC ON TEC.CodEstCiv = AL.CodEstCiv
INNER JOIN TipSan TS ON TS.CodTipSan = AL.CodTipSan
INNER JOIN TipSex TSE ON TSE.CodTipSex = AL.CodTipSex
INNER JOIN Paises PA ON PA.CodPais = AL.CodPais';

$conditions = array();
$parameters = array();

if($NomAlu) {
   $parameters[] = $NomAlu;
   $conditions[] = 'NomAlu LIKE ?';
}
if( isset($ApeAlu) ) {
   $parameters[] = $ApeAlu;
   $conditions[] = 'ApeAlu LIKE ?';
}

if( isset($DocAlu) ) {
   $parameters[] = $DocAlu;
   $conditions[] = 'DocAlu LIKE ?';
}

print_r($conditions);
echo '<br>';
print_r($parameters);

echo '<br>';
echo '<br>';
echo '<br>';

$query .= ' WHERE ' . implode(' AND ', $conditions);
echo $query;


 ?>
