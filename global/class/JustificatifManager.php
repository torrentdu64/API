<?php

require_once 'Manager.php';

/**
 * Description of FraisManager
 *
 * @author Micka
 */
class JustificatifManager extends Manager {

  public function __construct() {
      parent::__construct();
  }

  public function read($IdJustificatif) {
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM justificatifs WHERE IdJustificatif = :IdJustificatif");
      $this->pdoStatement->bindValue(':IdJustificatif', $IdJustificatif, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $justificatifs = new Justificatif($data);
      return $justificatifs;
  }

        
  public function create( &$justificatifs) {
      var_dump($justificatifs);
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO justificatifs(IntituleJustificatif, URLNomFichier,MontantJustificatif) VALUES(:IntituleJustificatif, :URLNomFichier,:MontantJustificatif)");
    $this->pdoStatement->bindValue(':IntituleJustificatif', $justificatifs->getIntituleJustificatif(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':URLNomFichier', $justificatifs->getURLNomFichier(), PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':MontantJustificatif', $justificatifs->getMontantJustificatif(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
       var_dump($result);
    if($result){
      $id = $this->pdo->lastInsertId();
      $justificatifs = $this->read($id);
    } else {
      return false;
    }  
  }
    
      public function update($justificatifs) {
          var_dump($justificatifs);
    $this->pdoStatement = $this->pdo->prepare("UPDATE justificatifs SET IntituleJustificatif = :IntituleJustificatif, URLNomFichier = :URLNomFichier, MontantJustificatif = :MontantJustificatif WHERE IdJustificatif = :IdJustificatif");
    $this->pdoStatement->bindValue(':IdJustificatif',$justificatifs->getIdJustificatif(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IntituleJustificatif', $justificatifs->getIntituleJustificatif(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':URLNomFichier', $justificatifs->getURLNomFichier(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MontantJustificatif', $justificatifs->getMontantJustificatif(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
    var_dump($result);
    return $justificatifs;
  }
    
    
  public function delete($justificatifs) {
    var_dump($justificatifs);
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM justificatifs WHERE IdJustificatif = :IdJustificatif");
    $this->pdoStatement->bindValue(':IdJustificatif',$justificatifs->getIdJustificatif(), PDO::PARAM_INT);
    $this->pdoStatement->execute();
    var_dump($justificatifs);
    return $justificatifs;
  }
    
    
    
    
    
    }

/*
  public function delete($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM frais WHERE id = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $data = $this->pdoSatement->fetch();
    $frais = new Frais($data);
    return $frais;
  }

}

*/




