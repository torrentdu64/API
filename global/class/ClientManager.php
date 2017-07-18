<?php

//require_once 'Manager.php';

/**
 * Description of ClientManager
 *
 * @author Micka
 */
class ClientManager extends Manager {

//============================================================================//
// * Constructeur
//============================================================================//


  public function __construct() {
    parent::__construct();
  }


//============================================================================//
// * CRUD
//   !! TODO : CRUD refacto to generique class !!
//   !!        Pagination ?? !!
//   !!        return Json_encode !!
//
//   Oject attribut =>
//
//   private $IdClient;
//   private $NomClient;
//   private $PrenomClient;
//   private $Adresse1Client;
//   private $Adresse2Client;
//   private $CodePostalClient;
//   private $VilleClient;
//   private $TelephoneBureauClient;
//   private $TelephoneMobileClient;
//   private $MailClient;
//   private $BudgetMaxRemboursementClien
//============================================================================//


  public function read($IdClient) {
    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM Client WHERE IdClient = :IdClient");
    $this->pdoStatement->bindValue(':IdClient', $IdClient, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetch();
    $client = new Client($data);
    return $client;
  }

  public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM Client");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectClient = [];


    foreach ($data as $clients) {
          $objectClient[] = new Client($clients);
        }

    return $objectClient;
  }

   //  !! TODO : change PDO::PARAM_ to good params !!


  public function create(Client &$client) {

    $this->pdoStatement = $this->pdo->prepare("INSERT INTO Client( NomClient, PrenomClient, Adresse1Client, Adresse2Client, CodePostalClient, VilleClient, TelephoneBureauClient, TelephoneMobileClient, MailClient, BudgetMaxRemboursementClient) VALUES(:NomClient, :PrenomClient, :Adresse1Client , :Adresse2Client , :CodePostalClient , :VilleClient, :TelephoneBureauClient, :TelephoneMobileClient, :MailClient, :BudgetMaxRemboursementClient)");
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

  public function update( $client) {
    var_dump($client);
    $this->pdoStatement = $this->pdo->prepare("UPDATE Client SET NomCLient = :NomClient, PrenomClient =:PrenomClient, Adresse1Client =:Adresse1Client , Adresse2Client = :Adresse2Client , CodePostalClient = :CodePostalClient , VilleClient = :VilleClient, TelephoneBureauClient = :TelephoneBureauClient, TelephoneMobileClient = :TelephoneMobileClient, MailClient = :MailClient, BudgetMaxRemboursementClient = :BudgetMaxRemboursementClient WHERE IdClient = :IdClient");
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
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM Client WHERE IdClient = $IdClient");
    $this->pdoStatement->execute();

    //return $this->checkBDD($IdClient);
    $check = $this->checkBDD($IdClient);
    if ($check == NULL) {
      // $destroy[] = $this->pdoStatement->execute();
      return $false;
    } else {
      $destroy[] = $this->pdoStatement->execute();
      return $destroy;
    }
  }


   public function checkBDD($IdClient) {
    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM Client WHERE IdClient = $IdClient");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetch();
    $client = new Client($data);
    $client->getIdClient();
    $tab[] = $client->getIdClient();
    return $tab;
    // if ($client->getIdClient() == NULL) {
    //   return false;
    // } else {
    //   return true;
    // }
  }
}



