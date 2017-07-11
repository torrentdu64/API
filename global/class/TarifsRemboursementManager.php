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

  public function read($TypeDeFrais) {
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM tarifsremboursements WHERE TypeDeFrais = :TypeDeFrais");
      $this->pdoStatement->bindValue(':TypeDeFrais', $TypeDeFrais, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $tarifsRemboursements = new TarifsRemboursements($data);
      return $tarifsRemboursements;
  }

    
  public function create(TarifsRemboursements &$tarifsRemboursements) {
      var_dump($tarifsRemboursements);
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO tarifsremboursements( MontantRemboursement, Unites) VALUES(:MontantRemboursement, :Unites)");
    $this->pdoStatement->bindValue(':MontantRemboursement', $tarifsRemboursements->getMontantRemboursement(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Unites', $tarifsRemboursements->getUnites(), PDO::PARAM_STR);
    $result = $this->pdoStatement->execute();
       var_dump($result);
    if($result){
      $id = $this->pdo->lastInsertId();
      $tarifsRemboursements = $this->read($id);
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
    
    
  public function delete(TarifsRemboursements $tarifsRemboursements) {
    var_dump($tarifsRemboursements);
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM tarifsremboursements WHERE TypeDeFrais = :TypeDeFrais");
    $this->pdoStatement->bindValue(':TypeDeFrais', $tarifsRemboursements->getTypeDeFrais(), PDO::PARAM_INT);
    $this->pdoStatement->execute();
    var_dump($tarifsRemboursements);
    return $tarifsRemboursements;
  }
    
    
    
}




