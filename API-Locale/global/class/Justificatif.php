<?php

/**
 * Description of Client
 *
 * @author Micka
 */

class Justificatif extends Erreur {

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
            $this->addErreur('L\'IdJustificatif doit etre un nombre entier');
        }
    }

    public function setIntituleJustificatif($IntituleJustificatif) {
      if($IntituleJustificatif == ''){
         $this->addErreur('le justificatif  n\'est pas remplit');
      }else{
        if (strlen($IntituleJustificatif) <= 250) {
            $this->IntituleJustificatif = $IntituleJustificatif;
        } else {
            $this->addErreur('Votre  justificatif est trop grand');
        }
      }
    }

     public function setURLNomFichier($URLNomFichier) {
      if($URLNomFichier == ''){
         $this->addErreur('le URL  n\'est pas remplit');
      }else{
        if (strlen($URLNomFichier)<= 200) {
            $this->URLNomFichier = $URLNomFichier;
        } else {
            $this->addErreur('L\'URL Nom Fichier doit comporter moins de 200 caracteres');
        }
      }
    }

    public function setMontantJustificatif($MontantJustificatif) {
      if($MontantJustificatif == ''){
         $this->addErreur('le Montant  n\'est pas remplit');
      }else{
        $preg_match ="/^[0-9]*[.,]*[0-9]*$/";
        if(preg_match($preg_match,$MontantJustificatif)){
                  $this->MontantJustificatif = $MontantJustificatif;
             }else{
              $this->addErreur('Le montant prevu doit etre un entier ou un decimal');
             }
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


