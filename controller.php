<?php

require_once 'global/init.php';



                             /*TABLE client*/

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


 $client = new ClientManager();   

            /*Ajout*/    

 /*$client->create($client1);*/

        /*Modification*/  

/*$client1->setPrenomClient("toto");
$client->update($client1);*/



        /*Suppression*/ 

// $client->delete($client1);



                            /*TABLE notedefrais*/

$notedefrais1 = new NoteDeFrais([
    'IdNoteDeFrais' => 101,
    'IntituleNDF' => 'RDV',
    'DateNDF' => '25/02/12',
    'MotifNDF' => 'Fidelisation',
    'MontantPrevu' => 210,
    'EtatNDF' => 'En cours',
    'Commentaire' => 'En Attent',
    'NbreNuiteesSiHotellerie' => 2,
    'NbreRepasSiRestauration' => 5,
    '$CoordonneesGPSDepartSiTransport' => '20 rue Pasteur Cadier',
    'CoordonneesGPSArriveeSiTransport' => 'Paris 11 eme arrondissement',
    'TypeDeTransport' => 'Voiture',
    'DistanceSiTransport' => '600',
    'Login' => 21,
    'IdClient' => 3
]);

$notedefrais = new NoteDeFraisManager();

            /*Ajout*/

/*$notedefrais->create($notedefrais1);*/


            /*Modification*/

/*$notedefrais1->setMotifNDF("Café");
$notedefrais->update($notedefrais1);*/


            /*Suppression*/
/*$notedefrais->delete($notedefrais1);*/




 
  
                                /*TABLE user*/

$user1 = new User([
    //'Login' => '194',
    'NomReps' => 'Gialugi',
    'PrenomReps' => 'Makureta',
    'Adresse1Reps' => '20 rue Nulle part',
    'Adresse2Reps' => '2 street Gangster Miami',
    'CodePostalReps' => '64000',
    'VilleReps' => 'Miami',
    'EmailReps' => 'gangsterlove@gmail.gr',
    'TelephoneReps' => '06-52-76-14-96',
    'Commentaires' => 'Nothing to add',
    'DateEmbauche' => '2017-07-06',
    'TypeDeDroits' => 'No limit',
    'MotDePasseUser' => 'gang',
    'CategorieUser' => 'Commercial',
    'IdType' => 21,
]);

        
    $users=new UserManager();

             /*Ajout*/

    /*$users->create($user1)*/



            /*Modification*/
/*
    $user1->setCodePostalReps("64200");
    $users->update($user1);*/
    
    
            /*Suppression*/
    
    /*$users->delete($user1);*/



                                            /*TABLE tarifsremboursements*/


$tarifsremboursement1 = new TarifsRemboursements([
    //'TypeDeFrais'=>53,
    'MontantRemboursement' => '25',
    'Unites' => 'KM'
]);

$tarifsremboursements = new TarifsRemboursementManager();

                /*Ajout*/
/*$tarifsremboursements->create($tarifsremboursement1);*/

                /*Modification*/
/*$tarifsremboursements->setMontantRemboursement(42);
$tarifsremboursements->update($tarifsremboursement1);*/


                /*Suppression
$tarifsremboursements->delete($tarifsremboursement1);*/




                                        /*TABLE justificatifs*/

$justificatif1 = new Justificatif([
    //'IdJustificatif' =>5,
    'IntituleJustificatif' =>'Restauration',
    'URLNomFichier' => '/justificatif/restauration/id=13',
    'MontantJustificatif' => '120'
]);
      
$justificatifs = new JustificatifManager();

                  /*Ajout*/
/*$justificatifs->create($justificatif1);*/


                /*Modification*/
/*$justificatif1->setIntituleJustificatif('Logement');
$justificatifs->update($justificatif1);*/


                /*Suppression*/
/*$justificatifs->delete($justificatif1);*/













