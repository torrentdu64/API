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

        foreach ($listeNoteDeFrais as $key => $note) {
            $data = [
            'IdNoteDeFrais' => $note->getIdNoteDeFrais(),
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
     * @url GET /notedefraisrestauration/$IdNoteDeFrais
     *
     */

    public function getOneNoteDeFraisRestauration($IdNoteDeFrais){

    	$selectedNoteDeFraisRestauration = $this->manager->read($IdNoteDeFrais);

        $tabSelectedNoteDeFrais = [
        'IdNoteDeFrais' => $selectedNoteDeFrais->getIdNoteDeFrais(),
        'IntituleNDF' => $selectedNoteDeFrais->getIntituleNDF(),
        'DateNDF' => $selectedNoteDeFrais->getDateNDF(),
        'MotifNDF' => $selectedNoteDeFrais->getMotifNDF(),
        'MontantPrevu' => $selectedNoteDeFrais->getMontantPrevu(),
        'EtatNDF' => $selectedNoteDeFrais->getEtatNDF(),
        'Commentaire' => $selectedNoteDeFrais->getCommentaire(),
        'NbreRepasSiRestauration' => $selectedNoteDeFrais->getNbreRepasSiRestauration(),
        'Login' => $selectedNoteDeFrais->getLogin(),
        'IdClient' => $selectedNoteDeFrais->getIdClient()
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
     * @url PUT /notedefraisrestauration/$IdNoteDeFrais
     *
     */

    public function updateOneNoteDeFraisRestauration($IdNoteDeFrais){

        $method = $_SERVER['REQUEST_METHOD'];
            if ('PUT' === $method) {
                parse_str(file_get_contents('php://input'), $_PUT);
            }


         $data = [
         'IdNoteDeFrais' => $IdNoteDeFrais,
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
     * @url DELETE /notedefraisrestauration/$IdNoteDeFrais
     *
     */

    public function deleteOneNoteDeFraisRestauration($IdNoteDeFrais){

      $result = $this->manager->delete($IdNoteDeFrais);
      return ['success' => $result];

    }

}


