<?php

use \Jacwright\RestServer\RestException;

class CLientController
{

	private $clientManager;

	public function __construct(){
		$this->clientManager = new ClientManager();
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
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /
     */
    public function test()
    {
        return "Hello World";
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

        $tabSelectedClients = ['IdClient' => $selectedClients->getIdClient(),

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

    /**
     * Saves a user to the database
     *
     * @url POST /client
     * @url PUT /users/$id
     */
    public function saveClient($id = null, $data)
    {

      $varr = [ "NomClient" => $_POST['NomClient']];

      return $varr;


      //return var_dump($json);
      // $data = [var_dump($_POST['NomClient'])  ];
      // $client = new Client($data);
      // var_dump($client);
        // ... validate $data properties such as $data->username, $data->firstName, etc.
        // $data->id = $id;
        // $user = User::saveUser($data); // saving the user to the database
        //$user = array("id" => $id, "name" => null);
       // return $user; // returning the updated or newly created user object
    }


}


