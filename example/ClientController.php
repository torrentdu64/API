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
     *
     * @url GET /client/
     */
    public function getListClient()
    {       
    	$listeClients = $this->clientManager->readAll();
    	
        $tabClients[] = ['IdClient' => $clients->getIdClient(),
                           'NomClient' => $clients->getNomClient(),
                           'PrenomClient' => $clients->getPrenomClient(),
                           'Adresse1Client' => $clients->getAdresse1Client(),
                           'Adresse2Client' => $clients->getAdresse2Client(),
                           'CodePostalClient' => $clients->getCodePostalClient(),
                           'VilleClient' => $clients->getVilleClient(),
                           'TelephoneBureauClient' => $clients->getTelephoneBureauClient(),
                           'TelephoneMobileClient' => $clients->getTelephoneMobileClient(),
                           'MailClient' => $clients->getMailClient(),
                           'BudgetMaxRemboursementClient' => $clients->getBudgetMaxRemboursementClient(),
                ];


    foreach ($listeClients as $key => $value) {
            $ClientData = [ 'idClient' => $value->getIdClient(),
                            'nomClient' => $value->getNomClient(),
                            'prenomClient' => $value->getPrenomClient(),
                            'adresse1Client' => $value->getAdresse1Client(),
                            'adresse2Client' => $value->getAdresse2Client(),
                            'codePostalClient' => $value->getCodePostalClient(),
                            'villeClient' => $value->getVilleClient(),
                            'telephoneBureauClient' => $value->getTelephoneBureauClient(),
                            'telephoneMobileClient' => $value->getTelephoneMobileClient(),
                            'mailClient' => $value->getMailClient(),
                            'budgetMaxRemboursement' => $value->getBudgetMaxRemboursement()];
            
            $TabClientData[]=$ClientData;
        }
        
        return $TabClientData; // serializes object into JSON


        return $listeClients;
    }

}