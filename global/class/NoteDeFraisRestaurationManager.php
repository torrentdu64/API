<?php

/**
 * Description of FraisManager
 *
 * @author Micka
 */

class NoteDeFraisRestaurationManager extends Manager {

  public function __construct() {
      parent::__construct();
  }

  public function read($IdNoteDeFrais) {
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM notedefrais_restauration WHERE IdNoteDeFrais = :IdNoteDeFrais");
      $this->pdoStatement->bindValue(':IdNoteDeFrais', $IdNoteDeFrais, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $noteDeFraisRestauration = new NoteDeFraisRestauration($data);
      return $noteDeFraisRestauration;
  }

  public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM notedefrais_restauration");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectNotedefraisRestauration = [];


    foreach ($data as $noteDeFraisRestauration) {
          $objectNotedefraisRestauration[] = new NoteDeFraisRestauration($noteDeFraisRestauration);
        }

    return $objectNotedefraisRestauration;
  }

  public function create(NoteDeFrais $noteDeFraisRestauration) {
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO notedefrais_restauration (IntituleNDF, DateNDF, MotifNDF, MontantPrevu, EtatNDF, Commentaire,  NbreRepasSiRestauration,Login,IdClient) VALUES(:IntituleNDF, :DateNDF, :MotifNDF , :MontantPrevu , :EtatNDF , :Commentaire,:NbreRepasSiRestauration, :Login, :IdClient )");
    $this->pdoStatement->bindValue(':IntituleNDF', $noteDeFraisRestauration->getIntituleNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':DateNDF', $noteDeFraisRestauration->getDateNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MotifNDF', $noteDeFraisRestauration->getMotifNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MontantPrevu', $noteDeFraisRestauration->getMontantPrevu(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':EtatNDF', $noteDeFraisRestauration->getEtatNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Commentaire', $noteDeFraisRestauration->getCommentaire(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':NbreRepasSiRestauration', $noteDeFraisRestauration->getNbreRepasSiRestauration(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':Login', $noteDeFraisRestauration->getLogin(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IdClient', $noteDeFraisRestauration->getIdClient(), PDO::PARAM_INT);   
    $result = $this->pdoStatement->execute();
    if($result){
      $id = $this->pdo->lastInsertId();
      $noteDeFraisRestauration = $this->read($id);
    } else {
      return false;
    }  
  }

    
      public function update(NoteDeFrais $noteDeFraisRestauration) {         
    $this->pdoStatement = $this->pdo->prepare("UPDATE notedefrais_restauration SET IntituleNDF = :IntituleNDF, DateNDF = :DateNDF, MotifNDF = :MotifNDF, MontantPrevu = :MontantPrevu , EtatNDF = :EtatNDF , Commentaire = :Commentaire, NbreRepasSiRestauration = :NbreRepasSiRestauration,Login = :Login,IdClient = :IdClient WHERE IdNoteDeFrais = :IdNoteDeFrais");
    $this->pdoStatement->bindValue(':IdNoteDeFrais',$noteDeFraisRestauration->getIdNoteDeFrais(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IntituleNDF', $noteDeFraisRestauration->getIntituleNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':DateNDF', $noteDeFraisRestauration->getDateNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MotifNDF', $noteDeFraisRestauration->getMotifNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MontantPrevu', $noteDeFrais->getMontantPrevu(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':EtatNDF', $noteDeFraisRestauration->getEtatNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Commentaire', $noteDeFraisRestauration->getCommentaire(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':NbreRepasSiRestauration', $noteDeFraisRestauration->getNbreRepasSiRestauration(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':Login', $noteDeFraisRestauration->getLogin(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IdClient', $noteDeFraisRestauration->getIdClient(), PDO::PARAM_INT);  
    $this->pdoStatement->execute();
    return $noteDeFraisRestauration;
  }
    
    
  public function delete($IdNoteDeFrais) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM notedefrais_restauration WHERE IdNoteDeFrais = $IdNoteDeFrais");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }
  
    
    }
