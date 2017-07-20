<?php

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

  public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM justificatifs");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectJustificatif = [];


    foreach ($data as $justificatif) {
          $objectJustificatif[] = new Justificatif($justificatif);
        }

    return $objectJustificatif;
  }




  public function create(Justificatifs &$justificatifs) {
      var_dump($justificatifs);
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO justificatifs(IntituleJustificatif, URLNomFichier,MontantJustificatif) VALUES(:IntituleJustificatif, :URLNomFichier,:MontantJustificatif)");
    $this->pdoStatement->bindValue(':IntituleJustificatif', $justificatifs->getIntituleJustificatif(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':URLNomFichier', $justificatifs->getURLNomFichier(), PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':MontantJustificatif', $justificatifs->getMontantJustificatif(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
       var_dump($result);
    if($result){
      $IdJustificatif = $this->pdo->lastInsertId();
      $justificatifs = $this->read($IdJustificatif);
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


  public function delete($IdJustificatif) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM justificatifs WHERE IdJustificatif = $IdJustificatif");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }

}





