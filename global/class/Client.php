<?php

/**
 * Description of Client
 *
 * @author Micka
 */
class Client extends Entity {

    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $adresse;
    private $email;
    private $societe;
    private $commentaire;


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

    public function setNom($nom) {
        if (strlen($nom) <= 25) {
            $this->nom = $nom;
        } else {
            $this->addErreur('Le nom doit comporter moins de 25 caractères');
        }
    }

    public function setPrenom($prenom) {
        if (strlen($prenom) <= 25) {
            $this->prenom = $prenom;
        } else {
            $this->addErreur('Le prenom doit comporter moins de 25 caractères');
        }
    }

    public function setTel($tel) {
        if (strlen($tel) <= 25) {
            $this->tel = $tel;
        } else {
            $this->addErreur('Le tel doit comporter moins de 25 caractères');
        }
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (FILTER_VALIDATE_EMAIL == true) {
                $this->email = $email;
            } else {
                $this->addErreur('L\'email est incorrect !');
            }
        }
    }

    public function setSociete($societe) {
        $this->societe = $societe;
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getTel() {
        return $this->tel;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getEmail() {
        return $this->email;
    }

    function getSociete() {
        return $this->societe;
    }
}
