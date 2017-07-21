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
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM justificatif WHERE IdJustificatif = :IdJustificatif");
      $this->pdoStatement->bindValue(':IdJustificatif', $IdJustificatif, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $justificatifs = new Justificatif($data);
      return $justificatifs;
  }

  public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM justificatif");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectJustificatif = [];


    foreach ($data as $justificatif) {
          $objectJustificatif[] = new Justificatif($justificatif);
        }

    return $objectJustificatif;
  }




  public function create(Justificatif $justificatif) {
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO justificatif (IntituleJustificatif, URLNomFichier,MontantJustificatif) VALUES(:IntituleJustificatif, :URLNomFichier,:MontantJustificatif)");
    $this->pdoStatement->bindValue(':IntituleJustificatif', $justificatif->getIntituleJustificatif(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':URLNomFichier', $justificatif->getURLNomFichier(), PDO::PARAM_STR);
      $this->pdoStatement->bindValue(':MontantJustificatif', $justificatif->getMontantJustificatif(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
    if($result){
      $IdJustificatif = $this->pdo->lastInsertId();
      $justificatif = $this->read($IdJustificatif);
    } else {
      return false;
    }
  }

      public function update(Justificatif $justificatif) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE justificatif SET IntituleJustificatif = :IntituleJustificatif, URLNomFichier = :URLNomFichier, MontantJustificatif = :MontantJustificatif WHERE IdJustificatif = :IdJustificatif");
    $this->pdoStatement->bindValue(':IdJustificatif',$justificatif->getIdJustificatif(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IntituleJustificatif', $justificatif->getIntituleJustificatif(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':URLNomFichier', $justificatif->getURLNomFichier(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MontantJustificatif', $justificatif->getMontantJustificatif(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
    return $justificatif;
  }


  public function delete($IdJustificatif) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM justificatif WHERE IdJustificatif = $IdJustificatif");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }

}




