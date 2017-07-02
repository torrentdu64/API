<?php

require_once 'Manager.php';

/**
 * Description of ClientManager
 *
 * @author Micka
 */
class ClientManager extends Manager {

  public function __construct() {
    parent::__construct();
  }

  public function read($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM client WHERE id = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetch();
    $client = new Client($data);
    return $client;
  }

  public function create(Client & $client) {
    $this->pdoStatement = $this->pdo->prepare("INSERT INTO client(nom, prenom, genre, dateN, email, photo)"
            . " VALUES(:nom,:prenom,:genre ,:dateN ,:email ,:photo)");
    $this->pdoStatement->bindValue(':nom', $client->getNom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':prenom', $client->getPrenom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':genre', $client->getGenre(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateN', $client->getDateN(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':email', $client->getEmail(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':photo', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetch();
    $client = new Client($data);
    return $client;
  }

  public function update(Client & $client) {
    $this->pdoStatement = $this->pdo->prepare("UPDATE * FROM client(nom, prenom, genre, dateN, email, photo)"
            . " VALUES(:nom,:prenom,:genre ,:dateN ,:email ,:photo) WHERE id = :id");
    $this->pdoStatement->bindValue(':id', $client->getId(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':nom', $client->getNom(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':prenom', $client->getPrenom(), PDO::PARAM_STR;
    $this->pdoStatement->bindValue(':genre', $client->getGenre(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':dateN', $client->getDateN(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':email', $client->getEmail(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':photo', $client->getPhoto(), PDO::PARAM_STR);
    $this->pdoStatement->execute();
    $data = $this->pdoSatement->fetch();
    $client = new Client($data);
    return $client;
  }

  public function delete($id) {
    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM client WHERE id = :id");
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $this->pdoStatement->execute();
    $data = $this->pdoSatement->fetch();
    $client = new Client($data);
    return $client;
  }

}
