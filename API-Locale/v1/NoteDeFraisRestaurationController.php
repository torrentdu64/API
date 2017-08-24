<?php

use \Jacwright\RestServer\RestException;

class NoteDeFraisRestaurationController
{

	private $manager;
    private $erreur;

  	public function __construct(){
  		$this->manager = new NoteDeFraisRestaurationManager();
        $this->erreur = new Erreur();
  	}



    /**
     * Gets all noteDeFrais
     *
     * @url GET /notedefraisrestauration
     *
     */


    public function getAllNoteDeFraisRestauration(){


        $listeNoteDeFraisRestauration = $this->manager->readAll();

        $tabAllNoteDeFraisRestauration = [];

        foreach ($listeNoteDeFraisRestauration as $key => $note) {
            $data = [
            'IdNoteDeFraisRestauration' => $note->getIdNoteDeFraisRestauration(),
            'IntituleNDF' => $note->getIntituleNDF(),
            'DateNDF' => $note->getDateNDF(),
            'MotifNDF' => $note->getMotifNDF(),
            'MontantPrevu' => $note->getMontantPrevu(),
            'EtatNDF' => $note->getEtatNDF(),
            'Commentaire' => $note->getCommentaire(),
            'NbreRepasSiRestauration' => $note->getNbreRepasSiRestauration(),
            'Login' => $note->getLogin(),
            'IdClient' => $note->getIdClient()
            ];

            $tabAllNoteDeFraisRestauration[] = $data;


        }


        if ($listeNoteDeFraisRestauration){
            return ['noteDeFraisRestauration' => $tabAllNoteDeFraisRestauration];
        }

    }

    /**
     * Get one noteDeFraisRestauration by id
     *
     * @url GET /notedefraisrestauration/$IdNoteDeFraisRestauration
     *
     */

    public function getOneNoteDeFraisRestauration($IdNoteDeFraisRestauration){

    	$selectedNoteDeFraisRestauration = $this->manager->read($IdNoteDeFraisRestauration);

        $tabSelectedNoteDeFrais = [
        'IdNoteDeFraisRestauration' => $selectedNoteDeFraisRestauration->getIdNoteDeFraisRestauration(),
        'IntituleNDF' => $selectedNoteDeFraisRestauration->getIntituleNDF(),
        'DateNDF' => $selectedNoteDeFraisRestauration->getDateNDF(),
        'MotifNDF' => $selectedNoteDeFraisRestauration->getMotifNDF(),
        'MontantPrevu' => $selectedNoteDeFraisRestauration->getMontantPrevu(),
        'EtatNDF' => $selectedNoteDeFraisRestauration->getEtatNDF(),
        'Commentaire' => $selectedNoteDeFraisRestauration->getCommentaire(),
        'NbreRepasSiRestauration' => $selectedNoteDeFraisRestauration->getNbreRepasSiRestauration(),
        'IdClient' => $selectedNoteDeFraisRestauration->getIdClient()
        ];


        $tab[] = $selectedNoteDeFraisRestauration;

        if ($selectedNoteDeFraisRestauration){
            return ['noteDeFraisRestauration' => $tab];
        }

    }

    /**
     * Create one noteDeFraisRestauration
     *
     * @url POST /notedefraisrestauration
     *
     */


    public function createOneNoteDeFraisRestauration(){



        $data = [
        'IntituleNDF'  => $_POST["IntituleNDF"],
        'DateNDF' => $_POST["DateNDF"],
        'MotifNDF' => $_POST["MotifNDF"],
        'MontantPrevu' => $_POST["MontantPrevu"],
        'EtatNDF' => $_POST["EtatNDF"],
        'Commentaire' => $_POST["Commentaire"],
        'NbreRepasSiRestauration' => $_POST["NbreRepasSiRestauration"],
        'Login' => $_POST["Login"],
        'IdClient' => $_POST["IdClient"]
        ];


        $object = new NoteDeFraisRestauration($data);
        $libelle = "noteDeFraisRestauration";


        return $this->erreur->getCreate($this->manager, $object, $libelle, $data);


    }


    /**
     * Update one noteDeFraisRestauration
     *
     * @url PUT /notedefraisrestauration/$IdNoteDeFraisRestauration
     *
     */

    public function updateOneNoteDeFraisRestauration($IdNoteDeFraisRestauration){

        $method = $_SERVER['REQUEST_METHOD'];
            if ('PUT' === $method) {
                parse_str(file_get_contents('php://input'), $_PUT);
            }


         $data = [
         'IdNoteDeFraisRestauration' => $IdNoteDeFraisRestauration,
         'IntituleNDF'  => $_PUT["IntituleNDF"],
         'DateNDF' => $_PUT["DateNDF"],
         'MotifNDF' => $_PUT["MotifNDF"],
         'MontantPrevu' => $_PUT["MontantPrevu"],
         'EtatNDF' => $_PUT["EtatNDF"],
         'Commentaire' => $_PUT["Commentaire"],
         'NbreRepasSiRestauration' => $_PUT["NbreRepasSiRestauration"],
         'Login' => $_PUT["Login"],
         'IdClient' => $_PUT["IdClient"]
         ];



        $object = new NoteDeFraisRestauration($data);
        $libelle = "noteDeFraisRestauration";

        return $this->erreur->getUpdate($this->manager, $object, $libelle, $data);

    }



    /**
     * Delete one noteDeFraisRestauration
     *
     * @url DELETE /notedefraisrestauration/$IdNoteDeFraisRestauration
     *
     */

    public function deleteOneNoteDeFraisRestauration($IdNoteDeFraisRestauration){

      $result = $this->manager->delete($IdNoteDeFraisRestauration);
      return ['success' => $result];

    }

}


