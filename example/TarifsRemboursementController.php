<?php

use \Jacwright\RestServer\RestException;

class TarifsRemboursementController
{

	private $remboursementManager;

	public function __construct(){
		$this->remboursementManager = new TarifsRemboursementManager();
	}


    /**
     * Gets all tarifsremboursements
     *
     * @url GET /tarifsremboursement
     * 
     */
  

    public function getAllTarifRemboursement(){       

        $listeTarifsRemboursement = $this->remboursementManager->readAll();
        
        $tabAllTarifsRemboursement = [];



        foreach ($listeTarifsRemboursement as $key => $tarifsRemboursement) {
                 $data = ['TypeDeFrais' => $tarifsRemboursement->getTypeDeFrais(),
                         'MontantRemboursement' => $tarifsRemboursement->getMontantRemboursement(),
                         'Unites' => $tarifsRemboursement->getUnites()
                ];     

                $tabAllTarifsRemboursement[] = $data;
        }

        if ($listeTarifsRemboursement){
            return ['tarifsremboursements' => $tabAllTarifsRemboursement];
        }
    
    }


    /**
     * Gets the tarifsremboursement by TypeDeFrais or current tarifsremboursement
     *
     * @url GET /tarifsremboursement/$TypeDeFrais
     * 
     */
  

    public function getOneTarifRemboursement($TypeDeFrais){       

     $selectedTarifsRemboursement = $this->remboursementManager->read($TypeDeFrais);
        // var_dump($selectedClients);


        $tabselectedTarifsRemboursement = ['TypeDeFrais' => $selectedTarifsRemboursement->getTypeDeFrais(),
                                           'MontantRemboursement' => $selectedTarifsRemboursement->getMontantRemboursement(),
                                           'Unites' => $selectedTarifsRemboursement->getUnites()
                                          ];

                
                 $tab[] = $tabselectedTarifsRemboursement; 

        if ($selectedTarifsRemboursement){
            return ['tarifsremboursement' => $tab];
        }
    }

    /**
     * Post one tarifsremboursement
     *
     * @url POST /tarifsremboursement
     * 
     */
  

    public function createOneTarifRemboursement(){       

        // foreach ($clientJSON as $key) {
        //     $json = $key;
        // }

        // var_dump($json);

        var_dump($_POST);


            $data = [ 'TypeDeFrais' => $_POST["TypeDeFrais"],
                       'MontantRemboursement'  => $_POST["MontantRemboursement"],
                       'Unites' => $_POST["Unites"]
                    ];

                        
        $tarifsremboursementJSON = new tarifsremboursement($data);


        return $this->remboursementManager->create($tarifsremboursementJSON);

        // return $result;

        } 
    

        /**
         * Update one tarifsremboursement
         *
         * @url PUT /tarifsremboursement/$TypeDeFrais
         * 
         */

    public function updateOneTarifRemboursement($TypeDeFrais){       

        // foreach ($clientJSON as $key) {
        //     $json = $key;
        // }

        // var_dump($_POST);

        $method = $_SERVER['REQUEST_METHOD'];
            if ('PUT' === $method) {
                parse_str(file_get_contents('php://input'), $_PUT);
                 //var_dump($_PUT); //$_PUT contains put fields 
        }

        $data = [ 'TypeDeFrais' => $_PUT["TypeDeFrais"],
                       'MontantRemboursement'  => $_PUT["MontantRemboursement"],
                       'Unites' => $_PUT["Unites"]
                    ];


        $tarifsremboursement = new TarifsRemboursement($data);

        return $this->remboursementManager->update($tarifsremboursement);

        // return $result;

        } 

    


    /**
     * Delete one tarifsremboursement
     *
     * @url DELETE /tarifsremboursement/$TypeDeFrais
     * 
     */
  

    public function deleteOneTarifRemboursement($TypeDeFrais){       


        // return "Le tarifsremboursement n° ".$deleteClient->getTypeDeFraisClient()." au nom de ".$deleteClient->getNomClient()." a bien été supprimé !";

        $ok = $this->remboursementManager->delete($TypeDeFrais);
        $result = ['success' => $ok];
        
        return $result;
    }

    
}

  
