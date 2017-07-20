<?php

require_once 'Manager.php';


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
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM tarifsremboursements WHERE TypeDeFrais = :IdTypeDeFrais");
      $this->pdoStatement->bindValue(':IdTypeDeFrais', $IdTypeDeFrais, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $tarifsRemboursements = new TarifsRemboursement($data);
      return $tarifsRemboursements;
  }

    public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM tarifsremboursements");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectTarifsRemboursement = [];


    foreach ($data as $tarifsRemboursement) {
          $objectTarifsRemboursement[] = new TarifsRemboursement($tarifsRemboursement);
        }

    return $objectTarifsRemboursement;
  }
    
  public function create(TarifsRemboursements &$tarifsRemboursements) {
      var_dump($tarifsRemboursements);
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO tarifsremboursements( MontantRemboursement, Unites) VALUES(:MontantRemboursement, :Unites)");
    $this->pdoStatement->bindValue(':MontantRemboursement', $tarifsRemboursements->getMontantRemboursement(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Unites', $tarifsRemboursements->getUnites(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
       var_dump($result);
    if($result){
      $TypeDeFrais = $this->pdo->lastInsertId();
      $tarifsRemboursements = $this->read($TypeDeFrais);
    } else {
      return false;
    }  
  }

    
    public function update(TarifsRemboursements $tarifsRemboursements) {
    var_dump($tarifsRemboursements);          
    $this->pdoStatement = $this->pdo->prepare("UPDATE tarifsremboursements SET MontantRemboursement = :MontantRemboursement, Unites = :Unites WHERE TypeDeFrais = :TypeDeFrais");
    $this->pdoStatement->bindValue(':TypeDeFrais',$tarifsRemboursements->getTypeDeFrais(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':MontantRemboursement', $tarifsRemboursements->getMontantRemboursement(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Unites', $tarifsRemboursements->getUnites(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
    var_dump($result);
    return $tarifsRemboursements;
  }
    
    
  public function delete($IdTypeDeFrais) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM tarifsremboursements WHERE TypeDeFrais = $IdTypeDeFrais");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }    
}




