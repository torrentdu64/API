<?php

use \Jacwright\RestServer\RestException;

class CLientController
{

	private $clientManager;

	public function __construct(){
		$this->clientManager = new ClientManager();
	}

    /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
<<<<<<< HEAD
     *
     * @url GET /client/$id
=======
     *S
     * @url GET /client/
>>>>>>> rollbackgit
     */
  

    public function getListClients($id)
    {       

    	$listeClients = $this->clientManager->read($id);
        //var_dump($listeClients);

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
            $tabClients[] = $listeClients;
            
        }

        // var_dump($tabClients);
        return $listeClients;

    }

}

  
