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
    private $genre;
    private $dateN;
    private $email;
    private $photo;

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

    public function setGenre($genre) {
        if (strlen($genre) <= 25) {
            $this->genre = $genre;
        } else {
            $this->addErreur('Le genre doit comporter moins de 25 caractères');
        }
    }

    public function setDateN($dateN) {
        $this->dateN = $dateN;
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

    public function setPhoto($photo) {
        $this->photo = $photo;
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

    function getGenre() {
        return $this->genre;
    }

    function getDateN() {
        return $this->dateN;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhoto() {
        return $this->photo;
    }
}
