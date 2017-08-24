<?php

use \Jacwright\RestServer\RestException;

class NoteDeFraisNuiteeController
{

    private $manager;
    private $erreur;

    public function __construct(){
        $this->manager = new NoteDeFraisNuiteeManager();
        $this->erreur = new Erreur();
    }


    /**
     * Gets all noteDeFraisNuitee
     *
     * @url GET /notedefraisnuitee
     *
     */


    public function getAllNoteDeFraisNuitee(){

        $listeNoteDeFraisNuitee = $this->manager->readAll();

        $tabAllNoteDeFraisNuitee = [];

        foreach ($listeNoteDeFraisNuitee as $key => $note) {
            $data = [
            'IdNoteDeFraisNuitee' => $note->getIdNoteDeFraisNuitee(),
            'IntituleNDF' => $note->getIntituleNDF(),
            'DateNDF' => $note->getDateNDF(),
            'MotifNDF' => $note->getMotifNDF(),
            'MontantPrevu' => $note->getMontantPrevu(),
            'EtatNDF' => $note->getEtatNDF(),
            'Commentaire' => $note->getCommentaire(),
            'NbreNuiteesSiHotellerie' => $note->getNbreNuiteesSiHotellerie(),
            'IdClient' => $note->getIdClient()
            ];

            $tabAllNoteDeFraisNuitee[] = $data;

        }

        if ($listeNoteDeFraisNuitee){
            return ['noteDeFraisNuitees' => $tabAllNoteDeFraisNuitee];
        }

    }

    /**
     * Get one noteDeFraisNuitee by id
     *
     * @url GET /notedefraisnuitee/$IdNoteDeFraisNuitee
     *
     */

    public function getOneNoteDeFraisNuitee($IdNoteDeFraisNuitee){

        $selectedNoteDeFraisNuitee = $this->manager->read($IdNoteDeFraisNuitee);

        $tabSelectedNoteDeFraisNuitee = [
        'IdNoteDeFraisNuitee' => $selectedNoteDeFraisNuitee->getIdNoteDeFraisNuitee(),
        'IntituleNDF' => $selectedNoteDeFraisNuitee->getIntituleNDF(),
        'DateNDF' => $selectedNoteDeFraisNuitee->getDateNDF(),
        'MotifNDF' => $selectedNoteDeFraisNuitee->getMotifNDF(),
        'MontantPrevu' => $selectedNoteDeFraisNuitee->getMontantPrevu(),
        'EtatNDF' => $selectedNoteDeFraisNuitee->getEtatNDF(),
        'Commentaire' => $selectedNoteDeFraisNuitee->getCommentaire(),
        'NbreNuiteesSiHotellerie' => $selectedNoteDeFraisNuitee->getNbreNuiteesSiHotellerie(),
        'IdClient' => $selectedNoteDeFraisNuitee->getIdClient()
        ];


        $tabNuitee[] = $tabSelectedNoteDeFraisNuitee;

        if ($selectedNoteDeFraisNuitee){
            return ['noteDeFraisNuitee' => $tabNuitee];
        }

    }

    /**
     * Create one noteDeFraisNuitee
     *
     * @url POST /notedefraisnuitee
     *
     */

    public function createOneNoteDeFraisNuitee(){

        $data = [
        'IntituleNDF'  => $_POST["IntituleNDF"],
        'DateNDF' => $_POST["DateNDF"],
        'MotifNDF' => $_POST["MotifNDF"],
        'MontantPrevu' => $_POST["MontantPrevu"],
        'EtatNDF' => $_POST["EtatNDF"],
        'Commentaire' => $_POST["Commentaire"],
        'NbreNuiteesSiHotellerie' => $_POST["NbreNuiteesSiHotellerie"],
        'IdClient' => $_POST["IdClient"]
        ];


        $object = new NoteDeFraisNuitee($data);
        $libelle = "noteDeFraisNuitee";


        return $this->erreur->getCreate($this->manager, $object, $libelle, $data);


    }


    /**
     * Update one noteDeFraisNuitee
     *
     * @url PUT /notedefraisnuitee/$IdNoteDeFraisNuitee
     *
     */

    public function updateOneNoteDeFraisNuitee($IdNoteDeFraisNuitee){

        $method = $_SERVER['REQUEST_METHOD'];
            if ('PUT' === $method) {
                parse_str(file_get_contents('php://input'), $_PUT);
            }

         $data = [
         'IdNoteDeFraisNuitee' => $IdNoteDeFraisNuitee,
         'IntituleNDF'  => $_PUT["IntituleNDF"],
         'DateNDF' => $_PUT["DateNDF"],
         'MotifNDF' => $_PUT["MotifNDF"],
         'MontantPrevu' => $_PUT["MontantPrevu"],
         'EtatNDF' => $_PUT["EtatNDF"],
         'Commentaire' => $_PUT["Commentaire"],
         'NbreNuiteesSiHotellerie' => $_PUT["NbreNuiteesSiHotellerie"],
         'IdClient' => $_PUT["IdClient"]
         ];


        $object = new NoteDeFraisNuitee($data);
        $libelle = "noteDeFraisNuitee";

        return $this->erreur->getUpdate($this->manager, $object, $libelle, $data);

    }


    /**
     * Delete one noteDeFraisNuitee
     *
     * @url DELETE /notedefraisnuitee/$IdNoteDeFraisNuitee
     *
     */

    public function deleteOneNoteDeFraisNuitee($IdNoteDeFraisNuitee){

      $result = $this->manager->delete($IdNoteDeFraisNuitee);
      return ['success' => $result];

    }

}
