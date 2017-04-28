<?php

  /**
   *
   */
  class Tipsex{
    public $db;

    function __construct($db)
    {
      $this->conn = $db;
    }

    function show(){
      try {
        $stmt = $this->conn->prepare('SELECT * FROM TipSex');
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }

    }
  }

 ?>
