<?php

class NoteDeFrais extends Erreur {

    private $IdNoteDeFrais;
    private $IntituleNDF;
    private $DateNDF;
    private $MotifNDF;
    private $MontantPrevu;
    private $EtatNDF;
    private $Commentaire;
    private $NbreNuiteesSiHotellerie;
    private $NbreRepasSiRestauration;
    private $CoordonneesGPSDepartSiTransport;
    private $CoordonneesGPSArriveeSiTransport;
    private $TypeDeTransport;
    private $DistanceSiTransport;
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
        if (strlen($DateNDF)) {
            $this->DateNDF = $DateNDF;
        } else {
            $this->addErreur('Date=>Chaine de caractere');
        }
      }
    }

    public function setMotifNDF($MotifNDF) {
      if($MotifNDF == ''){
         $this->addErreur('le motif  n\'est pas remplit');
      }else{
        if (strlen($MotifNDF) <= 300) {
            $this->MotifNDF = $MotifNDF;
        } else {
            $this->addErreur('Le motif du Note de frais doit comporter moins de 300 caractères');
        }
      }
    }

    public function setCommentaire($Commentaire) {
      if($Commentaire == ''){
         $this->addErreur('le commentaire n\'est pas remplit');
      }else{
        if (strlen($Commentaire) <= 25) {
            $this->Commentaire = $Commentaire;
        } else {
            $this->addErreur('Le commentaire doit comporter moins de 25 caracteres');
        }
      }
    }

    public function setMontantPrevu($MontantPrevu) {
      if($MontantPrevu == ''){
         $this->addErreur('le Montant prevu n\'est pas remplit');
      }else{
            $preg_match ="^[+]?([0-9]{1,2})*[.,]([0-9]{1,1})?$^";
        if(preg_match($preg_match,$MontantPrevu)){
            $this->MontantPrevu = $MontantPrevu;
        }elseif(filter_var($MontantPrevu, FILTER_VALIDATE_INT)){
                $this->MontantPrevu = $MontantPrevu;
            }else{
                $this->addErreur('Le montant prevu doit etre un entier ou un decimal');
            }
          }
    }




    public function setEtatNDF($EtatNDF) {
      if($EtatNDF == ''){
         $this->addErreur('l Etat NDF  n\'est pas remplit');
      }else{
        if (strlen($EtatNDF)) {
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
            if ( $NbreNuiteesSiHotellerie > 0){
                $this->NbreNuiteesSiHotellerie = $NbreNuiteesSiHotellerie;
            }else{
                $this->addErreur('Le nombre de nuitees doit etre superieur a 0');
            }
          }
    }

    public function setNbreRepasSiRestauration($NbreRepasSiRestauration) {
      if($NbreRepasSiRestauration == ''){
         $this->addErreur('le nombre de repas   n\'est pas remplit');
      }else{
            if ( $NbreRepasSiRestauration > 0){
                $this->NbreRepasSiRestauration = $NbreRepasSiRestauration;
            }else{
                $this->addErreur('Le nombre de repas doit etre superieur a 0');
            }
          }
        }

        public function setCoordonneesGPSDepartSiTransport($CoordonneesGPSDepartSiTransport) {
          if($CoordonneesGPSDepartSiTransport == ''){
         $this->addErreur('les coordonnee GPS  n\'est pas remplit');
          }else{
            // Vérifier que c'est un integer
            if (strlen($CoordonneesGPSDepartSiTransport) <= 40) {
                $this->CoordonneesGPSDepartSiTransport = $CoordonneesGPSDepartSiTransport;
            } else {
                $this->addErreur('le coordonnee de depart  doit comporter moins de 40 caracteres');
            }
          }
        }

        public function setCoordonneesGPSArriveeSiTransport($CoordonneesGPSArriveeSiTransport) {
          if($CoordonneesGPSArriveeSiTransport == ''){
         $this->addErreur('les coordonnee GPS  n\'est pas remplit');
          }else{
            if (strlen($CoordonneesGPSArriveeSiTransport) <= 40) {
                $this->CoordonneesGPSArriveeSiTransport = $CoordonneesGPSArriveeSiTransport;
            } else {
                $this->addErreur('Le coordonnee d\'arrive doit comporter moins de 25 caracteres');
            }
          }
        }

        public function setTypeDeTransport($TypeDeTransport) {
          if($TypeDeTransport == ''){
         $this->addErreur('le type de transport n\'est pas remplit');
          }else{
            if (strlen($TypeDeTransport) <= 25) {
                $this->TypeDeTransport = $TypeDeTransport;
            } else {
                $this->addErreur('Le type de transport choisi doit comporter moins de 25 caracteres');
            }
          }
        }

        public function setDistanceSiTransport($DistanceSiTransport) {
          if($DistanceSiTransport == ''){
         $this->addErreur('la distance de transport n\'est pas remplit');
          }else{
            if (strlen($DistanceSiTransport)) {
                $this->DistanceSiTransport = $DistanceSiTransport;
            } else {
                $this->addErreur('Le distance Transport doit etre un entier');
            }
          }
        }

        public function setLogin($Login) {
           if($Login == ''){
         $this->addErreur('le login n\'est pas remplit');
          }else{
            if (is_integer($Login) <= 11) {
                $this->Login = $Login;
            } else {
                $this->addErreur('Le login doit comporter moins de 11 caracteres');
            }
          }
        }

        public function setIdClient($IdClient) {
           if($IdClient == ''){
         $this->addErreur('l ID client n\'est pas remplit');
          }else{
            if (is_integer($IdClient) <= 11) {
                $this->IdClient = $IdClient;
            } else {
                $this->addErreur('L\id client doit comporter moins de 11 caracteres');
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

        function getNbreNuiteesSiHotellerie() {
            return $this->NbreNuiteesSiHotellerie;
        }

        function getNbreRepasSiRestauration() {
            return $this->NbreRepasSiRestauration;
        }

        function getCoordonneesGPSDepartSiTransport() {
            return $this->CoordonneesGPSDepartSiTransport;
        }

        function getCoordonneesGPSArriveeSiTransport() {
            // Le diviser par 100 (pour convertir centimes en €)
            return $this->CoordonneesGPSArriveeSiTransport;
        }

        function getTypeDeTransport() {
            // Le diviser par 100 (pour convertir centimes en €)
            return $this->TypeDeTransport;
        }

        function getDistanceSiTransport() {
            // Le diviser par 100 (pour convertir centimes en €)
            return $this->DistanceSiTransport;
        }

        function getLogin() {
            // Le diviser par 100 (pour convertir centimes en €)
            return $this->Login;
        }

        function getIdClient() {
            // Le diviser par 100 (pour convertir centimes en €)
            return $this->IdClient;
        }
    }


