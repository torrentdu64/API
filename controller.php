<?php

require_once 'global/init.php';



$eleves = new Client([
    'nom' => 'Jean',
    'prenom' => 'Dupond',
    'genre' => 'H',
    'dateN' => '1996/02/20',
    'email' => 'contact@jeandupond.fr',
    'photo' => 'IMG'
]);

$eleveMan = new ClientManager();

// $eleve2 = $eleveMan->lire(7);
        
$eleveMan->ecrire($eleves);

var_dump($eleveMan);
