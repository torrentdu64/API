<?php

/**
 * Description of Client
 *
 * @author Micka
 */
class User extends Entity {
    
    private $Login;
    private $NomReps;
    private $PrenomReps;
    private $Adresse1Reps;
    private $Adresse2Reps;
    private $CodePostalReps;
    private $VilleReps;
    private $EmailReps;
    private $TelephoneReps;
    private $Commentaires;
    private $DateEmbauche;
    private $TypeDeDroits;
    private $MotDePasseUser;
    private $CategorieUser;
    private $IdType;
    
    
     public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);
        }
    }
    
      public function setLogin($Login) {
        if (is_integer(intval($Login))) {
            $this->Login = $Login;
        } else {
            $this->addErreur('L\'IdUser doit être un nombre entier');
        }
    }

    public function setNomReps($NomReps) {
        if (strlen($NomReps) <= 25) {
            $this->NomReps = $NomReps;
        } else {
            $this->addErreur('Le NomUser doit comporter moins de 25 caractères');
        }
    }

    public function setPrenomReps($PrenomReps) {
        if (strlen($PrenomReps) <= 25) {
            $this->PrenomReps = $PrenomReps;
        } else {
            $this->addErreur('Le PrenomUser doit comporter moins de 25 caractères');
        }
    }
    
    
    public function setAdresse1Reps($Adresse1Reps) {
        if (strlen($Adresse1Reps) <= 100) {
            $this->Adresse1Reps = $Adresse1Reps;
        } else {
            $this->addErreur('L\'adresseUser1 doit comporter moins de 100 caractères');
        }
    }
    
     public function setAdresse2Reps($Adresse2Reps) {
        if (strlen($Adresse2Reps) <= 100) {
            $this->Adresse2Reps = $Adresse2Reps;
        } else {
            $this->addErreur('L\'adresseUser2 doit comporter moins de 100 caractères');
        }
    }
    
    
    public function setCodePostalReps($CodePostalReps) {
        if (strlen($CodePostalReps) <= 15) {
            $this->CodePostalReps = $CodePostalReps;
        } else {
            $this->addErreur('Le Code PostalUser doit comporter moins de 25 caractères');
        }
    }
    
        
    public function setVilleReps($VilleReps) {
        if (strlen($VilleReps) <= 25) {
            $this->VilleReps = $VilleReps;
        } else {
            $this->addErreur('La villeUser doit comporter moins de 25 caractères');
        }
    }
    
        
    public function setEmailReps($EmailReps) {
        if (strlen($EmailReps) <= 50) {
            $this->EmailReps = $EmailReps;
        } else {
            $this->addErreur('L\'EmailUser  doit comporter moins de 50 caractères');
        }
    }
    
    
        
    public function setTelephoneReps($TelephoneReps) {
        if (strlen($TelephoneReps) <= 15) {
            $this->TelephoneReps = $TelephoneReps;
        } else {
            $this->addErreur('Le TelephoneUser doit comporter moins de 25 caractères');
        }
    }
    
      public function setCommentaires($Commentaires) {
        if (strlen($Commentaires) <= 300) {
            $this->Commentaires = $Commentaires;
        } else {
            $this->addErreur('Le Commentaire doit comporter moins de 300 caractères');
        }
    }
    
      public function setDateEmbauche($DateEmbauche) {
        if (strlen($DateEmbauche)) {
            $this->DateEmbauche = $DateEmbauche;
        } else {
            $this->addErreur('');
        }
    }
    
      public function setTypeDeDroits($TypeDeDroits) {
        if (strlen($TypeDeDroits) <= 25) {
            $this->TypeDeDroits = $TypeDeDroits;
        } else {
            $this->addErreur('Le TypeDeDroits doit comporter moins de 25 caractères');
        }
    }
    
          public function setMotDePasseUser($MotDePasseUser) {
        if (strlen($MotDePasseUser) <= 6) {
            $this->MotDePasseUser = $MotDePasseUser;
        } else {
            $this->addErreur('Le MotDePasseUser doit comporter moins de 6 caractères');
        }
    }
    
          public function setCategorieUser($CategorieUser) {
        if (strlen($CategorieUser) <= 25) {
            $this->CategorieUser = $CategorieUser;
        } else {
            $this->addErreur('Le CategorieUser doit comporter moins de 25 caractères');
        }
    }
    
    public function setIdType($IdType) {
        if (is_integer($IdType) <= 11) {
            $this->IdType = $IdType;
        } else {
            $this->addErreur('L\IdType doit comporter moins de 11 caractères');
        }
    }
    
       
        function getLogin() {
        return $this->Login;
    }

    function getNomReps() {
        return $this->NomReps;
    }

    function getPrenomReps() {
        return $this->PrenomReps;
    }

    function getAdresse1Reps() {
        return $this->Adresse1Reps;
    }

    function getAdresse2Reps() {
        return $this->Adresse2Reps;
    }

    function getCodePostalReps() {
        return $this->CodePostalReps;
    }

    function getVilleReps() {
        return $this->VilleReps;
    }

    function getEmailReps() {
        return $this->EmailReps;
    }

    function getTelephoneReps() {
        return $this->TelephoneReps;
    }

    function getCommentaires() {
        return $this->Commentaires;
    }

    function getDateEmbauche() {
        return $this->DateEmbauche;
    }
        
        function getTypeDeDroits() {
        return $this->TypeDeDroits;
    }
        
        function getMotDePasseUser() {
        return $this->MotDePasseUser;
    }
        
        function getCategorieUser() {
        return $this->CategorieUser;
    }
        
        function getIdType() {
        return $this->IdType;
    }
        
        
}
