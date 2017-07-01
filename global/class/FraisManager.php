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
        $this->pdoStatement = $this->pdo->prepare("INSERT INTO frais(nom, prenom, genre, dateN, email, photo)"
                . " VALUES(:nom,:prenom,:genre ,:dateN ,:email ,:photo)");
        $this->pdoStatement->bindValue(':nom', $frais->getNom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':prenom', $frais->getPrenom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':genre', $frais->getGenre(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':dateN', $frais->getDateN(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':email', $frais->getEmail(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':photo', $frais->getPhoto(), PDO::PARAM_STR);
        $this->pdoStatement->execute();

        $data = $this->pdoStatement->fetch();
        $frais = new Frais($data);
        return $frais;
    }

    public function update(Frais & $frais) {

        $this->pdoStatement = $this->pdo->prepare("UPDATE * FROM frais(nom, prenom, genre, dateN, email, photo)"
                . " VALUES(:nom,:prenom,:genre ,:dateN ,:email ,:photo) WHERE id = :id");
        $this->pdoStatement->bindValue(':id', $frais->getId(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':nom', $frais->getNom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':prenom', $frais->getPrenom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':genre', $frais->getGenre(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':dateN', $frais->getDateN(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':email', $frais->getEmail(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':photo', $frais->getPhoto(), PDO::PARAM_STR);
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
