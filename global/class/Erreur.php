<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entity
 *
 * @author Micka
 */
class Erreur extends Entity {

    protected $erreur = [];
    
    public function __construct($data=NULL) {
        if (is_array($data)){
            parent::__construct($data);

        }
        
    }

    public function addErreur($erreur){
        $check = $this->erreur[] = $erreur;
    } 

    public function getErreur($manager, $object, $data){
        if ($object->erreur == []) {
            $manager->update($object);
            return [
                'success' => true,
                'client' => $data
                ];
        } else {
            return [
                'success' => false,
                'error' => $object->erreur
                ];
        }
    }

}
