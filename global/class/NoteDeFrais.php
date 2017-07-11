<?php

class NoteDeFrais extends Entity {

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
        if (strlen($IntituleNDF) <= 50) {
            $this->IntituleNDF = $IntituleNDF;
        } else {
            $this->addErreur('L\'intitule doit comporter moins de 300 caracteres');
        }
    }

    public function setDateNDF($DateNDF) {
        if (strlen($DateNDF)) {
            $this->DateNDF = $DateNDF;
        } else {
            $this->addErreur('Date=>Chaine de caractere');
        }
    }

    public function setMotifNDF($MotifNDF) {
        if (strlen($MotifNDF) <= 300) {
            $this->MotifNDF = $MotifNDF;
        } else {
            $this->addErreur('Le motif du Note de frais doit comporter moins de 300 caractères');
        }
    }

    public function setCommentaire($Commentaire) {
        if (strlen($Commentaire) <= 25) {
            $this->Commentaire = $Commentaire;
        } else {
            $this->addErreur('Le commentaire doit comporter moins de 25 caracteres');
        }
    }

    public function setMontantPrevu($MontantPrevu) {
        if (strlen($MontantPrevu)) {
            $preg_match ="^[+]?([0-9]{1,2})*[.,]([0-9]{1,1})?$^";
        if(preg_match($preg_match,$MontantPrevu)){
            $this->MontantPrevu = $MontantPrevu;  
        }elseif(filter_var($MontantPrevu, FILTER_VALIDATE_INT)){
                $this->MontantPrevu = $MontantPrevu; 
            }else{
                $this->addErreurFiltre('Le montant prevu doit etre un entier ou un decimal');
            }
        
        } else {
            $this->addErreur('Le montant prevu doit etre un entier ou un decimal');
        }
    }
        
    


    public function setEtatNDF($EtatNDF) {
        if (strlen($EtatNDF)) {
            $this->EtatNDF = $EtatNDF;
        } else {
            $this->addErreur('L\'Etat Note de Frais doit etre un caractere');
        }
    }

    public function setNbreNuiteesSiHotellerie($NbreNuiteesSiHotellerie) {
        if (is_integer($NbreNuiteesSiHotellerie) <= 25) {
            if ( $NbreNuiteesSiHotellerie > 0 && $NbreNuiteesSiHotellerie <=10 ){
                $this->NbreNuiteesSiHotellerie = $NbreNuiteesSiHotellerie;
            }else{
                $this->addErreurFiltre('Le nombre de nuit en hotel doit etre compris entre 0 et 7');
            }
        } else {
            $this->addErreur('Le nombre de nuit doit comporter moins de 11 caracteres');
        }
    }

    public function setNbreRepasSiRestauration($NbreRepasSiRestauration) {
        if (is_integer($NbreRepasSiRestauration) <= 11) {
            if ( $NbreRepasSiRestauration > 0 && $NbreRepasSiRestauration <=20 ){
                $this->NbreRepasSiRestauration = $NbreRepasSiRestauration;
            }else{
                $this->addErreurFiltre('Le nombre de repas doit être compris entre 0 et 20');
            }
            }else {
                $this->addErreur('Le nombre de repas doit comporter moins de 11 caracteres');
            }
        }

        public function setCoordonneesGPSDepartSiTransport($CoordonneesGPSDepartSiTransport) {
            if (strlen($CoordonneesGPSDepartSiTransport) <= 40) {
                $this->CoordonneesGPSDepartSiTransport = $CoordonneesGPSDepartSiTransport;
            } else {
                $this->addErreur('le coordonnee de depart  doit comporter moins de 40 caracteres');
            }
        }

        public function setCoordonneesGPSArriveeSiTransport($CoordonneesGPSArriveeSiTransport) {
            if (strlen($CoordonneesGPSArriveeSiTransport) <= 40) {
                $this->CoordonneesGPSArriveeSiTransport = $CoordonneesGPSArriveeSiTransport;
            } else {
                $this->addErreur('Le coordonnee d\'arrive doit comporter moins de 25 caracteres');
            }
        }

        public function setTypeDeTransport($TypeDeTransport) {
            if (strlen($TypeDeTransport) <= 25) {
                $this->TypeDeTransport = $TypeDeTransport;
            } else {
                $this->addErreur('Le type de transport choisi doit comporter moins de 25 caracteres');
            }
        }

        public function setDistanceSiTransport($DistanceSiTransport) {
            if (strlen($DistanceSiTransport)) {
                $this->DistanceSiTransport = $DistanceSiTransport;
            } else {
                $this->addErreur('Le distance Transport doit etre un entier');
            }
        }

        public function setLogin($Login) {
            if (is_integer($Login) <= 11) {
                $this->Login = $Login;
            } else {
                $this->addErreur('Le login doit comporter moins de 11 caracteres');
            }
        }

        public function setIdClient($IdClient) {
            if (is_integer($IdClient) <= 11) {
                $this->IdClient = $IdClient;
            } else {
                $this->addErreur('L\id client doit comporter moins de 11 caracteres');
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


