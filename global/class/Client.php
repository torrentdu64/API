<?php

/**
 * Description of Client
 *
 * @author Micka
 */
class Client extends Entity {

// * Attribut to sync db

    private $IdClient;
    private $NomClient;
    private $PrenomClient;
    private $Adresse1Client;
    private $Adresse2Client;
    private $CodePostalClient;
    private $VilleClient;
    private $TelephoneBureauClient;
    private $TelephoneMobileClient;
    private $MailClient;
    private $BudgetMaxRemboursementClient;

//============================================================================//
// * Constructeur
//============================================================================//

    public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);
        }
    }

//============================================================================//
// * Setter
//  !! TODO changer les message d 'erreur !!
//============================================================================//

    public function setIdClient($IdClient) {
        if (is_integer(intval($IdClient))) {
            $this->IdClient = $IdClient;
        } else {
            $this->addErreur('L\'IdClient doit être un nombre entier');
        }
    }

    public function setNomClient($NomClient) {
        if (strlen($NomClient) <= 25) {
            $this->NomClient = $NomClient;
        } else {
            $this->addErreur('Le NomClient doit comporter moins de 25 caractères');
        }
    }

    public function setPrenomClient($PrenomClient) {
        if (strlen($PrenomClient) <= 25) {
            $this->PrenomClient = $PrenomClient;
        } else {
            $this->addErreur('Le PrenomClient doit comporter moins de 25 caractères');
        }
    }

    public function setAdresse1Client($Adresse1Client) {
        if (strlen($Adresse1Client) <= 150) {
            $this->Adresse1Client = $Adresse1Client;
        } else {
            $this->addErreur('Le Adresse1Client doit comporter moins de 25 caractères');
        }
    }

    public function setAdresse2Client($Adresse2Client) {
        if (strlen($Adresse2Client) <= 150) {
            $this->Adresse2Client = $Adresse2Client;
        } else {
            $this->addErreur('Le Adresse2Client doit comporter moins de 25 caractères');
        }
    }

        //  !! TODO => change filter to code postal !!

    public function setCodePostalClient($CodePostalClient) {
      $preg_match ="/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/";
      if(preg_match($preg_match,$CodePostalClient)){
          $this->CodePostalClient = $CodePostalClient;
      } else {
      $this->addErreur('L\'CodePostalClient est incorrect !');
      }
    }


        // !! TODO strlen change to array who check ville !!
    public function setVilleClient($VilleClient) {
        $preg_match ="/[a-zA-Z-éèà']/";
      if(preg_match($preg_match,$VilleClient)){
            $this->VilleClient = $VilleClient;
        } else {
            $this->addErreur('Votre ville est incorrect');
        }
    }

        // !! TODO strlen change to integer !!
        // pensez a faire l ville en majuscule
    public function setTelephoneBureauClient($TelephoneBureauClient) {
        if (strlen($TelephoneBureauClient) <= 25) {
            $this->TelephoneBureauClient = $TelephoneBureauClient;
        } else {
            $this->addErreur('Le TelephoneBureauClient doit comporter moins de 25 caractères');
        }
    }
        //  !! TODO strlen change to integer !!
   public function setTelephoneMobileClient($TelephoneMobileClient) {
        if (strlen($TelephoneMobileClient) <= 25) {
            $this->TelephoneMobileClient = $TelephoneMobileClient;
        } else {
            $this->addErreur('Le TelephoneMobileClient doit comporter moins de 25 caractères');
        }
    }


      // !! TODO change strlen to filter regex to check mail valid? !!
    public function setMailClient($MailClient) {
        if (strlen($MailClient) <= 25) {
            $this->MailClient = $MailClient;
        } else {
            $this->addErreur('Le MailClient doit comporter moins de 25 caractères');
        }
    }

      // !! TODO change strlen to Interger  !!
    public function setBudgetMaxRemboursementClient($BudgetMaxRemboursementClient) {
        if(isset($BudgetMaxRemboursementClient)){
            $this->BudgetMaxRemboursementClient = $BudgetMaxRemboursementClient*100;
        }else{
          $this->addErreur('Veuillez entrer un budget');
        }



    }

//============================================================================//
// * Getter
//    Prefix to get Attribut:
//    private $IdClient;
//    private $PrenomClient;
//    private $Adresse1Client;
//    private $Adresse2Client;
//    private $CodePostalClient;
//    private $VilleClient;
//    private $TelephoneBureauClient;
//    private $TelephoneMobileClient;
//    private $MailClient;
//    private $BudgetMaxRemboursementClient;
//============================================================================//

    function getIdClient() {
        return $this->IdClient;
    }

    function getNomClient() {
        return $this->NomClient;
    }

    function getPrenomClient() {
        return $this->PrenomClient;
    }

    function getAdresse1Client() {
        return $this->Adresse1Client;
    }

    function getAdresse2Client() {
        return $this->Adresse2Client;
    }

    function getCodePostalClient() {
        return $this->CodePostalClient;
    }

    function getVilleClient() {
        return $this->VilleClient;
    }

    function getTelephoneBureauClient() {
        return $this->TelephoneBureauClient;
    }

    function getTelephoneMobileClient() {
        return $this->TelephoneMobileClient;
    }

    function getMailClient() {
        return $this->MailClient;
    }

    function getBudgetMaxRemboursementClient() {
        return $this->BudgetMaxRemboursementClient;
    }

    function erreur() {
        return $this->getErreur();
    }
}
