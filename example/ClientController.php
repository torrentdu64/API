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
  

    public function deleteOneClient(){       

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
}

  
