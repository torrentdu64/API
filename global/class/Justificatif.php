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
            $this->addErreur('L\'Intitule justificatif doit comporter moins de 200 caracteres');
        }
    }
    
     public function setURLNomFichier($URLNomFichier) {
        if (strlen($URLNomFichier)<= 200) {
            $this->URLNomFichier = $URLNomFichier;
        } else {
            $this->addErreur('L\'URL Nom Fichier doit comporter moins de 200 caracteres');
        }
    }
    
      public function setMontantJustificatif($MontantJustificatif) {
        if (strlen($MontantJustificatif)) {

            $preg_match ="^[+]?([0-9]{1,2})*[.,]([0-9]{1,1})?$^";
        if(preg_match($preg_match,$MontantJustificatif)){
            $this->MontantJustificatif = $MontantJustificatif;
            }elseif(filter_var($MontantJustificatif, FILTER_VALIDATE_INT)){
                  $this->MontantJustificatif = $MontantJustificatif;
              }else{
                  $this->addErreurFiltre('Le montant prevu doit être un entier ou un decimal');
              }
                                         
        } else {
            $this->addErreur('Le montant justificatif doit être un nombre entier');
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
            
            
