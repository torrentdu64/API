<?php

use \Jacwright\RestServer\RestException;

class NoteDeFraisController
{

	  private $noteDeFrais;

  	public function __construct(){
  		$this->manager = new NoteDeFraisManager();
      $this->erreur = new Erreur();
  	}



    /**
     * Gets all noteDeFrais
     *
     * @url GET /notedefrais
     *
     */


    public function getAllNoteDeFrais(){


        $listeNoteDeFrais = $this->manager->readAll();

        $tabAllNoteDeFrais = [];

        foreach ($listeNoteDeFrais as $key => $note) {
            $data = [
            'IdNoteDeFrais' => $note->getIdNoteDeFrais(),
            'IntituleNDF' => $note->getIntituleNDF(),
            'DateNDF' => $note->getDateNDF(),
            'MotifNDF' => $note->getMotifNDF(),
            'MontantPrevu' => $note->getMontantPrevu(),
            'EtatNDF' => $note->getEtatNDF(),
            'Commentaire' => $note->getCommentaire(),
            'NbreNuiteesSiHotellerie' => $note->getNbreNuiteesSiHotellerie(),
            'NbreRepasSiRestauration' => $note->getNbreRepasSiRestauration(),
            'CoordonneesGPSDepartSiTransport' => $note->getCoordonneesGPSDepartSiTransport(),
            'CoordonneesGPSArriveeSiTransport' => $note->getCoordonneesGPSArriveeSiTransport(),
            'TypeDeTransport' => $note->getTypeDeTransport(),
            'DistanceSiTransport' => $note->getDistanceSiTransport(),
            'login' => $note->getlogin(),
            'IdClient' => $note->getIdClient()
            ];

            $tabAllNoteDeFrais[] = $data;


        }


        if ($tabAllNoteDeFrais){
            return ['noteDeFrais' => $tabAllNoteDeFrais];
        }

    }

    /**
     * Get one noteDeFrais by id
     *
     * @url GET /notedefrais/$IdNoteDeFrais
     *
     */

    public function getOneNoteDeFrais($IdNoteDeFrais){

    	$selectedNoteDeFrais = $this->manager->read($IdNoteDeFrais);

        $tabSelectedNoteDeFrais = [
        'IdNoteDeFrais' => $selectedNoteDeFrais->getIdNoteDeFrais(),
        'IntituleNDF' => $selectedNoteDeFrais->getIntituleNDF(),
        'DateNDF' => $selectedNoteDeFrais->getDateNDF(),
        'MotifNDF' => $selectedNoteDeFrais->getMotifNDF(),
        'MontantPrevu' => $selectedNoteDeFrais->getMontantPrevu(),
        'EtatNDF' => $selectedNoteDeFrais->getEtatNDF(),
        'Commentaire' => $selectedNoteDeFrais->getCommentaire(),
        'NbreNuiteesSiHotellerie' => $selectedNoteDeFrais->getNbreNuiteesSiHotellerie(),
        'NbreRepasSiRestauration' => $selectedNoteDeFrais->getNbreRepasSiRestauration(),
        'CoordonneesGPSDepartSiTransport' => $selectedNoteDeFrais->getCoordonneesGPSDepartSiTransport(),
        'CoordonneesGPSArriveeSiTransport' => $selectedNoteDeFrais->getCoordonneesGPSArriveeSiTransport(),
        'TypeDeTransport' => $selectedNoteDeFrais->getTypeDeTransport(),
        'DistanceSiTransport' => $selectedNoteDeFrais->getDistanceSiTransport(),
        'login' => $selectedNoteDeFrais->getlogin(),
        'IdClient' => $selectedNoteDeFrais->getIdClient()
        ];


        $tab[] = $tabSelectedNoteDeFrais;

        if ($selectedNoteDeFrais){
            return ['noteDeFrais' => $tab];
        }

    }

    /**
     * Create one notedefrais
     *
     * @url POST /notedefrais
     *
     */


    public function createOneNoteDeFrais(){

      var_dump($_POST);
        $data = [
        'IdNoteDeFrais' => $_POST["IdNoteDeFrais"],
        'IntituleNDF'  => $_POST["IntituleNDF"],
        'DateNDF' => $_POST["DateNDF"],
        'MotifNDF' => $_POST["MotifNDF"],
        'MontantPrevu' => $_POST["MontantPrevu"],
        'EtatNDF' => $_POST["EtatNDF"],
        'Commentaire' => $_POST["Commentaire"],
        'NbreNuiteesSiHotellerie' => $_POST["NbreNuiteesSiHotellerie"],
        'NbreRepasSiRestauration' => $_POST["NbreRepasSiRestauration"],
        'CoordonneesGPSDepartSiTransport' => $_POST["CoordonneesGPSDepartSiTransport"],
        'CoordonneesGPSArriveeSiTransport' => $_POST["CoordonneesGPSArriveeSiTransport"],
        'TypeDeTransport' => $_POST["TypeDeTransport"],
        'DistanceSiTransport' => $_POST["DistanceSiTransport"],
        'login' => $_POST["login"],
        'IdClient' => $_POST["IdClient"]
        ];


        var_dump($data);
        $object = new NoteDeFrais($data);
        $libelle = "noteDeFrais";


        return $this->erreur->getErreur($this->manager, $object, $libelle, $data);


    }


    /**
     * Update one noteDeFrais
     *
     * @url PUT /notedefrais/$IdNoteDeFrais
     *
     */

    public function updateOneNoteDeFrais($IdNoteDeFrais){

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
         'NbreNuiteesSiHotellerie' => $_PUT["NbreNuiteesSiHotellerie"],
         'NbreRepasSiRestauration' => $_PUT["NbreRepasSiRestauration"],
         'CoordonneesGPSDepartSiTransport' => $_PUT["CoordonneesGPSDepartSiTransport"],
         'CoordonneesGPSArriveeSiTransport' => $_PUT["CoordonneesGPSArriveeSiTransport"],
         'TypeDeTransport' => $_PUT["TypeDeTransport"],
         'DistanceSiTransport' => $_PUT["DistanceSiTransport"],
         'login' => $_PUT["login"],
         'IdClient' => $_PUT["IdClient"]
         ];

        $object = new NoteDeFrais($data);
        $libelle = "noteDeFrais";

        return $this->erreur->getErreur($this->manager, $object, $libelle, $data);

    }



    /**
     * Delete one noteDeFrais
     *
     * @url DELETE /notedefrais/$IdNoteDeFrais
     *
     */

    public function deleteOneNoteDeFrais($IdNoteDeFrais){

      $result = $this->manager->delete($IdNoteDeFrais);
      return ['success' => $result];

    }

}


