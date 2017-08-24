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

        public function setCoordonneesGPSDepartSiTransport($CoordonneesGPSDepartSiTransport) {
          if($CoordonneesGPSDepartSiTransport == ''){
         $this->addErreur('les coordonnee GPS  n\'est pas remplit');
          }else{
            // Vérifier que c'est un integer
            if (is_numeric($CoordonneesGPSDepartSiTransport)) {
                $this->CoordonneesGPSDepartSiTransport = $CoordonneesGPSDepartSiTransport;
            } else {
                $this->addErreur('le coordonnee Depart incorrect');
            }
          }
        }

        public function setCoordonneesGPSArriveeSiTransport($CoordonneesGPSArriveeSiTransport) {
          if($CoordonneesGPSArriveeSiTransport == ''){
         $this->addErreur('les coordonnee GPS  n\'est pas remplit');
          }else{
            if (is_numeric($CoordonneesGPSArriveeSiTransport)) {
                $this->CoordonneesGPSArriveeSiTransport = $CoordonneesGPSArriveeSiTransport;
            } else {
                $this->addErreur('Le coordonnee Arrivee incorrect');
            }
          }
        }

        public function setTypeDeTransport($TypeDeTransport) {
          if($TypeDeTransport == ''){
         $this->addErreur('le type de transport n\'est pas remplit');
          }else{
            if (is_string($TypeDeTransport)) {
                $this->TypeDeTransport = $TypeDeTransport;
            } else {
                $this->addErreur("Le type de transport n'est pas valide");
            }
          }
        }

        public function setDistanceSiTransport($DistanceSiTransport) {
          if($DistanceSiTransport == ''){
         $this->addErreur('la distance de transport n\'est pas remplit');
          }else{
            if (is_numeric($DistanceSiTransport)) {
                $this->DistanceSiTransport = $DistanceSiTransport;
            } else {
                $this->addErreur('Le distance Transport doit etre un entier');
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


