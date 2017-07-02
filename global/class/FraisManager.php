<?php

require_once 'Manager.php';

/**
 * Description of FraisManager
 *
 * @author Micka
 */
class FraisManager extends Manager {

  public function __construct() {
      parent::__construct();
  }

  public function read($id) {
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM frais WHERE id = :id");
      $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $frais = new Frais($data);
      return $frais;
  }

  public function create(Frais & $frais) {
    $this->pdoStatement = $this->pdo->prepare("INSERT INTO frais(nature, titre, montant, date, commentaire, transport)"
            . " VALUES(:nature,:titre,:montant ,:date ,:commentaire ,:transport)");
    $this->pdoStatement->bindValue(':nature', $frais->getNom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':titre', $frais->getPrenom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':montant', $frais->getGenre(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':date', $frais->getDateN(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':commentaire', $frais->getEmail(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':transport', $frais->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->execute();

    $data = $this->pdoStatement->fetch();
    $frais = new Frais($data);
    return $frais;
  }

  public function update(Frais & $frais) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE * FROM frais(nature, titre, montant, date, commentaire, transport)"
            . " VALUES(:nature,:titre,:montant ,:date ,:commentaire ,:transport) WHERE id = :id");
    $this->pdoStatement->bindValue(':id', $frais->getId(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':nature', $frais->getNom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':titre', $frais->getPrenom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':montant', $frais->getGenre(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':date', $frais->getDateN(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':commentaire', $frais->getEmail(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':transport', $frais->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->execute();

    $data = $this->pdoSatement->fetch();
    $frais = new Frais($data);
    return $frais;
  }

  public function delete($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM frais WHERE id = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $data = $this->pdoSatement->fetch();
    $frais = new Frais($data);
    return $frais;
  }

}
