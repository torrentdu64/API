<?php

class NoteDeFraisRestauration extends Erreur {

    private $IdNoteDeFrais;
    private $IntituleNDF;
    private $DateNDF;
    private $MotifNDF;
    private $MontantPrevu;
    private $EtatNDF;
    private $Commentaire;
    private $NbreRepasSiRestauration;
    private $Login;
    private $IdClient;


    public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);
        }
    }

    public function setIdNoteDeFrais($IdNoteDeFrais) {
        if (is_integer(intval($IdNoteDeFrais))) {
            $this->IdNoteDeFrais = $IdNoteDeFrais;
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

  public function setNbreRepasSiRestauration($NbreRepasSiRestauration) {
      if($NbreRepasSiRestauration == ''){
         $this->addErreur('le nombre de repas   n\'est pas remplit');
      }else{
        if ( $NbreRepasSiRestauration > 0  && is_numeric($NbreRepasSiRestauration)){
             $this->NbreRepasSiRestauration = $NbreRepasSiRestauration;
        }else{
            $this->addErreur('Le nombre de repas doit etre superieur a 0');
        }
      }
    }


   
        public function setLogin($Login) {
           if($Login == ''){
         $this->addErreur('le Login n\'est pas remplit');
          }else{
            if (is_numeric($Login)) {
                $this->Login = $Login;
            } else {
                $this->addErreur('Le Login est incorrect');
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


        function getIdNoteDeFrais() {
            return $this->IdNoteDeFrais;
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

        function getNbreRepasSiRestauration() {
            return $this->NbreRepasSiRestauration;
        }

      
        function getLogin() {
            return $this->Login;
        }

        function getIdClient() {
            return $this->IdClient;
        }
}