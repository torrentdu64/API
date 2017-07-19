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
      if ($NomClient == ''){
         $this->addErreur('le Nom n\'est pas remplit');
      }else{
        if (strlen($NomClient) <= 25) {
            $this->NomClient = $NomClient;
        } else {
            $this->addErreur('Le NomClient doit comporter moins de 25 caractères');
        }

      }
    }

    public function setPrenomClient($PrenomClient) {
      if($PrenomClient == ''){
         $this->addErreur('le Nom n\'est pas remplit');
      }else{
        if (strlen($PrenomClient) <= 25) {
            $this->PrenomClient = $PrenomClient;
        } else {
            $this->addErreur('Le PrenomClient doit comporter moins de 25 caractères');
        }
      }
    }

    public function setAdresse1Client($Adresse1Client) {
      if($Adresse1Client == ''){
         $this->addErreur('l\'Adresse n\'est pas remplit');
      }else{
        if (strlen($Adresse1Client) <= 150) {
            $this->Adresse1Client = $Adresse1Client;
        } else {
            $this->addErreur('Le Adresse1Client doit comporter moins de 25 caractères');
        }
      }
    }

    public function setAdresse2Client($Adresse2Client) {
      if($Adresse2Client == ''){
         $this->addErreur('l\'Adresse complementaire n\'est pas remplit');
      }else{
        if (strlen($Adresse2Client) <= 150) {
            $this->Adresse2Client = $Adresse2Client;
        } else {
            $this->addErreur('Le Adresse2Client doit comporter moins de 25 caractères');
        }
      }
    }



    public function setCodePostalClient($CodePostalClient) {
      if($CodePostalClient == ''){
         $this->addErreur('le code postal n\'est pas remplit');
      }else{
        $preg_match ="/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/";
        if(preg_match($preg_match,$CodePostalClient)){
            $this->CodePostalClient = $CodePostalClient;
        } else {
          $this->addErreur('L\'CodePostalClient est incorrect !');
       }
      }
    }



    public function setVilleClient($VilleClient) {
      if($VilleClient == ''){
         $this->addErreur('la ville  n\'est pas remplit');
      }else{
        $preg_match ="/[a-zA-Z-éèà']/";
      if(preg_match($preg_match,$VilleClient)){
            $this->VilleClient = ucfirst($VilleClient);
        } else {
            $this->addErreur('Votre ville est incorrect');
        }
      }
    }



    public function setTelephoneBureauClient($TelephoneBureauClient) {
      if($TelephoneBureauClient == ''){
         $this->addErreur('le telephone bureau  n\'est pas remplit');
      }else{
         $preg_match = "/([+33]|(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4})/";
      if((preg_match($preg_match,$TelephoneBureauClient)) && strlen($TelephoneBureauClient) <= 18){
            $this->TelephoneBureauClient = $TelephoneBureauClient;
        } else {
            $this->addErreur("Le Numero telephone n'pas valide");
        }
      }
    }

   public function setTelephoneMobileClient($TelephoneMobileClient) {
    if($TelephoneMobileClient == ''){
         $this->addErreur('le telephone mobile n\'est pas remplit');
      }else{
        $preg_match = "/([+33]|(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4})/";
      if((preg_match($preg_match,$TelephoneMobileClient)) && strlen($TelephoneMobileClient) <= 18){
            $this->TelephoneMobileClient = $TelephoneMobileClient;
        } else {
            $this->addErreur("Le Numero telephone n'pas valide");
        }
      }
    }



    public function setMailClient($MailClient) {
      if($MailClient == ''){
         $this->addErreur('le mail n\'est pas remplit');
      }else{
         $preg_match ="/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
      if(preg_match($preg_match,$MailClient)){
            $this->MailClient = $MailClient;
        } else {
            $this->addErreur("Le Mail n'est pas valide");
        }
      }
    }

// verifier les espace des du montant
    public function setBudgetMaxRemboursementClient($BudgetMaxRemboursementClient) {
      if($BudgetMaxRemboursementClient == ''){
         $this->addErreur('le budget  n\'est pas remplit');
      }else{
        if(is_float($BudgetMaxRemboursementClient) || is_numeric($BudgetMaxRemboursementClient)){
            $this->BudgetMaxRemboursementClient = $BudgetMaxRemboursementClient*100;
        }else{
          $this->addErreur("le budget n'est pas valide");
        }
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
