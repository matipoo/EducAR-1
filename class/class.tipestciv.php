<?php

  /**
   *
   */
  class Tipestciv{
    public $db;

    function __construct($db)
    {
      $this->conn = $db;
    }

    function show(){
      try {
        $stmt = $this->conn->prepare('SELECT * FROM TipEstCiv');
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }

    }
  }

 ?>
