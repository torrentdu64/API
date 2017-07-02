<?php

class Frais extends Entity {

    private $id;
    private $nature;
    private $titre;
    private $montant;
    private $date;
    private $commentaire;
    private $transport;
    private $distance;
    private $gps;
    private $depart;
    private $arriver;
    private $nbNuit;
    private $nbRepas;
    private $justificatif;


    public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);
        }
    }

    public function setId($id) {
        if (is_integer(intval($id))) {
            $this->id = $id;
        } else {
            $this->addErreur('L\'id doit être un nombre entier');
        }
    }

    public function setNature($nature) {
        if (strlen($nature) <= 25) {
            $this->nature = $nature;
        } else {
            $this->addErreur('Le nature doit comporter moins de 25 caractères');
        }
    }

    public function setTitre($titre) {
        if (strlen($titre) <= 25) {
            $this->titre = $titre;
        } else {
            $this->addErreur('Le titre doit comporter moins de 25 caractères');
        }
    }

    public function setMontant($montant) {
        if (strlen($montant) <= 25) {
            $this->montant = $montant;
        } else {
            $this->addErreur('Le montant doit comporter moins de 25 caractères');
        }
    }

    public function setDate($date) {
        if (strlen($date) <= 25) {
            $this->date = $date;
        } else {
            $this->addErreur('Le date doit comporter moins de 25 caractères');
        }
    }

    public function setCommentaire($commentaire) {
        if (strlen($commentaire) <= 25) {
            $this->commentaire = $commentaire;
        } else {
            $this->addErreur('Le commentaire doit comporter moins de 25 caractères');
        }
    }

    public function setTransport($transport) {
        if (strlen($transport) <= 25) {
            $this->transport = $transport;
        } else {
            $this->addErreur('Le transport doit comporter moins de 25 caractères');
        }
    }

    public function setDistance($distance) {
        if (strlen($distance) <= 25) {
            $this->distance = $distance;
        } else {
            $this->addErreur('Le distance doit comporter moins de 25 caractères');
        }
    }

    }
