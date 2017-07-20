<?php

use \Jacwright\RestServer\RestException;

class NoteDeFraisController
{

	private $noteDeFrais;

	public function __construct(){
		$this->noteDeFrais = new NoteDeFraisManager();
    $this->erreur = new Erreur();
	}


    /**
     * Gets all notedefrais
     *
     * @url GET /notedefrais
     *
     */


    public function getAllNoteDeFrais(){

        $listeNoteDeFrais = $this->noteDeFrais->readAll();

        $tabAllNoteDeFrais = [];

        foreach ($listeNoteDeFrais as $key => $note) {
                $data = ['IdNoteDeFrais' => $note->getIdNoteDeFrais(),
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
     * Gets the user by id or current notedefrais
     *
     * @url GET /notedefrais/$id
     *
     */


    public function getOneNoteDeFrais($id){

    	$selectedNoteDeFrais = $this->noteDeFrais->read($id);
        // var_dump($selectedClients);


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
     * Post one notedefrais
     *
     * @url POST /notedefrais
     *
     */


    public function createOneNoteDeFrais(){

        // foreach ($clientJSON as $key) {
        //     $json = $key;
        // }

        // var_dump($json);

        var_dump($_POST);

            $data = [ 'IdNoteDeFrais' => $_POST["IdNoteDeFrais"],
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


        $noteDeFraisJSON = new NoteDeFrais($data);


        return $this->noteDeFrais->create($noteDeFraisJSON);

        // return $result;

        }


        /**
         * Update one user
         *
         * @url PUT /notedefrais/$id
         *
         */

    public function updateOneNoteDeFrais($id){
        // var_dump($_POST);
        $method = $_SERVER['REQUEST_METHOD'];
            if ('PUT' === $method) {
                parse_str(file_get_contents('php://input'), $_PUT);
                 //var_dump($_PUT); //$_PUT contains put fields
            }

         $data = [ 'IdNoteDeFrais' => $_PUT["IdNoteDeFrais"],
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

        $noteDeFraisObject = new NoteDeFrais($data);

        return $this->noteDeFrais->update($noteDeFraisObject);

        // return $result;

        }




    /**
     * Delete one user
     *
     * @url DELETE /notedefrais/$id
     *
     */


    public function deleteOneNoteDeFrais($id){


        // return "La notedefrais n° ".$deleteClient->getIdClient()." au nom de ".$deleteClient->getNomClient()." a bien été supprimé !";

        $ok = $this->noteDeFrais->delete($id);
        $result = ['success' => $ok];

        return $result;
    }


}


