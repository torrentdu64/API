<?php

use \Jacwright\RestServer\RestException;

class ClientController{

	private $manager;

	public function __construct(){
		$this->manager = new ClientManager();
    $this->erreur = new Erreur();
	}

  /**
   * Get hello kikou
   *
   * @url GET /
   *
   */

  public function hellokikou(){
      $tab[] = ["success" => "Hello kikou ! :)"];
      return $tab;
  }

  /**
   * Gets all clients
   *
   * @url GET /client
   *
   */

  public function getAllClients(){

    $listeClients = $this->manager->readAll();

    $tabAllClient = [];

    foreach ($listeClients as $key => $client) {
        $data = [
        'IdClient' => $client->getIdClient(),
        'NomClient' => $client->getNomClient(),
        'PrenomClient' => $client->getPrenomClient(),
        'Adresse1Client' => $client->getAdresse1Client(),
        'Adresse2Client' => $client->getAdresse2Client(),
        'CodePostalClient' => $client->getCodePostalClient(),
        'VilleClient' => $client->getVilleClient(),
        'TelephoneBureauClient' => $client->getTelephoneBureauClient(),
        'TelephoneMobileClient' => $client->getTelephoneMobileClient(),
        'MailClient' => $client->getMailClient(),
        'BudgetMaxRemboursementClient' => $client->getBudgetMaxRemboursementClient()
       ];
              
       $tabAllClient[] = $data;

    }

    if ($listeClients){
        return ['clients' => $tabAllClient];
    }

  }

  /**
   * Get one client by id
   *
   * @url GET /client/$IdClient
   *
   */


  public function getOneClient($IdClient){

    $selectedClients = $this->manager->read($IdClient);

      $tabSelectedClients = [
      'IdClient' => $selectedClients->getIdClient(),
      'NomClient' => $selectedClients->getNomClient(),
      'PrenomClient' => $selectedClients->getPrenomClient(),
      'Adresse1Client' => $selectedClients->getAdresse1Client(),
      'Adresse2Client' => $selectedClients->getAdresse2Client(),
      'CodePostalClient' => $selectedClients->getCodePostalClient(),
      'VilleClient' => $selectedClients->getVilleClient(),
      'TelephoneBureauClient' => $selectedClients->getTelephoneBureauClient(),
      'TelephoneMobileClient' => $selectedClients->getTelephoneMobileClient(),
      'MailClient' => $selectedClients->getMailClient(),
      'BudgetMaxRemboursementClient' => $selectedClients->getBudgetMaxRemboursementClient()
      ];

      $tab[] = $tabSelectedClients;

      if ($selectedClients){
          return ['client' => $tab];
      }

  }

  /**
   * Create one client
   *
   * @url POST /client
   *
   */

  public function createOneClient(){

    $data = [
    'NomClient' => $_POST["NomClient"],
    'PrenomClient'  => $_POST["PrenomClient"],
    'Adresse1Client' => $_POST["Adresse1Client"],
    'Adresse2Client' => $_POST["Adresse2Client"],
    'CodePostalClient' => $_POST["CodePostalClient"],
    'VilleClient' => $_POST["VilleClient"],
    'TelephoneBureauClient' => $_POST["TelephoneBureauClient"],
    'TelephoneMobileClient' => $_POST["TelephoneMobileClient"],
    'MailClient' => $_POST["MailClient"],
    'BudgetMaxRemboursementClient' => $_POST["BudgetMaxRemboursementClient"]
    ];

    $object = new Client($data);
    $libelle = "client";

    return $this->erreur->getErreur($this->manager, $object, $libelle, $data);

  }


  /**
   * Update one client
   *
   * @url PUT /client/$IdClient
   *
   */

  public function updateOneClient($IdClient){

       $method = $_SERVER['REQUEST_METHOD'];
          if ('PUT' === $method) {
            parse_str(file_get_contents('php://input'), $_PUT);
          }

       $data = [ 
       'IdClient' => $IdClient,
       'NomClient' => $_PUT["NomClient"],
       'PrenomClient' => $_PUT["PrenomClient"],
       'Adresse1Client' => $_PUT["Adresse1Client"],
       'Adresse2Client' => $_PUT["Adresse2Client"],
       'CodePostalClient' => $_PUT["CodePostalClient"],
       'VilleClient' => $_PUT["VilleClient"],
       'TelephoneBureauClient' => $_PUT["TelephoneBureauClient"],
       'TelephoneMobileClient' => $_PUT["TelephoneMobileClient"],
       'MailClient' => $_PUT["MailClient"],
       'BudgetMaxRemboursementClient' => $_PUT["BudgetMaxRemboursementClient"]
       ];

      $object = new Client($data);
      $libelle = "client";

      return $this->erreur->getErreur($this->manager, $object, $libelle, $data);

  }

    /**
     * Delete one client
     *
     * @url DELETE /client/$IdClient
     *
     */

  public function deleteOneClient($IdClient){

    $result = $this->manager->delete($IdClient);

    return ['success' => $result];

  }

}




