<?php

use \Jacwright\RestServer\RestException;

class TarifsRemboursementController
{

	private $manager;
    private $erreur;

	public function __construct(){
		$this->manager = new TarifsRemboursementManager();
        $this->erreur = new Erreur();
	}

    /**
     * Gets all tarifsRemboursement
     *
     * @url GET /tarifsremboursement
     * 
     */

    public function getAllTarifsRemboursement(){       

        $listeTarifsRemboursement = $this->manager->readAll();
        
        $tabAllTarifsRemboursement = [];

        foreach ($listeTarifsRemboursement as $key => $tarifsRemboursement) {

                $data = [
                'TypeDeFrais' => $tarifsRemboursement->getTypeDeFrais(),
                'MontantRemboursement' => $tarifsRemboursement->getMontantRemboursement(),
                'Unites' => $tarifsRemboursement->getUnites()
                ];     

                $tabAllTarifsRemboursement[] = $data;

        }

        if ($listeTarifsRemboursement){
            return ['tarifsRemboursements' => $tabAllTarifsRemboursement];
        }
    
    }

    /**
     * Get one tarifsRemboursement by id
     *
     * @url GET /tarifsremboursement/$IdTypeDeFrais
     * 
     */
  
    public function getOneTarifsRemboursement($IdTypeDeFrais){       

        $selectedTarifsRemboursement = $this->manager->read($IdTypeDeFrais);

        $tabselectedTarifsRemboursement = [
        'TypeDeFrais' => $selectedTarifsRemboursement->getTypeDeFrais(),
        'MontantRemboursement' => $selectedTarifsRemboursement->getMontantRemboursement(),
        'Unites' => $selectedTarifsRemboursement->getUnites()
        ];

                
        $tab[] = $tabselectedTarifsRemboursement; 

        if ($selectedTarifsRemboursement){
            return ['tarifsRemboursement' => $tab];
        }

    }

    /**
     * Create one tarifsRemboursement
     *
     * @url POST /tarifsremboursement
     * 
     */
  
    public function createOneTarifsRemboursement(){       

        $data = [ 
        'MontantRemboursement'  => $_POST["MontantRemboursement"],
        'Unites' => $_POST["Unites"]
        ];

                        
        $object = new TarifsRemboursement($data);
        $libelle = "tarifsRemboursement";

        return $this->erreur->getCreate($this->manager, $object, $libelle, $data);

    } 
    
    /**
     * Update one tarifsRemboursement
     *
     * @url PUT /tarifsremboursement/$IdTypeDeFrais
     * 
     */

    public function updateOneTarifsRemboursement($IdTypeDeFrais){       

        $method = $_SERVER['REQUEST_METHOD'];
            if ('PUT' === $method) {
                parse_str(file_get_contents('php://input'), $_PUT);
            }

        $data = [
        'TypeDeFrais' => $IdTypeDeFrais,
        'MontantRemboursement'  => $_PUT["MontantRemboursement"],
        'Unites' => $_PUT["Unites"]
        ];


        $object = new TarifsRemboursement($data);
        $libelle = "tarifsRemboursement";

        return $this->erreur->getUpdate($this->manager, $object, $libelle, $data);

    }

    /**
     * Delete one tarifsRemboursement
     *
     * @url DELETE /tarifsremboursement/$IdTypeDeFrais
     * 
     */
  
    public function deleteOneTarifRemboursement($IdTypeDeFrais){       

        $result = $this->manager->delete($IdTypeDeFrais);

        return ['success' => $result];

    }
    
}

  
