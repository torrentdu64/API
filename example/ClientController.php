<?php

use \Jacwright\RestServer\RestException;

class ClientController
{

	private $clientManager;

	public function __construct(){
		$this->clientManager = new ClientManager();
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
     * Gets all users
     *
     * @url GET /client
     *
     */


    public function getAllClients(){

        $listeClients = $this->clientManager->readAll();

        $tabAllClient = [];

        foreach ($listeClients as $key => $client) {
                $data = ['IdClient' => $client->getIdClient(),
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

        return $tabAllClient;

    }





    /**
     * Gets the user by id or current user
     *
     * @url GET /client/$id
     *
     */


    public function getOneClient($id){

    	$selectedClients = $this->clientManager->read($id);
        // var_dump($selectedClients);

        $tabSelectedClients =
        ['IdClient' => $selectedClients->getIdClient(),
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


        return $tabSelectedClients;

    }

    /**
     * Post one user
     *
     * @url POST /client
     *
     */


    public function createOneClient(){
      // $champ = ["NomClient", "PrenomClient", "Adresse1Client", "Adresse2Client","CodePostalClient", "VilleClient" , "TelephoneBureauClient", "TelephoneMobileClient", "MailClient", "BudgetMaxRemboursementClient"];
      // foreach ($champ as $key) {
           // if(isset($_POST[$key])){
            $data = [ 'NomClient' => $_POST["NomClient"],
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
                        $clientJSON = new Client($data);
                        $ok = $this->clientManager->create($clientJSON);
                        return $result = ['success' => $ok];

           // }
         // if(isset($_POST["NomClient"]) && isset($_POST["PrenomClient"]) && isset($_POST["Adresse1Client"]) && isset($_POST["Adresse2Client"]) && isset($_POST["CodePostalClient"]) && isset($_POST["VilleClient"]), isset($_POST["TelephoneBureauClient"]) && isset($_POST["TelephoneMobileClient"]) && isset($_POST["MailClient"]) && isset($_POST["BudgetMaxRemboursementClient"]) ){



         // }else{
         //  return "nop";
         // }
      //}
  }


    /**
     * Delete one user
     *
     * @url DELETE /client/$id
     *
     */


    public function deleteOneClient($id){


        // return "Le client n° ".$deleteClient->getIdClient()." au nom de ".$deleteClient->getNomClient()." a bien été supprimé !";

        $ok = $this->clientManager->delete($id);
        $result = ['success' => $ok];

        return $result;
    }



}


