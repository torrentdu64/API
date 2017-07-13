<?php

use \Jacwright\RestServer\RestException;

class CLientController
{

	private $clientManager;

	public function __construct(){
		$this->clientManager = new ClientManager();
	}

    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /
     */
    public function test()
    {
        return "Hello kikou";
    }


    /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
     *
     * @url GET /client
     * 
     */
  

    public function getListClients()
    {       
    	$listeClients[] = $this->clientManager->readAll();
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
           //return  $tabClients['kikou'] = $tabClients;
            
        }

        // var_dump($tabClients);
        return $tabClients;
        
    }


    

 // public function getOneClient($id){       
 //        $listeClients[] = $this->clientManager->read($id);
 //        //var_dump($listeClients);

 //        $tabClients = [];

 //    foreach ($listeClients as $key => $client) {
 //                    $tabClients = ['IdClient' => $client->getIdClient(),
 //                           'NomClient' => $client->getNomClient(),
 //                           'PrenomClient' => $client->getPrenomClient(),
 //                           'Adresse1Client' => $client->getAdresse1Client(),
 //                           'Adresse2Client' => $client->getAdresse2Client(),
 //                           'CodePostalClient' => $client->getCodePostalClient(),
 //                           'VilleClient' => $client->getVilleClient(),
 //                           'TelephoneBureauClient' => $client->getTelephoneBureauClient(),
 //                           'TelephoneMobileClient' => $client->getTelephoneMobileClient(),
 //                           'MailClient' => $client->getMailClient(),
 //                           'BudgetMaxRemboursementClient' => $client->getBudgetMaxRemboursementClient(),
 //                ];
 //            //var_dump($listeClients);
 //           //return  $tabClients['kikou'] = $tabClients;
            
 //        }

 //        // var_dump($tabClients);
 //        return $tabClients;
        
 //    }


}

  
