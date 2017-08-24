<?php

/**
 * Description of FraisManager
 *
 * @author Micka
 */

class TarifsRemboursementManager extends Manager {

  public function __construct() {
      parent::__construct();
  }

  public function read($IdTypeDeFrais) {
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM tarifsremboursement WHERE TypeDeFrais = :IdTypeDeFrais");
      $this->pdoStatement->bindValue(':IdTypeDeFrais', $IdTypeDeFrais, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $tarifsRemboursements = new TarifsRemboursement($data);
      return $tarifsRemboursements;
  }

    public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM tarifsremboursement");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectTarifsRemboursement = [];


    foreach ($data as $tarifsRemboursement) {
          $objectTarifsRemboursement[] = new TarifsRemboursement($tarifsRemboursement);
        }

    return $objectTarifsRemboursement;
  }
    
  public function create(TarifsRemboursement $tarifsRemboursement) {
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO tarifsremboursement (MontantRemboursement, Unites) VALUES(:MontantRemboursement, :Unites)");
    $this->pdoStatement->bindValue(':MontantRemboursement', $tarifsRemboursement->getMontantRemboursement(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Unites', $tarifsRemboursement->getUnites(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
       var_dump($result);
    if($result){
      $IdTypeDeFrais = $this->pdo->lastInsertId();
      $tarifsRemboursement = $this->read($IdTypeDeFrais);
    } else {
      return false;
    }  
  }

    
    public function update(TarifsRemboursement $tarifsRemboursement) {
    var_dump($tarifsRemboursements);          
    $this->pdoStatement = $this->pdo->prepare("UPDATE tarifsremboursement SET MontantRemboursement = :MontantRemboursement, Unites = :Unites WHERE TypeDeFrais = :IdTypeDeFrais");
    $this->pdoStatement->bindValue(':IdTypeDeFrais',$tarifsRemboursement->getTypeDeFrais(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':MontantRemboursement', $tarifsRemboursement->getMontantRemboursement(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Unites', $tarifsRemboursement->getUnites(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
    var_dump($result);
    return $tarifsRemboursement;
  }
    
    
  public function delete($IdTypeDeFrais) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM tarifsremboursement WHERE TypeDeFrais = $IdTypeDeFrais");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }    
}




