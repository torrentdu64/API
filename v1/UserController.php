<?php

use \Jacwright\RestServer\RestException;

class UserController
{

	private $manager;
    private $erreur;

	public function __construct(){
		$this->manager = new UserManager();
        $this->erreur = new Erreur();
	}

    /**
     * Gets all users
     *
     * @url GET /user
     * 
     */

    public function getAllUser(){       

        $listeUser = $this->manager->readAll();
        
        $tabAllUser = [];

        foreach ($listeUser as $key => $user) {

                 $data = [
                 'login' => $user->getlogin(),
                 'NomReps' => $user->getNomReps(),
                 'PrenomReps' => $user->getPrenomReps(),
                 'Adresse1Reps' => $user->getAdresse1Reps(),
                 'Adresse2Reps' => $user->getAdresse2Reps(),
                 'CodePostalReps' => $user->getCodePostalReps(),
                 'VilleReps' => $user->getVilleReps(),
                 'EmailReps' => $user->getEmailReps(),
                 'TelephoneReps' => $user->getTelephoneReps(),
                 'Commentaires' => $user->getCommentaires(),
                 'DateEmbauche' => $user->getDateEmbauche(),
                 'TypeDeDroits' => $user->getTypeDeDroits(),
                 'MotDePasseUser' => $user->getMotDePasseUser(),
                 'CategorieUser' => $user->getCategorieUser(),
                 'IdType' => $user->getIdType()
                 ];     

                $tabAllUser[] = $data;
        }

        if ($listeUser){
            return ['users' => $tabAllUser];
        }
    
    }

    /**
     * Get one user
     *
     * @url GET /user/$IdUser
     * 
     */

    public function getOneUser($IdUser){       

        $selectedUser = $this->manager->read($IdUser);

        $tabSelectedUser = [
        'login' => $selectedUser->getLogin(),
        'NomReps' => $selectedUser->getNomReps(),
        'PrenomReps' => $selectedUser->getPrenomReps(),
        'Adresse1Reps' => $selectedUser->getAdresse1Reps(),
        'Adresse2Reps' => $selectedUser->getAdresse2Reps(),
        'CodePostalReps' => $selectedUser->getCodePostalReps(),
        'VilleReps' => $selectedUser->getVilleReps(),
        'EmailReps' => $selectedUser->getEmailReps(),
        'TelephoneReps' => $selectedUser->getTelephoneReps(),
        'Commentaires' => $selectedUser->getCommentaires(),
        'DateEmbauche' => $selectedUser->getDateEmbauche(),
        'TypeDeDroits' => $selectedUser->getTypeDeDroits(),
        'MotDePasseUser' => $selectedUser->getMotDePasseUser(),
        'CategorieUser' => $selectedUser->getCategorieUser(),
        'IdType' => $selectedUser->getIdType()
        ];
                
        $tab[] = $tabSelectedUser; 

        if ($selectedUser){
            return ['user' => $tab];
        }

    }

    /**
     * Create one user
     *
     * @url POST /user
     * 
     */
  
    public function createOneUser(){       

            $data = [ 
            'NomReps'  => $_POST["NomReps"],
            'PrenomReps' => $_POST["PrenomReps"],
            'Adresse1Reps' => $_POST["Adresse1Reps"],
            'Adresse2Reps' => $_POST["Adresse2Reps"],
            'CodePostalReps' => $_POST["CodePostalReps"],
            'VilleReps' => $_POST["VilleReps"],
            'EmailReps' => $_POST["EmailReps"],
            'TelephoneReps' => $_POST["TelephoneReps"],
            'Commentaires' => $_POST["Commentaires"],
            'DateEmbauche' => $_POST["DateEmbauche"],
            'TypeDeDroits' => $_POST["TypeDeDroits"],
            'MotDePasseUser' => $_POST["MotDePasseUser"],
            'CategorieUser' => $_POST["CategorieUser"],
            'IdType' => $_POST["IdType"]
            ];
                        
        $object = new User($data);
        $libelle = "user";

        return $this->erreur->getCreate($this->manager, $object, $libelle, $data);

    } 

    /**
     * Update one user
     *
     * @url PUT /user/$IdUser
     * 
     */

    public function updateOneUser($IdUser){       

        $method = $_SERVER['REQUEST_METHOD'];
          if ('PUT' === $method) {
            parse_str(file_get_contents('php://input'), $_PUT);
          }

         $data = [
         'login' => $IdUser,
         'NomReps'  => $_PUT["NomReps"],
         'PrenomReps' => $_PUT["PrenomReps"],
         'Adresse1Reps' => $_PUT["Adresse1Reps"],
         'Adresse2Reps' => $_PUT["Adresse2Reps"],
         'CodePostalReps' => $_PUT["CodePostalReps"],
         'VilleReps' => $_PUT["VilleReps"],
         'EmailReps' => $_PUT["EmailReps"],
         'TelephoneReps' => $_PUT["TelephoneReps"],
         'Commentaires' => $_PUT["Commentaires"],
         'DateEmbauche' => $_PUT["DateEmbauche"],
         'TypeDeDroits' => $_PUT["TypeDeDroits"],
         'MotDePasseUser' => $_PUT["MotDePasseUser"],
         'CategorieUser' => $_PUT["CategorieUser"],
         'IdType' => $_PUT["IdType"]
         ];

        $object = new User($data);
        $libelle = "user";

        return $this->erreur->getUpdate($this->manager, $object, $libelle, $data);

    } 

    /**
     * Delete one user
     *
     * @url DELETE /user/$IdUser
     * 
     */
  
    public function deleteOneUser($IdUser){ 

        $result = $this->manager->delete($IdUser);

        return ['success' => $result];

    }

}

  
