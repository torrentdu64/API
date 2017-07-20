<?php

use \Jacwright\RestServer\RestException;

class JustificatifController{

  private $justificatifManager;

  public function __construct(){
    $this->manager = new JustificatifManager();
    $this->erreur = new Erreur();
  }

  /**
   * Gets all justificatifs
   *
   * @url GET /justificatif
   *
   */


  public function getAllJustificatif(){


      $listeJusticatif = $this->manager->readAll();


      $tabAlljusticatif = [];

      foreach ($listeJusticatif as $key => $justificatif) {

          $data = [
          'IdJustificatif' => $justificatif->getIdJustificatif(),
          'IntituleJustificatif' => $justificatif->getIntituleJustificatif(),
          'URLNomFichier' => $justificatif->getURLNomFichier(),
          'MontantJustificatif' => $justificatif->getMontantJustificatif(),
          ];

          $tabAlljustificatif[] = $data;


      }

    if ($tabAlljustificatif){
        return ['justificatifs' => $tabAlljustificatif];
    }

  }


  /**
   * Get one justificatif by id
   *
   * @url GET /justificatif/$IdJustificatif
   *
   */


  public function getOneJustifictif($IdJustificatif){

      $selectedJustificatif = $this->manager->read($IdJustificatif);

      $tabSelectedJustificatif = [
      'IdJustificatif' => $selectedJustificatif->getIdJustificatif(),
      'IntituleJustificatif' => $selectedJustificatif->getIntituleJustificatif(),
      'URLNomFichier' => $selectedJustificatif->getURLNomFichier(),
      'MontantJustificatif' => $selectedJustificatif->getMontantJustificatif()
      ];

      return ['justificatif' => $tabSelectedJustificatif];


  }

  /**
   * Create one justificatif
   *
   * @url POST /justificatif
   *
   */

  public function createOneJustificatif(){


    $data = [
    'IntituleJustificatif'  => $_POST["IntituleJustificatif"],
    'URLNomFichier' => $_POST["URLNomFichier"],
    'MontantJustificatif' => $_POST["MontantJustificatif"]
    ];

    $object = new Justificatif($data);
    $libelle = "justificatif";

    return $this->erreur->getErreur($this->manager, $object, $libelle, $data);


  }

  /**
   * Update one justificatif
   *
   * @url PUT /justificatif/$IdJustificatif
   *
   */

  public function updateOneJustificatif($IdJustificatif){

     $method = $_SERVER['REQUEST_METHOD'];
        if ('PUT' === $method) {
            parse_str(file_get_contents('php://input'), $_PUT);
        }

     $data = [
     'IdJustificatif' => $IdJustificatif,
     'IntituleJustificatif'  => $_PUT["IntituleJustificatif"],
     'URLNomFichier' => $_PUT["URLNomFichier"],
     'MontantJustificatif' => $_PUT["MontantJustificatif"]
     ];

    $object = new Justificatif($data);
    $libelle = "justificatif";

    return $this->erreur->getErreur($this->manager, $object, $libelle, $data);


  }

  /**
   * Delete one justificatif
   *
   * @url DELETE /justificatif/$IdJustificatif
   *
   */


  public function deleteOneJustificatif($IdJustificatif){

    $result = $this->manager->delete($IdJustificatif);
    return ['success' => $result];

  }


}
