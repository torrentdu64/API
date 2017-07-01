<?php

require_once 'params.php';

// "spl_autoload_register" nous permet de définir le nom de la fonction pour l'autoloader.
spl_autoload_register('classAutoloader');

// Création d'une méthode d'autoloader de classes.
function classAutoloader($className) {

    $file = _dirclass . $className . '.php';
    if (file_exists($file)) {
        require($file);
    } else {
        echo"le fichier" . $file . "n'existe pas";
    }
}
