<?php

require_once 'Manager.php';

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

   //  !! TODO : change PDO::PARAM_ to good params !!


  public function create(Client & $client) {
    $this->pdoStatement = $this->pdo->prepare("INSERT INTO Client( NomClient, PrenomClient, Adresse1Client, Adresse2Client, CodePostalClient, VilleClient, TelephoneBureauClient, TelephoneMobileClient, MailClient, BudgetMaxRemboursementClient)"
            . " VALUES(:NomClient, :PrenomClient, :Adresse1Client , :Adresse2Client , :CodePostalClient , :VilleClient, :TelephoneBureauClient, :TelephoneMobileClient, :MailClient, :BudgetMaxRemboursementClient)");
    $this->pdoStatement->bindValue(':NomClient', $client->getNom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':PrenomClient', $client->getPrenom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse1Client', $client->getGenre(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse2Client', $client->getDateN(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CodePostalClient', $client->getEmail(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':VilleClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneBureauClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneMobileClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MailClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':BudgetMaxRemboursementClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetch();
    $client = new Client($data);
    return $client;
  }

  //  !! TODO : change PDO::PARAM_ to good params !!

  public function update(Client & $client) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE * FROM Client(NomClient, PrenomClient, Adresse1Client, Adresse2Client, CodePostalClient, VilleClient,TelephoneBureauClient, TelephoneMobileClient, MailClient, BudgetMaxRemboursementClient )"
            . " VALUES(:NomClient,:PrenomClient,:Adresse1Client ,:Adresse2Client ,:CodePostalClient ,:VilleClient, :TelephoneBureauClient, :TelephoneMobileClient, :MailClient, :BudgetMaxRemboursementClient) WHERE IdClient = :IdClient");
    $this->pdoStatement->bindValue(':IdClient', $client->getId(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':NomClient', $client->getNom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':PrenomClient', $client->getPrenom(), PDO::PARAM_STR;
    $this->pdoStatement->bindValue(':Adresse1Client', $client->getGenre(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse2Client', $client->getDateN(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CodePostalClient', $client->getEmail(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':VilleClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneBureauClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneMobileClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MailClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':BudgetMaxRemboursementClient', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $data = $this->pdoSatement->fetch();
    $client = new Client($data);
    return $client;
  }

  public function delete($IdClient) {
    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM Client WHERE IdClient = :IdClient");
    $this->pdoStatement->bindValue(':IdClient', $IdClient, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $data = $this->pdoSatement->fetch();
    $client = new Client($data);
    return $client;
  }

}
