<?php

require_once __DIR__ . '/init.php';

// On définit les constantes de connexion à la base de donnée.


define('_dbHost', 'localhost'); // mickaeldul64.mysql.db


define('_dbName', 'expense_manager'); // mickaeldul64
define('_dbUser', 'root'); // mickaeldul64
define('_dbPassW', 'root'); // Wayspeis64


/*define('_dbHost', 'mickaeldul64.mysql.db'); // localhost


define('_dbName', 'mickaeldul64'); // expense_manager
define('_dbUser', 'mickaeldul64'); // root
define('_dbPassW', 'Wayspeis64'); // root*/


//Définition du répertoire de base.
define('_dirRoot', $_SERVER['DOCUMENT_ROOT'] . '/API/global');



//Définition du répertoire des classes.
define('_dirclass', _dirRoot.'/class/');

