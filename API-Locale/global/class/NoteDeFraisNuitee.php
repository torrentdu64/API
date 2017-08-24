<?php

class NoteDeFraisNuitee extends Erreur {

    private $IdNoteDeFraisNuitee;
    private $IntituleNDF;
    private $DateNDF;
    private $MotifNDF;
    private $MontantPrevu;
    private $EtatNDF;
    private $Commentaire;
    private $NbreNuiteesSiHotellerie;
    private $IdClient;

    public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);
        }
    }

    public function setIdNoteDeFraisNuitee($IdNoteDeFraisNuitee) {
        if (is_integer(intval($IdNoteDeFraisNuitee))) {
            $this->IdNoteDeFraisNuitee = $IdNoteDeFraisNuitee;
        } else {
            $this->addErreur('L\'id doit être un nombre entier');
        }
    }



    public function setIntituleNDF($IntituleNDF) {
      if($IntituleNDF == ''){
         $this->addErreur('l\'intitule complementaire n\'est pas remplit');
      }else{
        if (strlen($IntituleNDF) <= 250) {
            $this->IntituleNDF = $IntituleNDF;
        } else {
            $this->addErreur('L\'intitule doit comporter moins de 250 caracteres');
        }
      }
    }

    public function setDateNDF($DateNDF) {
      if($DateNDF == ''){
         $this->addErreur('la date  n\'est pas remplit');
      }else{
        // date('d/m/Y')
        // Fonction à revoir car ne fait pas d/m/Y 
        date_default_timezone_set("Europe/Paris");
        if (DateTime::createFromFormat('Y-m-d', $DateNDF )) {
            $this->DateNDF = $DateNDF;
        } else {
             $this->addErreur('mauvais format de date');
         }
      }
    }

    public function setMotifNDF($MotifNDF) {
      if($MotifNDF == ''){
         $this->addErreur('le motif  n\'est pas remplit');
      }else{
        if (strlen($MotifNDF) <= 250) {
            $this->MotifNDF = $MotifNDF;
        } else {
            $this->addErreur('Le motif du Note de frais doit comporter moins de 250 caractères');
        }
      }
    }

    public function setCommentaire($Commentaire) {
      if($Commentaire == ''){
         $this->addErreur('le commentaire n\'est pas remplit');
      }else{
        if (strlen($Commentaire) <= 250) {
            $this->Commentaire = $Commentaire;
        } else {
            $this->addErreur('Le commentaire doit comporter moins de 250 caracteres');
        }
      }
    }

    public function setMontantPrevu($MontantPrevu) {
      if($MontantPrevu == ''){
         $this->addErreur('le Montant prevu n\'est pas remplit');
      }else{
            $preg_match ="/^[0-9]*[.,]*[0-9]*$/";
        if(preg_match($preg_match,$MontantPrevu)){
            $this->MontantPrevu = $MontantPrevu;
        }else{
          $this->addErreur('Le montant prevu doit etre un entier ou un decimal');
            }
      }
    }




    public function setEtatNDF($EtatNDF) {
      $etat = ['en cours', 'rembourse', 'en attente', 'refuse'];
      if($EtatNDF == ''){
         $this->addErreur('l Etat NDF  n\'est pas remplit');
      }else{
        if (in_array($EtatNDF, $etat)) {
            $this->EtatNDF = $EtatNDF;
        } else {
            $this->addErreur('L\'Etat Note de Frais doit etre un caractere');
        }
      }
    }

    public function setNbreNuiteesSiHotellerie($NbreNuiteesSiHotellerie) {
      if($NbreNuiteesSiHotellerie == ''){
         $this->addErreur('le nombre de nuit  n\'est pas remplit');
      }else{
            if (is_numeric($NbreNuiteesSiHotellerie) &&  $NbreNuiteesSiHotellerie > 0){
                $this->NbreNuiteesSiHotellerie = $NbreNuiteesSiHotellerie;
            }else{
                $this->addErreur('Le nombre de nuitees doit etre superieur a 0');
            }
          }
    }

        public function setIdClient($IdClient) {
           if($IdClient == ''){
         $this->addErreur('l ID client n\'est pas remplit');
          }else{
            if (is_numeric($IdClient) ) {
                $this->IdClient = $IdClient;
            } else {
                $this->addErreur('L\id client est incorrect');
            }
          }
        }


        function getIdNoteDeFraisNuitee() {
            return $this->IdNoteDeFraisNuitee;
        }

        function getIntituleNDF() {
            return $this->IntituleNDF;
        }


        function getDateNDF() {
            return $this->DateNDF;
        }

        function getMotifNDF() {
            return $this->MotifNDF;
        }

        function getMontantPrevu() {
            return $this->MontantPrevu;
        }

        function getEtatNDF() {
            return $this->EtatNDF;
        }

        function getCommentaire() {
            return $this->Commentaire;
        }

        function getNbreNuiteesSiHotellerie() {
            return $this->NbreNuiteesSiHotellerie;
        }

        function getIdClient() {
            return $this->IdClient;
        }
}
