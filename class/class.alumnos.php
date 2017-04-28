<?php

  /**
   * Clase Contenedora de Alumnos
   */
  class Alumnos
  {
    private $db;

    public function __construct($db){
        $this->conn = $db;
    }

    private function validaDocumento(){

    }

    public function create($CodAlu,$NomAlu,$ApeAlu,$DocAlu,$FecNacAlu,$CorAlu,$CelAlu,$TelAlu,$DomAlu,$CodTipSex,$CodEstCiv,$CodPais,$CodTipSan,$CodTipDoc){
      try {
        $stmt = $this->conn->prepare('
          INSERT INTO Alumnos(CodAlu,NomAlu,ApeAlu,DocAlu,FecNacAlu,CorAlu,CelAlu,TelAlu,DomAlu,CodTipSex,CodEstCiv,CodPais,CodTipSan,CodTipDoc)
          VALUES (:CodAlu,:NomAlu,:ApeAlu,:DocAlu,:FecNacAlu,:CorAlu,:CelAlu,:TelAlu,:DomAlu,:CodTipSex,:CodEstCiv,:CodPais,:CodTipSan,:CodTipDoc)');
        $stmt->bindparam(':CodAlu',$CodAlu);
        $stmt->bindparam(':NomAlu',$NomAlu);
        $stmt->bindparam(':ApeAlu',$ApeAlu);
        $stmt->bindparam(':DocAlu',$DocAlu);
        $stmt->bindparam(':FecNacAlu',$FecNacAlu);
        $stmt->bindparam(':CorAlu',$CorAlu);
        $stmt->bindparam(':CelAlu',$CelAlu);
        $stmt->bindparam(':TelAlu',$TelAlu);
        $stmt->bindparam(':DomAlu',$DomAlu);
        $stmt->bindparam(':CodTipSex',$CodTipSex);
        $stmt->bindparam(':CodEstCiv',$CodEstCiv);
        $stmt->bindparam(':CodPais',$CodPais);
        $stmt->bindparam(':CodTipSan',$CodTipSan);
        $stmt->bindparam(':CodTipDoc',$CodTipDoc);
        $stmt->execute();
        return true;
      } catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }

    }

    public function show(){
      try{
        $stmt = $this->conn->prepare('
        SELECT
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
        INNER JOIN Paises PA ON PA.CodPais = AL.CodPais
        ORDER BY AL.CodAlu
        ');
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function traercodigo(){
      try{
        $stmt = $this->conn->prepare('
        SELECT
	         (CASE
    	      WHEN CodAlu IS NULL THEN 1
            ELSE MAX(CodAlu)+1
            END) AS CodAlu
        FROM `Alumnos`');
        $stmt->execute();
        $CodAlu = $stmt->fetch(PDO::FETCH_ASSOC);
        return $CodAlu['CodAlu'];
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }


    }

    public function edit($CodAlu){
      try{
        $stmt = $this->conn->prepare('
        SELECT
          AL.CodAlu AS CodAlu,
          AL.NomAlu AS NomAlu,
          AL.ApeAlu AS ApeAlu,
          TD.CodTipDoc AS CodTipDoc,
          AL.DocAlu AS DocAlu,
          AL.FecNacAlu AS FecNacAlu,
          AL.DomAlu AS DomAlu,
          TSE.CodTipSex AS CodTipSex,
          TEC.CodEstCiv AS CodEstCiv,
          PA.CodPais AS CodPais,
          TS.CodTipSan AS CodTipSan,
          AL.CorAlu AS CorAlu,
          AL.CelAlu AS CelAlu,
          AL.TelAlu AS TelAlu
        FROM Alumnos AL
        INNER JOIN TipDoc TD ON TD.CodTipDoc = AL.CodTipDoc
        INNER JOIN TipEstCiv TEC ON TEC.CodEstCiv = AL.CodEstCiv
        INNER JOIN TipSan TS ON TS.CodTipSan = AL.CodTipSan
        INNER JOIN TipSex TSE ON TSE.CodTipSex = AL.CodTipSex
        INNER JOIN Paises PA ON PA.CodPais = AL.CodPais
        WHERE AL.CodAlu = :CodAlu
        ');
        $stmt->bindparam(':CodAlu',$CodAlu);
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }

    }

    public function update($CodAlu,$NomAlu,$ApeAlu,$DocAlu,$FecNacAlu,$CorAlu,$CelAlu,$TelAlu,$DomAlu,$CodTipSex,$CodEstCiv,$CodPais,$CodTipSan,$CodTipDoc){
      try{
        $stmt = $this->conn->prepare('
        UPDATE Alumnos
        SET
          NomAlu = :NomAlu,
          ApeAlu = :ApeAlu,
          DocAlu = :DocAlu,
          FecNacAlu = :FecNacAlu,
          CorAlu = :CorAlu,
          CelAlu = :CelAlu,
          TelAlu = :TelAlu,
          DomAlu = :DomAlu,
          CodTipSex = :CodTipSex,
          CodEstCiv = :CodEstCiv,
          CodPais = :CodPais,
          CodTipSan = :CodTipSan,
          CodTipDoc = :CodTipDoc
        WHERE CodAlu = :CodAlu
        ');
        $stmt->bindparam(':CodAlu',$CodAlu);
        $stmt->bindparam(':NomAlu',$NomAlu);
        $stmt->bindparam(':ApeAlu',$ApeAlu);
        $stmt->bindparam(':DocAlu',$CodAlu);
        $stmt->bindparam(':FecNacAlu',$FecNacAlu);
        $stmt->bindparam(':CorAlu',$CorAlu);
        $stmt->bindparam(':CelAlu',$CelAlu);
        $stmt->bindparam(':TelAlu',$TelAlu);
        $stmt->bindparam(':DomAlu',$DomAlu);
        $stmt->bindparam(':CodTipSex',$CodTipSex);
        $stmt->bindparam(':CodEstCiv',$CodEstCiv);
        $stmt->bindparam(':CodPais',$CodPais);
        $stmt->bindparam(':CodTipSan',$CodTipSan);
        $stmt->bindparam(':CodTipDoc',$CodTipDoc);
        $stmt->execute();
        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function getName($CodAlu){
      try{
        $stmt = $this->conn->prepare('
        SELECT NomAlu, ApeAlu, DocAlu FROM Alumnos WHERE CodAlu = :CodAlu
        ');
        $stmt->bindparam(':CodAlu',$CodAlu);
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function delete($CodAlu){
      try{
        $stmt = $this->conn->prepare('
        DELETE FROM Alumnos WHERE CodAlu = :CodAlu
        ');
        $stmt->bindparam(':CodAlu',$CodAlu);
        $stmt->execute();
        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }


      public function show2($NomAlu,$ApeAlu,$DocAlu){

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
        INNER JOIN Paises PA ON PA.CodPais = AL.CodPais
        ';

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


        try{
          if( ! empty($conditions) ) {
          $query .= ' WHERE ' . implode(' AND ', $conditions);
          $stmt = $this->conn->prepare($query);
          $rs = $stmt->execute($parameters);
          return 'hola';
        } else {
          $stmt = $this->conn->prepare($query);
          $rs = $stmt->execute();
          return $rs;
        }
        } catch (PDOException $e) {
          echo $e->getMessage();
          return false;
        }
      }


  }

?>
