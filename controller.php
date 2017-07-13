<?php

require_once 'global/init.php';
header('Content-Type: application/json');


// $pdo = new PDO('mysql:host=localhost;dbname=expense_manager;', 'root', 'root');


// $requete=$pdo->prepare("SELECT * FROM justificatifs");
// $requete->execute();

// $retour["success"]=true;
// $retour["message"]="Les justificatifs";


// $retour["results"]["justificatifs"]=$requete->fetchAll();

// echo json_encode($retour);//Mettre au format Json    //On a un doublon


//                              /*TABLE client*/

/*
$client1 = new Client([
    //'IdClient' => 102,
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
$val = $client->read(1);



// echo $val->getPrenomClient();
// echo $val->getNomClient();
// echo $val->getMailClient();
// echo $val->getTelephoneBureauClient();
// echo $val->getAdresse1Client();

foreach ($client1 as $res ) {
 $json .=[  $res['IdClient'] => "get" . $res()
 ];
}

var_dump( $json);



 //$client->create($client1);
 //read($client1);

// //

// $client->delete($client1);



//  $client = new ClientManager();

//             /*Ajout*/

//  /*$client->create($client1);*/

//         /*Modification*/

// /*$client1->setPrenomClient("toto");
// $client->update($client1);*/



//         /*Suppression*/

// // $client->delete($client1);



//                             /*TABLE notedefrais*/

// /*$notedefrais1 = new NoteDeFrais([
//     'IdNoteDeFrais' => 101,
//     'IntituleNDF' => 'RDV',
//     'DateNDF' => '25/02/12',
//     'MotifNDF' => 'Fidelisation',
//     'MontantPrevu' => '2,5',
//     'EtatNDF' => 'En cours',
//     'Commentaire' => 'En Attent',
//     'NbreNuiteesSiHotellerie' => 2,
//     'NbreRepasSiRestauration' => 5,
//     '$CoordonneesGPSDepartSiTransport' => '20 rue Pasteur Cadier',
//     'CoordonneesGPSArriveeSiTransport' => 'Paris 11 eme arrondissement',
//     'TypeDeTransport' => 'Voiture',
//     'DistanceSiTransport' => '600',
//     'Login' => 21,
//     'IdClient' => 3
// ]);*/

// /*$notedefrais = new NoteDeFraisManager();*/

//             /*Ajout*/

// /*$notedefrais->create($notedefrais1);*/


//             /*Modification*/

// /*$notedefrais1->setMontantPrevu('1');
// $notedefrais->update($notedefrais1);*/


//             /*Suppression*/
// /*$notedefrais->delete($notedefrais1);*/






//                                 /*TABLE user*/

// /*$user1 = new User([
//     //'Login' => '194',
//     'NomReps' => 'Makarueta',
//     'PrenomReps' => 'Giovani',
//     'Adresse1Reps' => '20 rue Route de Tercis',
//     'Adresse2Reps' => '10 rue du Pasteur Cadier',
//     'CodePostalReps' => '64000',
//     'VilleReps' => 'Dax',
//     'EmailReps' => 'makaruetagiovani@gmail.com',
//     'TelephoneReps' => '06 76 14 98 17',
//     'Commentaires' => 'Nothing to add',
//     'DateEmbauche' => '2017-07-06',
//     'TypeDeDroits' => 'Consulter',
//     'MotDePasseUser' => 'Gre9',
//     'CategorieUser' => 'Commercial',
//     'IdType' => 21,
// ]);*/


//     $users=new UserManager();


// //    *$users=new UserManager();*/


                                        /*TABLE justificatifs*/

/*$justificatif1 = new Justificatif([
    // 'IdJustificatif' =>32,
    'IntituleJustificatif' =>'Restauration',
    'URLNomFichier' => '/justificatif/restauration/id=13',
    'MontantJustificatif' => '126,5'
]);*/


$justificatifs = new JustificatifManager();
// echo $justificatifs->jsonRead();


 
               /*Lire*/

$just = $justificatifs->read(1);

$jsonTab = [
    "success" => ["true"],
    "message" => ["Les justificatifs"],
    "justificatifs"=> [
        "IdJustificatif" => $just->getIdJustificatif(),
        "IntituleJustificatif" => $just->getIntituleJustificatif(),
        "URLNomFichier" => $just->getURLNomFichier(),
        "MontantJustificatif" => $just->getMontantJustificatif()
        ],
    ];


$jsonTab = json_encode($jsonTab);
echo $jsonTab;
 


/*foreach ($jsonTab as $key => $value) {
    $json .= $key.' : '.$value;
}*/

 



               /*Ajout*/

// $justificatifs->create($justificatif1);



//              /*Ajout*/

//     /*$users->create($user1);*/



//             /*Modification*/

//    /* $user1->setVilleReps("");
//     $users->update($user1);*/


//             /*Suppression*/

//     /*$users->delete($user1);*/



//                                             /*TABLE tarifsremboursements*/


// /*$tarifsremboursement1 = new TarifsRemboursements([
//     'TypeDeFrais'=>53,
//     'MontantRemboursement' => '25,5',
//     'Unites' => 'KM'
// ]);*/

// /*$tarifsremboursements = new TarifsRemboursementManager();*/

//                 /*Ajout*/
// /*$tarifsremboursements->create($tarifsremboursement1);*/

//                 /*Modification*/
// /*$tarifsremboursements->setMontantRemboursement('42');
// $tarifsremboursements->update($tarifsremboursement1);*/


//                 /*Suppression
// $tarifsremboursements->delete($tarifsremboursement1);*/




//                                         /*TABLE justificatifs*/

// /*$justificatif1 = new Justificatif([
//     //'IdJustificatif' =>5,
//     'IntituleJustificatif' =>'Restauration',
//     'URLNomFichier' => '/justificatif/restauration/id=13',
//     'MontantJustificatif' => '120'
// ]);

// $justificatifs = new JustificatifManager();
//     'MontantJustificatif' => '120,5'
// ]);*/

// /*$justificatifs = new JustificatifManager();*/


//                   /*Ajout*/
// /*$justificatifs->create($justificatif1);*/


//                 /*Modification*/
// /*$justificatif1->setMontantJustificatif('1');
// $justificatifs->update($justificatif1);*/


                /*Suppression*/
// $justificatifs->delete($justificatif1);














