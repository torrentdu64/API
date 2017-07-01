<?php

require_once 'init.php';


// On définit les constantes de connexion à la base de donnée.
define('_dbHost', 'localhost');
define('_dbName', 'greta');
define('_dbUser', 'root');
define('_dbPassW', 'root');

//Définition du répertoire de base.
define('_dirRoot', $_SERVER['DOCUMENT_ROOT'] . 'demo-php/POO/MVC/global');

//Définition du répertoire des classes.
define('_dirclass', _dirRoot.'/class/');
