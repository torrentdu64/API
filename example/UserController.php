<?php

use \Jacwright\RestServer\RestException;

class UserController
{

	private $userManager;

	public function __construct(){
		$this->userManager = new UserManager();
	}


    /**
     * Gets all users
     *
     * @url GET /user
     * 
     */
  

    public function getAllUser(){       

        $listeUser = $this->userManager->readAll();
        
        $tabAllUser = [];

        foreach ($listeUser as $key => $user) {
                $data = ['login' => $user->getlogin(),
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
     * Gets the user by id or current user
     *
     * @url GET /user/$id
     * 
     */
  

    public function getOneUser($id){       

     $selectedUser = $this->userManager->read($id);
        // var_dump($selectedClients);

     $tabSelectedUser = ['login' => $selectedUser->getlogin(),
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
     * Post one user
     *
     * @url POST /user
     * 
     */
  

    public function createOneUser(){       

        // foreach ($clientJSON as $key) {
        //     $json = $key;
        // }

        // var_dump($json);

        var_dump($_POST);
    

            $data = [ 'login' => $_POST["login"],
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

                        
        $userJSON = new User($data);


        return $this->userManager->create($userJSON);

        // return $result;

        } 
    

        /**
         * Update one user
         *
         * @url PUT /user/$id
         * 
         */

    public function updateOneUser($id){       

        // foreach ($clientJSON as $key) {
        //     $json = $key;
        // }

        // var_dump($_POST);

        $method = $_SERVER['REQUEST_METHOD'];
            if ('PUT' === $method) {
                parse_str(file_get_contents('php://input'), $_PUT);
                 //var_dump($_PUT); //$_PUT contains put fields 
        }

         $data = [ 'login' => $_PUT["login"],
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

        $user = new User($data);

        return $this->userManager->update($user);

        // return $result;

        } 

    


    /**
     * Delete one user
     *
     * @url DELETE /user/$id
     * 
     */
  

    public function deleteOneUser($id){       


        // return "Le user n° ".$deleteClient->getIdClient()." au nom de ".$deleteClient->getNomClient()." a bien été supprimé !";

        $ok = $this->userManager->delete($id);
        $result = ['success' => $ok];
        
        return $result;
    }

    
}

  
