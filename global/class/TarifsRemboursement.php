 <?php
/**
 * Description of Client
 *
 * @author Micka
 */
class TarifsRemboursement extends Erreur {
    private $TypeDeFrais;
    private $MontantRemboursement;
    private $Unites;


     public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);
        }
    }

      public function setTypeDeFrais($TypeDeFrais) {
        if($TypeDeFrais == ''){
         $this->addErreur('le Type de frais n\'est pas remplit');
        }else{
          if (is_integer(intval($TypeDeFrais))) {
              $this->TypeDeFrais = $TypeDeFrais;
          } else {
              $this->addErreur('Le Type De Frais doit être un nombre entier');
          }
        }
      }


    //   public function setMontantPrevu($MontantPrevu) {
    //      if($MontantPrevu == ''){
    //      $this->addErreur('le Montant Prevu n\'est pas remplit');
    //       }else{
    //     if (strlen($MontantPrevu)) {
    //         $preg_match ="^[+]?([0-9]{1,2})*[.,]([0-9]{1,1})?$^";
    //     if(preg_match($preg_match,$MontantPrevu)){
    //         $this->MontantPrevu = $MontantPrevu;
    //     }elseif(filter_var($MontantPrevu, FILTER_VALIDATE_INT)){
    //             $this->MontantPrevu = $MontantPrevu;
    //         }else{
    //             $this->addErreurFiltre('Le montant prevu doit être un entier ou un decimal');
    //         }

    //     } else {
    //         $this->addErreur('Le montant prevu doit être un entier');
    //     }
    //   }
    // }


    public function setMontantRemboursement($MontantRemboursement) {
      if($MontantRemboursement == ''){
      $this->addErreur('le Montant Prevu n\'est pas remplit');
      }else{
        $preg_match ="/^[0-9]*[.,]*[0-9]*$/";
        if(preg_match($preg_match,$MontantRemboursement)){
            $this->MontantRemboursement = $MontantRemboursement;  //strval($MontantRemboursement);
        }else{
          $this->addErreur('Le montant est incorrect');
        }
      }
    }

    public function setUnites($Unites) {
      if($Unites == ''){
         $this->addErreur('l unites n\'est pas remplit');
      }else{
        if (is_string($Unites)) {
            $this->Unites = $Unites;
        } else {
            $this->addErreur("L'Unite n'est pas justifier");
        }
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
