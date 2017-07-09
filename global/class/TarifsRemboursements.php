 <?php

/**
 * Description of Client
 *
 * @author Micka
 */
class TarifsRemboursements extends Entity {
    private $TypeDeFrais;
    private $MontantRemboursement;
    private $Unites;

    
     public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);
        }
    }
    
      public function setTypeDeFrais($TypeDeFrais) {
        if (is_integer(intval($TypeDeFrais))) {
            $this->TypeDeFrais = $TypeDeFrais;
        } else {
            $this->addErreur('Le TypeDeFrais doit être un nombre entier');
        }
    }

    public function setMontantRemboursement($MontantRemboursement) {
        if (strlen($MontantRemboursement)) {
            $this->MontantRemboursement = $MontantRemboursement;
        } else {
            $this->addErreur('Le MontantRemboursement doit être un entier');
        }
    }

    public function setUnites($Unites) {
        if (strlen($Unites) <= 25) {
            $this->Unites = $Unites;
        } else {
            $this->addErreur('L\'Unité doit comporter moins de 25 caractères');
        }
    }
    
     function getTypeDeFrais() {
        return $this->TypeDeFrais;
    }

    function getMontantRemboursement() {
        return $this->MontantRemboursement;
    }
    
    function getUnites() {
        return $this->Unites;
    }
    
    
    
}