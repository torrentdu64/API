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
    	
        return $listeClients;
    }

}