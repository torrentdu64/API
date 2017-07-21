<?php

/**
 * Description of ClientManager
 *
 * @author Micka
 */

class ClientManager extends Manager {

  public function __construct() {
    parent::__construct();
  }


  public function read($IdClient) {
    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM client WHERE IdClient = :IdClient");
    $this->pdoStatement->bindValue(':IdClient', $IdClient, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetch();
    $client = new Client($data);
    return $client;
  }

  public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM client");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectClient = [];


    foreach ($data as $clients) {
          $objectClient[] = new Client($clients);
        }

    return $objectClient;
  }



  public function create(Client $client) {

    $this->pdoStatement = $this->pdo->prepare("INSERT INTO client( NomClient, PrenomClient, Adresse1Client, Adresse2Client, CodePostalClient, VilleClient, TelephoneBureauClient, TelephoneMobileClient, MailClient, BudgetMaxRemboursementClient) VALUES(:NomClient, :PrenomClient, :Adresse1Client , :Adresse2Client , :CodePostalClient , :VilleClient, :TelephoneBureauClient, :TelephoneMobileClient, :MailClient, :BudgetMaxRemboursementClient)");
    $this->pdoStatement->bindValue(':NomClient', $client->getNomClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':PrenomClient', $client->getPrenomClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse1Client', $client->getAdresse1Client(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse2Client', $client->getAdresse2Client(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CodePostalClient', $client->getCodePostalClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':VilleClient', $client->getVilleClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneBureauClient', $client->getTelephoneBureauClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneMobileClient', $client->getTelephoneMobileClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MailClient', $client->getMailClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':BudgetMaxRemboursementClient', $client->getBudgetMaxRemboursementClient(), PDO::PARAM_INT);
    $result = $this->pdoStatement->execute();
    if($result){
      $id = $this->pdo->lastInsertId();
      $client = $this->read($id);
    } else {
      return false;
    }
  }

  //  !! TODO : change PDO::PARAM_ to good params !!

  public function update(Client $client) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE client SET NomCLient = :NomClient, PrenomClient =:PrenomClient, Adresse1Client =:Adresse1Client , Adresse2Client = :Adresse2Client , CodePostalClient = :CodePostalClient , VilleClient = :VilleClient, TelephoneBureauClient = :TelephoneBureauClient, TelephoneMobileClient = :TelephoneMobileClient, MailClient = :MailClient, BudgetMaxRemboursementClient = :BudgetMaxRemboursementClient WHERE IdClient = :IdClient");
    $this->pdoStatement->bindValue(':IdClient', $client->getIdClient(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':NomClient', $client->getNomClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':PrenomClient', $client->getPrenomClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse1Client', $client->getAdresse1Client(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse2Client', $client->getAdresse2Client(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CodePostalClient', $client->getCodePostalClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':VilleClient', $client->getVilleClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneBureauClient', $client->getTelephoneBureauClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneMobileClient', $client->getTelephoneMobileClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MailClient', $client->getMailClient(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':BudgetMaxRemboursementClient', $client->getBudgetMaxRemboursementClient(), PDO::PARAM_INT);
    $this->pdoStatement->execute();
    return $client;
  }

  public function delete($IdClient) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM client WHERE IdClient = $IdClient");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }


}



