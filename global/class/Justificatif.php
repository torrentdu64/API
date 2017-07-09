<?php

/**
 * Description of Client
 *
 * @author Micka
 */
class Justificatif extends Entity {
    private $IdJustificatif;
    private $IntituleJustificatif;
    private $URLNomFichier;
    private $MontantJustificatif;
    
    public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);
        }
    }
    
      public function setIdJustificatif($IdJustificatif) {
        if (is_integer(intval($IdJustificatif))) {
            $this->IdJustificatif = $IdJustificatif;
        } else {
            $this->addErreur('L\'IdJustificatif doit être un nombre entier');
        }
    }

    public function setIntituleJustificatif($IntituleJustificatif) {
        if (strlen($IntituleJustificatif)<= 200) {
            $this->IntituleJustificatif = $IntituleJustificatif;
        } else {
            $this->addErreur('L\'IntituleJustificatif doit comporter moins de 200 caractères');
        }
    }
    
     public function setURLNomFichier($URLNomFichier) {
        if (strlen($URLNomFichier)<= 200) {
            $this->URLNomFichier = $URLNomFichier;
        } else {
            $this->addErreur('L\'URLNomFichier doit comporter moins de 200 caractères');
        }
    }
    
      public function setMontantJustificatif($MontantJustificatif) {
        if (strlen($MontantJustificatif)) {
            $this->MontantJustificatif = $MontantJustificatif;
        } else {
            $this->addErreur('Le MontantJustificatif doit être un nombre entier');
        }
    }
    
    
    
    function getIdJustificatif() {
        return $this->IdJustificatif;
    }
    
     function getIntituleJustificatif() {
        return $this->IntituleJustificatif;
    }
    
     function getURLNomFichier() {
        return $this->URLNomFichier;
    }
    
     function getMontantJustificatif() {
        return $this->MontantJustificatif;
    }
    
    
    
    
            
}
            
            
