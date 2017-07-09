<?php

require_once 'init.php';


// On définit les constantes de connexion à la base de donnée.
define('_dbHost', 'localhost');

define('_dbName', 'expense_manager2');
define('_dbUser', 'root');
define('_dbPassW', '');

//define('_dbName', 'expense_manager'); // u596614644_dev
//define('_dbUser', 'root'); // u596614644_user
//define('_dbPassW', 'root'); // Omb3qCt8]$yUtFN


//Définition du répertoire de base.
define('_dirRoot', $_SERVER['DOCUMENT_ROOT'] . 'Api/API/global');

//Définition du répertoire des classes.
define('_dirclass', _dirRoot.'/class/');
