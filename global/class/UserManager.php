<?php

require_once 'Manager.php';

/**
 * Description of FraisManager
 *
 * @author Micka
 */
class UserManager extends Manager {

  public function __construct() {
      parent::__construct();
  }

  public function read($IdUser) {
      $this->pdoStatement = $this->pdo->prepare("SELECT * FROM user WHERE login = :IdUser");
      $this->pdoStatement->bindValue(':IdUser', $IdUser, PDO::PARAM_INT);
      $this->pdoStatement->execute();
      $data = $this->pdoStatement->fetch();
      $user = new User($data);
      return $user;
  }

  public function readAll() {

    $this->pdoStatement = $this->pdo->prepare("SELECT * FROM user");
    $this->pdoStatement->execute();
    $data = $this->pdoStatement->fetchAll();

    $objectUser = [];


    foreach ($data as $user) {
          $objectUser[] = new User($user);
        }

    return $objectUser;
  }

  public function create(User &$user) {
      var_dump($user);
       $this->pdoStatement = $this->pdo->prepare("INSERT INTO user( NomReps, PrenomReps, Adresse1Reps, Adresse2Reps, CodePostalReps, VilleReps, EmailReps, TelephoneReps, Commentaires,	DateEmbauche,TypeDeDroits,	MotDePasseUser,CategorieUser,IdType) VALUES( :NomReps, :PrenomReps , :Adresse1Reps , :Adresse2Reps , :CodePostalReps, :VilleReps, :EmailReps, :TelephoneReps, :Commentaires, :DateEmbauche, :TypeDeDroits, :MotDePasseUser, :CategorieUser,:IdType )");
    $this->pdoStatement->bindValue(':NomReps', $user->getNomReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':PrenomReps', $user->getPrenomReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse1Reps', $user->getAdresse1Reps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse2Reps', $user->getAdresse2Reps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CodePostalReps',$user->getCodePostalReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':VilleReps',$user->getVilleReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':EmailReps',$user->getEmailReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneReps',$user->getTelephoneReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Commentaires',$user->getCommentaires(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':DateEmbauche',$user->getDateEmbauche(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TypeDeDroits',$user->getTypeDeDroits(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MotDePasseUser',$user->getMotDePasseUser(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CategorieUser',$user->getCategorieUser(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':IdType', $user->getIdType(), PDO::PARAM_INT);
    $result = $this->pdoStatement->execute();
       var_dump($result);
    if($result){
      $login = $this->pdo->lastInsertId();
      $user = $this->read($login);
    } else {
      return false;
    }
  }


    public function update(User $user) {
    var_dump($user);
    $this->pdoStatement = $this->pdo->prepare("UPDATE user SET NomReps = :NomReps, PrenomReps = :PrenomReps, Adresse1Reps = :Adresse1Reps, Adresse2Reps = :Adresse2Reps , CodePostalReps = :CodePostalReps , VilleReps = :VilleReps, EmailReps = :EmailReps, TelephoneReps = :TelephoneReps, Commentaires = :Commentaires, DateEmbauche = :DateEmbauche,  TypeDeDroits = :TypeDeDroits, MotDePasseUser = :MotDePasseUser,CategorieUser = :CategorieUser,IdType = :IdType WHERE login = :login");
    $this->pdoStatement->bindValue(':login',$user->getlogin(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':NomReps', $user->getNomReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':PrenomReps', $user->getPrenomReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse1Reps', $user->getAdresse1Reps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Adresse2Reps', $user->getAdresse2Reps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CodePostalReps',$user->getCodePostalReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':VilleReps',$user->getVilleReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':EmailReps',$user->getEmailReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TelephoneReps',$user->getTelephoneReps(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':Commentaires',$user->getCommentaires(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':DateEmbauche',$user->getDateEmbauche(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':TypeDeDroits',$user->getTypeDeDroits(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':MotDePasseUser',$user->getMotDePasseUser(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':CategorieUser',$user->getCategorieUser(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':IdType', $user->getIdType(), PDO::PARAM_INT);
    $result = $this->pdoStatement->execute();
    var_dump($result);
    return $user;
  }


  public function delete($IdUser) {
    $this->pdoStatement = $this->pdo->prepare("DELETE FROM user WHERE login = $IdUser");
    $this->pdoStatement->execute();
    $count = $this->pdoStatement->rowCount();
    if ($count == 0) {
      return false;
    } else {
      return true;
    }
  }
}






