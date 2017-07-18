<?php

use \Jacwright\RestServer\RestException;

class JustificatifController
{

  private $justificatifManager;

  public function __construct(){
    $this->justificatifManager = new JustificatifManager();
  }



    /**
     * Gets all justificatif
     *
     * @url GET /justificatif
     *
     */


    public function getAllJustificatif(){
        $listeJusticatif = $this->justificatifManager->readAll();
        $tabAlljusticatif = [];

        //foreach ($listeClients as $key => $client) {
        $data = ['IdJustificatif' => $justificatif->getIdJustificatif(),
                 'IntituleJustificatif' => $justificatif->getIntituleJustificatif(),
                 'URLNomFichier' => $justificatif->getURLNomFichier(),
                 'MontantJustificatif' => $justificatif->getMontantJustificatif(),
                ];

                $tabAlljustificatif[] = $data;
       // }

        return $tabAlljustificatif;

    }





    /**
     * Gets the MontantJustificatif by id or current user
     *
     * @url GET /justificatif/$id
     *
     */


    public function getOneJustifictif($id){

      $selectedJustificatif = $this->justificatifManager->read($id);
        // var_dump($selectedClients);



        $tabSelectedJustificatif =
        ['IdJustificatif' => $selectedJustificatif->getIdJustificatif(),
         'IntituleJustificatif' => $selectedJustificatif->getIntituleJustificatif(),
         'URLNomFichier' => $selectedJustificatif->getURLNomFichier(),
         'MontantJustificatif' => $selectedJustificatif->getMontantJustificatif()
          ];


        return $tabSelectedJustificatif;

    }

    /**
     * Post one user
     *
     * @url POST /justificatif
     *
     */


    public function createOneJustificatif(){
      // $champ = ["NomClient", "PrenomClient", "Adresse1Client", "Adresse2Client","CodePostalClient", "VilleClient" , "TelephoneBureauClient", "TelephoneMobileClient", "MailClient", "BudgetMaxRemboursementClient"];
      // foreach ($champ as $key) {
           // if(isset($_POST[$key])){

            $data = [ 'IdJustificatif' => $_POST["IdJustificatif"],
                       'IntituleJustificatif'  => $_POST["IntituleJustificatif"],
                       'URLNomFichier' => $_POST["URLNomFichier"],
                       'MontantJustificatif' => $_POST["MontantJustificatif"]
                    ];

                        $justificatifJSON = new Justificatif($data);
                        $ok = $this->justificatifManager->create($justificatifJSON);
                        return $result = ['success' => $ok];

           // }
         // if(isset($_POST["NomClient"]) && isset($_POST["PrenomClient"]) && isset($_POST["Adresse1Client"]) && isset($_POST["Adresse2Client"]) && isset($_POST["CodePostalClient"]) && isset($_POST["VilleClient"]), isset($_POST["TelephoneBureauClient"]) && isset($_POST["TelephoneMobileClient"]) && isset($_POST["MailClient"]) && isset($_POST["BudgetMaxRemboursementClient"]) ){



         // }else{
         //  return "nop";
         // }
      //}



        $justificatifJSON = new Justificatif($data);


        return $this->justificatifManager->create($clientJSON);

        // return $result;

        }


        /**
         * Update one user
         *
         * @url PUT /justificatif/$id
         *
         */

    public function updateOneJustificatif($id){

        // foreach ($clientJSON as $key) {
        //     $json = $key;
        // }

        // var_dump($_POST);

        $method = $_SERVER['REQUEST_METHOD'];
            if ('PUT' === $method) {
                parse_str(file_get_contents('php://input'), $_PUT);
                 //var_dump($_PUT); //$_PUT contains put fields
        }

         $data = [ 'IdJustificatif' => $id,
                 'IntituleJustificatif'  => $_PUT["IntituleJustificatif"],
                 'URLNomFichier' => $_PUT["URLNomFichier"],
                 'MontantJustificatif' => $_PUT["MontantJustificatif"]
                    ];

        $justificatifObject = new Justificatif($data);

        return $this->justificatifManager->update($justificatifObject);

        // return $result;

        }



    /**
     * Delete one user
     *
     * @url DELETE /justificatif/$id
     *
     */


    public function deleteOneJustificatif($id){


        // return "Le client n° ".$deleteClient->getIdClient()." au nom de ".$deleteClient->getNomClient()." a bien été supprimé !";

        $ok = $this->justificatifManager->delete($id);
        $result = ['success' => $ok];

        return $result;
    }



}
