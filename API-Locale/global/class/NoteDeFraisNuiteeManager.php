<?php

/**
 * Description of FraisManager
 *
 * @author Micka
 */

class NoteDeFraisNuiteeManager extends Manager {

  public function __construct() {
      parent::__construct();
  }

  public function read($IdNoteDeFraisNuitee) {
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM notedefrais_nuitee WHERE IdNoteDeFraisNuitee = :IdNoteDeFraisNuitee");
      $this->pdoStatement->bindValue(':IdNoteDeFraisNuitee', $IdNoteDeFraisNuitee, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $noteDeFraisNuitee = new NoteDeFraisNuitee($data);
      return $noteDeFraisNuitee;
  }

  public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM notedefrais_nuitee");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectNotedefraisNuitee = [];


    foreach ($data as $noteDeFraisNuitee) {
          $objectNotedefraisNuitee[] = new NoteDeFraisNuitee($noteDeFraisNuitee);
        }

    return $objectNotedefraisNuitee;
  }

  public function create(NoteDeFraisNuitee $noteDeFraisNuitee) {
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO notedefrais_nuitee (IntituleNDF, DateNDF, MotifNDF, MontantPrevu, EtatNDF, Commentaire, NbreNuiteesSiHotellerie,IdClient) VALUES(:IntituleNDF, :DateNDF, :MotifNDF , :MontantPrevu , :EtatNDF , :Commentaire, :NbreNuiteesSiHotellerie, :IdClient )");
    $this->pdoStatement->bindValue(':IntituleNDF', $noteDeFraisNuitee->getIntituleNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':DateNDF', $noteDeFraisNuitee->getDateNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MotifNDF', $noteDeFraisNuitee->getMotifNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MontantPrevu', $noteDeFraisNuitee->getMontantPrevu(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':EtatNDF', $noteDeFraisNuitee->getEtatNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Commentaire', $noteDeFraisNuitee->getCommentaire(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':NbreNuiteesSiHotellerie', $noteDeFraisNuitee->getNbreNuiteesSiHotellerie(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IdClient', $noteDeFraisNuitee->getIdClient(), PDO::PARAM_INT);   
    $result = $this->pdoStatement->execute();
    if($result){
      $id = $this->pdo->lastInsertId();
      $noteDeFraisNuitee = $this->read($id);
    } else {
      return false;
    }  
  }

    
      public function update(NoteDeFraisNuitee $noteDeFraisNuitee) {         
    $this->pdoStatement = $this->pdo->prepare("UPDATE notedefrais_nuitee SET IntituleNDF = :IntituleNDF, DateNDF = :DateNDF, MotifNDF = :MotifNDF, MontantPrevu = :MontantPrevu , EtatNDF = :EtatNDF , Commentaire = :Commentaire, NbreNuiteesSiHotellerie = :NbreNuiteesSiHotellerie, Login = :Login,IdClient = :IdClient WHERE IdNoteDeFraisNuitee = :IdNoteDeFraisNuitee");
    $this->pdoStatement->bindValue(':IdNoteDeFraisNuitee',$noteDeFraisNuitee->getIdNoteDeFraisNuitee(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IntituleNDF', $noteDeFraisNuitee->getIntituleNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':DateNDF', $noteDeFraisNuitee->getDateNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MotifNDF', $noteDeFraisNuitee->getMotifNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MontantPrevu', $noteDeFraisNuitee->getMontantPrevu(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':EtatNDF', $noteDeFraisNuitee->getEtatNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Commentaire', $noteDeFraisNuitee->getCommentaire(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':NbreNuiteesSiHotellerie', $noteDeFraisNuitee->getNbreNuiteesSiHotellerie(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IdClient', $noteDeFrais->getIdClient(), PDO::PARAM_INT);  
    $this->pdoStatement->execute();
    return $noteDeFraisNuitee;
  }
    
    
  public function delete($IdNoteDeFraisNuitee) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM notedefrais_nuitee WHERE IdNoteDeFraisNuitee = $IdNoteDeFraisNuitee");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }
  
    
    }