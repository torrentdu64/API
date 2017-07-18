<?php

require_once 'init.php';


// On définit les constantes de connexion à la base de donnée.
define('_dbHost', 'localhost');
define('_dbName', 'expense_manager2');
define('_dbUser', 'root');
define('_dbPassW', '');

//Définition du répertoire de base.
define('_dirRoot', $_SERVER['DOCUMENT_ROOT'] . 'API/global');

//Définition du répertoire des classes.
define('_dirclass', _dirRoot.'/class/');
