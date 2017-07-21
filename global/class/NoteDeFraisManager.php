<?php

/**
 * Description of FraisManager
 *
 * @author Micka
 */

class NoteDeFraisManager extends Manager {

  public function __construct() {
      parent::__construct();
  }

  public function read($IdNoteDeFrais) {
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM notedefrais WHERE IdNoteDeFrais = :IdNoteDeFrais");
      $this->pdoStatement->bindValue(':IdNoteDeFrais', $IdNoteDeFrais, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $noteDeFrais = new NoteDeFrais($data);
      return $noteDeFrais;
  }

  public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM notedefrais");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectNotedefrais = [];


    foreach ($data as $noteDeFrais) {
          $objectNotedefrais[] = new NoteDeFrais($noteDeFrais);
        }

    return $objectNotedefrais;
  }

  public function create(NoteDeFrais $noteDeFrais) {
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO notedefrais (IntituleNDF, DateNDF, MotifNDF, MontantPrevu, EtatNDF, Commentaire, NbreNuiteesSiHotellerie, NbreRepasSiRestauration, CoordonneesGPSDepartSiTransport, CoordonneesGPSArriveeSiTransport,TypeDeTransport,DistanceSiTransport,Login,IdClient) VALUES(:IntituleNDF, :DateNDF, :MotifNDF , :MontantPrevu , :EtatNDF , :Commentaire, :NbreNuiteesSiHotellerie, :NbreRepasSiRestauration, :CoordonneesGPSDepartSiTransport, :CoordonneesGPSArriveeSiTransport, :TypeDeTransport, :DistanceSiTransport, :Login, :IdClient )");
    $this->pdoStatement->bindValue(':IntituleNDF', $noteDeFrais->getIntituleNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':DateNDF', $noteDeFrais->getDateNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MotifNDF', $noteDeFrais->getMotifNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MontantPrevu', $noteDeFrais->getMontantPrevu(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':EtatNDF', $noteDeFrais->getEtatNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Commentaire', $noteDeFrais->getCommentaire(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':NbreNuiteesSiHotellerie', $noteDeFrais->getNbreNuiteesSiHotellerie(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':NbreRepasSiRestauration', $noteDeFrais->getNbreRepasSiRestauration(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':CoordonneesGPSDepartSiTransport', $noteDeFrais->getCoordonneesGPSDepartSiTransport(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CoordonneesGPSArriveeSiTransport', $noteDeFrais->getCoordonneesGPSArriveeSiTransport(), PDO::PARAM_STR); 
    $this->pdoStatement->bindValue(':TypeDeTransport',$noteDeFrais->getTypeDeTransport(), PDO::PARAM_STR);  
    $this->pdoStatement->bindValue(':DistanceSiTransport', $noteDeFrais->getDistanceSiTransport(), PDO::PARAM_STR); 
    $this->pdoStatement->bindValue(':Login', $noteDeFrais->getLogin(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IdClient', $noteDeFrais->getIdClient(), PDO::PARAM_INT);   
    $result = $this->pdoStatement->execute();
    if($result){
      $id = $this->pdo->lastInsertId();
      $noteDeFrais = $this->read($id);
    } else {
      return false;
    }  
  }

    
      public function update(NoteDeFrais $noteDeFrais) {         
    $this->pdoStatement = $this->pdo->prepare("UPDATE notedefrais SET IntituleNDF = :IntituleNDF, DateNDF = :DateNDF, MotifNDF = :MotifNDF, MontantPrevu = :MontantPrevu , EtatNDF = :EtatNDF , Commentaire = :Commentaire, NbreNuiteesSiHotellerie = :NbreNuiteesSiHotellerie, NbreRepasSiRestauration = :NbreRepasSiRestauration, CoordonneesGPSDepartSiTransport = :CoordonneesGPSDepartSiTransport, CoordonneesGPSArriveeSiTransport = :CoordonneesGPSArriveeSiTransport,  TypeDeTransport = :TypeDeTransport, DistanceSiTransport = :DistanceSiTransport,Login = :Login,IdClient = :IdClient WHERE IdNoteDeFrais = :IdNoteDeFrais");
    $this->pdoStatement->bindValue(':IdNoteDeFrais',$noteDeFrais->getIdNoteDeFrais(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IntituleNDF', $noteDeFrais->getIntituleNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':DateNDF', $noteDeFrais->getDateNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MotifNDF', $noteDeFrais->getMotifNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MontantPrevu', $noteDeFrais->getMontantPrevu(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':EtatNDF', $noteDeFrais->getEtatNDF(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Commentaire', $noteDeFrais->getCommentaire(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':NbreNuiteesSiHotellerie', $noteDeFrais->getNbreNuiteesSiHotellerie(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':NbreRepasSiRestauration', $noteDeFrais->getNbreRepasSiRestauration(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':CoordonneesGPSDepartSiTransport', $noteDeFrais->getCoordonneesGPSDepartSiTransport(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CoordonneesGPSArriveeSiTransport', $noteDeFrais->getCoordonneesGPSArriveeSiTransport(), PDO::PARAM_STR); 
    $this->pdoStatement->bindValue(':TypeDeTransport',$noteDeFrais->getTypeDeTransport(), PDO::PARAM_STR);  
    $this->pdoStatement->bindValue(':DistanceSiTransport', $noteDeFrais->getDistanceSiTransport(), PDO::PARAM_STR); 
    $this->pdoStatement->bindValue(':Login', $noteDeFrais->getLogin(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':IdClient', $noteDeFrais->getIdClient(), PDO::PARAM_INT);  
    $this->pdoStatement->execute();
    return $noteDeFrais;
  }
    
    
  public function delete($IdNoteDeFrais) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM notedefrais WHERE IdNoteDeFrais = $IdNoteDeFrais");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }
  
    
    }




