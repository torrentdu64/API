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
            $this->addErreur('L\'intitulé doit comporter moins de 300 caractères');
        }
    }

    public function setDateNDF($DateNDF) {
        if (strlen($DateNDF)) {
            $this->DateNDF = $DateNDF;
        } else {
            $this->addErreur('Date=>Chaine de caractère');
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
            $this->addErreur('Le commentaire doit comporter moins de 25 caractères');
        }
    }

    public function setMontantPrevu($MontantPrevu) {
        if (is_integer($MontantPrevu)) {
            $this->MontantPrevu = $MontantPrevu;
        } else {
            $this->addErreur('Le montant prévu doit être un entier');
        }
    }
    
        
         public function setEtatNDF($EtatNDF) {
        if (strlen($EtatNDF)) {
            $this->EtatNDF = $EtatNDF;
        } else {
            $this->addErreur('L\'Etat Note de Frais doit être un caractere');
        }
    }

    public function setNbreNuiteesSiHotellerie($NbreNuiteesSiHotellerie) {
         if (is_integer($NbreNuiteesSiHotellerie) <= 25) {
            $this->NbreNuiteesSiHotellerie = $NbreNuiteesSiHotellerie;
        } else {
            $this->addErreur('Le nombre de nuit doit comporter moins de 11 caractères');
        }
    }
    
     public function setNbreRepasSiRestauration($NbreRepasSiRestauration) {
        if (is_integer($NbreRepasSiRestauration) <= 11) {
            $this->NbreRepasSiRestauration = $NbreRepasSiRestauration;
        } else {
            $this->addErreur('Le nombre de repas doit comporter moins de 11 caractères');
        }
    }
    
     public function setCoordonneesGPSDepartSiTransport($CoordonneesGPSDepartSiTransport) {
        if (strlen($CoordonneesGPSDepartSiTransport) <= 40) {
            $this->CoordonneesGPSDepartSiTransport = $CoordonneesGPSDepartSiTransport;
        } else {
            $this->addErreur('le coordonnée de départ  doit comporter moins de 40 caractères');
        }
    }
    
     public function setCoordonneesGPSArriveeSiTransport($CoordonneesGPSArriveeSiTransport) {
        if (strlen($CoordonneesGPSArriveeSiTransport) <= 40) {
            $this->CoordonneesGPSArriveeSiTransport = $CoordonneesGPSArriveeSiTransport;
        } else {
            $this->addErreur('Le coordonnée d\'arrivé doit comporter moins de 25 caractères');
        }
    }
    
     public function setTypeDeTransport($TypeDeTransport) {
        if (strlen($TypeDeTransport) <= 25) {
            $this->TypeDeTransport = $TypeDeTransport;
        } else {
            $this->addErreur('Le type de transport choisi doit comporter moins de 25 caractères');
        }
    }
    
     public function setDistanceSiTransport($DistanceSiTransport) {
         if (strlen($DistanceSiTransport)) {
            $this->DistanceSiTransport = $DistanceSiTransport;
        } else {
            $this->addErreur('Le distance Transport doit être un entier');
        }
    }
    
     public function setLogin($Login) {
        if (is_integer($Login) <= 11) {
            $this->Login = $Login;
        } else {
            $this->addErreur('Le login doit comporter moins de 11 caractères');
        }
    }
    
    public function setIdClient($IdClient) {
        if (is_integer($IdClient) <= 11) {
            $this->IdClient = $IdClient;
        } else {
            $this->addErreur('L\id client doit comporter moins de 11 caractères');
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

    
