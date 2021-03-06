<?php

require __DIR__ . '/../global/class/init.php';

require __DIR__ . '/../source/Jacwright/RestServer/RestServer.php';

require 'ClientController.php';
require 'JustificatifController.php';
// require 'NoteDeFraisController.php';
require 'NoteDeFraisNuiteeController.php';
require 'NoteDeFraisRestaurationController.php';
// require 'NoteDeFraisTransportController.php';
require 'TarifsRemboursementController.php';
require 'UserController.php';

$server = new \Jacwright\RestServer\RestServer('debug');


$server->addClass('ClientController');
$server->addClass('JustificatifController');
// $server->addClass('NoteDeFraisController');
$server->addClass('NoteDeFraisNuiteeController');
$server->addClass('NoteDeFraisRestaurationController');
// $server->addClass('NoteDeFraisTransportController');
$server->addClass('TarifsRemboursementController');
$server->addClass('UserController');
$server->handle();

