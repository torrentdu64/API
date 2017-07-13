<?php

use \Jacwright\RestServer\RestException;

class CLientController
{

	private $clientManager;

	public function __construct(){
		$this->clientManager = new ClientManager();
	}


    /**
     * Gets the user by id or current user
     *
     * @url GET /client/$id
     * 
     */
  

    public function getOneClients($id)
    {       

    	$listeClients = $this->clientManager->read($id);
        // var_dump($listeClients);

        $tabClients = [];

    foreach ($listeClients as $key => $client) {
                    $tabClients = ['IdClient' => $client->getIdClient(),
                           'NomClient' => $client->getNomClient(),
                           'PrenomClient' => $client->getPrenomClient(),
                           'Adresse1Client' => $client->getAdresse1Client(),
                           'Adresse2Client' => $client->getAdresse2Client(),
                           'CodePostalClient' => $client->getCodePostalClient(),
                           'VilleClient' => $client->getVilleClient(),
                           'TelephoneBureauClient' => $client->getTelephoneBureauClient(),
                           'TelephoneMobileClient' => $client->getTelephoneMobileClient(),
                           'MailClient' => $client->getMailClient(),
                           'BudgetMaxRemboursementClient' => $client->getBudgetMaxRemboursementClient(),
                ];
            //var_dump($listeClients);
            $tabClients[] = $tabClients;
            
        }

        // var_dump($tabClients);
        return $tabClients;

    }

}

  
