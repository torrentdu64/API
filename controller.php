<?php

require_once 'global/init.php';



<<<<<<< HEAD
$eleves = new Client([
    'nom' => 'Jean',
    'prenom' => 'Dupond',
    'genre' => 'H',
    'dateN' => '1996/02/20',
    'email' => 'contact@jeandupond.fr',
    'photo' => 'IMG'
]);

$eleveMan = new ClientManager();
=======
$client1 = new Client([
	//'IdClient' => 144,
    'NomClient' => 'DUPOND',
    'PrenomClient' => 'Jean',
    'Adresse1Client' => '8 rue bon accueil',
    'Adresse2Client' => 'Appartement 8',
    'CodePostalClient' => '64140',
    'VilleClient' => 'BILLERE',
    'TelephoneBureauClient' => '0559482715',
    'TelephoneMobileClient' => '0686047638',
    'MailClient' => 'contact@mickaelduprat.fr',
    'BudgetMaxRemboursementClient' => 200
]);

 $clientN1 = new ClientManager();
 /*
$client1 = $clientN1->read(144);
$client1->setNomClient("toto");
var_dump($client1);
$clientN1->update($client1);

$eleveMan = new EleveManager();
>>>>>>> origin

// $eleve2 = $eleveMan->lire(7);
        
$eleveMan->create($eleves);


 $save = $clientN1->create($client1);
 echo 'Création';
*/

$client1 = $clientN1->read(145);
$client1->setPrenomClient("toto");
$clientN1->update($client1);

// $clientN1->delete($client1);

// $clientN1->read($client1->getIdClient());
