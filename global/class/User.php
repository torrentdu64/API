<?php

/**
 * Description of Client
 *
 * @author Micka
 */
class User extends Erreur {

    private $login;
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

    public function setlogin($login) {
      if($login == ''){
         $this->addErreur('login n\'est pas remplit');
          }else{
        if (is_integer(intval($login))) {
            $this->login = $login;
        } else {
            $this->addErreur('L\'Id User doit être un nombre entier');
        }
      }
    }

    public function setNomReps($NomReps) {
      if($NomReps == ''){
         $this->addErreur('Nom  n\'est pas remplit');
          }else{
        if (strlen($NomReps) <= 25) {
            if (preg_match('/^[A-Za-z]*$/', $NomReps)) {
            $this->NomReps = $NomReps;
            }else{
               $this->addErreur('Le Nom User ne doit pas contenir des donnees chiffrees ');
            }
        } else {
            $this->addErreur('Le Nom User doit comporter moins de 25 caracteres');
        }
      }
    }

    public function setPrenomReps($PrenomReps) {
      if($PrenomReps == ''){
         $this->addErreur('Prenom  n\'est pas remplit');
          }else{
        if (strlen($PrenomReps) <= 25) {
            //Explication preg_match(On souhaite que le minuscule soit absolment à la fin et
            //le majuscule absolument au début )
             if (preg_match('/^[A-Za-z]*$/', $PrenomReps)) {
            $this->PrenomReps = $PrenomReps;
             }else{
                  $this->addErreur('Le Prenom User ne doit pas contenir des donnees chiffrees ');
             }
        } else {
            $this->addErreur('Le Prenom User doit comporter moins de 25 caracteres');
        }
      }
    }


    public function setAdresse1Reps($Adresse1Reps) {
      if($Adresse1Reps == ''){
         $this->addErreur('Adresse  n\'est pas remplit');
          }else{
        if (strlen($Adresse1Reps) <= 100) {
            $this->Adresse1Reps = $Adresse1Reps;
        } else {
            $this->addErreur('L\'adresse 1 User doit comporter moins de 100 caracteres');
        }
      }
    }

    public function setAdresse2Reps($Adresse2Reps) {
      if($Adresse2Reps == ''){
         $this->addErreur('Adresse  n\'est pas remplit');
          }else{
        if (strlen($Adresse2Reps) <= 100) {
            $this->Adresse2Reps = $Adresse2Reps;
        } else {
            $this->addErreur('L\'adresse 2 User doit comporter moins de 100 caracteres');
        }
      }
    }


    public function setCodePostalReps($CodePostalReps) {
      if($CodePostalReps == ''){
         $this->addErreur('Code Postal  n\'est pas remplit');
          }else{

           $preg_match ="/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/";
            if (preg_match($preg_match, $CodePostalReps)) {
                $this->CodePostalReps = $CodePostalReps;
            }else {
                $this->addErreur('le format du Code Postal User doit être en format belge ou français');
            }
      }
    }


    public function setVilleReps($VilleReps) {
      if($VilleReps == ''){
         $this->addErreur('Ville  n\'est pas remplit');
          }else{
        if (strlen($VilleReps) <= 25) {
            if (preg_match('/^[A-Za-z]*$/', $VilleReps)) {
            $this->VilleReps = $VilleReps;
            }else{
                $this->addErreur('La Ville ne doit pas contenir des données chiffrees');
            }
        } else {
            $this->addErreur('La Ville doit comporter moins de 25 caracteres');
        }
      }
    }




    public function setEmailReps($EmailReps) {
      if($EmailReps == ''){
         $this->addErreur('Email  n\'est pas remplit');
          }else{
        if (strlen($EmailReps) <= 50) {
            if (filter_var($EmailReps, FILTER_VALIDATE_EMAIL)){
                $this->EmailReps = $EmailReps;
            }else{
                $this->addErreur('L\'Email est invalide');
            }
        } else {
            $this->addErreur('L\'Email  doit comporter moins de 50 caracteres');
        }
      }
    }



    public function setTelephoneReps($TelephoneReps) {
      if($TelephoneReps == ''){
         $this->addErreur('Telephone  n\'est pas remplit');
          }else{
        if (strlen($TelephoneReps) <= 15) {
            $preg_match = "/([+33]|(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4})/";
            if ((preg_match($preg_match,$TelephoneReps))) {
                $this->TelephoneReps = $TelephoneReps;
            }else{
                $this->addErreur('Le Telephone format n\'est pas respecte');
            }
        } else {
            $this->addErreur('Le Telephone doit comporter moins de 25 caracteres');
        }
      }
    }

    public function setCommentaires($Commentaires) {
      if($Commentaires == ''){
         $this->addErreur('Commentaire n\'est pas remplit');
          }else{
        if (strlen($Commentaires) <= 300) {
            $this->Commentaires = $Commentaires;
        } else {
            $this->addErreur('Le Commentaire doit comporter moins de 300 caracteres');
        }
      }
    }

    public function setDateEmbauche($DateEmbauche) {
      if($DateEmbauche == ''){
         $this->addErreur('Date embauche n\'est pas remplit');
          }else{
        if (DateTime::createFromFormat('Y-m-d', $DateEmbauche )) {
            $this->DateEmbauche = $DateEmbauche;
        } else {
            $this->addErreur('mauvais format de date');
        }
      }
    }

    public function setTypeDeDroits($TypeDeDroits) {
      if($TypeDeDroits == ''){
         $this->addErreur('type de droits n\'est pas remplit');
          }else{
        if (strlen($TypeDeDroits) <= 25) {
            $this->TypeDeDroits = $TypeDeDroits;
        } else {
            $this->addErreur('Le Type De Droits doit comporter moins de 25 caracteres');
        }
      }
    }

    public function setMotDePasseUser($MotDePasseUser) {
      if($MotDePasseUser == ''){
         $this->addErreur('mots de passe n\'est pas remplit');
          }else{
        if (strlen($MotDePasseUser) <= 6) {
            $this->MotDePasseUser = $MotDePasseUser;
        } else {
            $this->addErreur('Le Mot De Passe User doit comporter moins de 6 caracteres');
        }
      }
    }

    public function setCategorieUser($CategorieUser) {
      if($CategorieUser == ''){
         $this->addErreur('mla Categorie User n\'est pas remplit');
          }else{
        if (strlen($CategorieUser) <= 25) {
            $this->CategorieUser = $CategorieUser;
        } else {
            $this->addErreur('La Categorie User doit comporter moins de 25 caracteres');
        }
      }
    }

    public function setIdType($IdType) {
      if($IdType == ''){
         $this->addErreur('Id Type User n\'est pas remplit');
          }else{
        if (is_integer($IdType) <= 11) {
            $this->IdType = $IdType;
        } else {
            $this->addErreur('L\Id Type doit comporter moins de 11 caracteres');
        }
      }
    }


    function getlogin() {
        return $this->login;
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
