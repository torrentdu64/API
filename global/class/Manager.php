<?php

require_once 'global/params.php';

/**
 * Description of Manager
 *
 * @author Micka
 */
abstract class Manager {

    protected $pdo;
    protected $pdoException;

    public function __construct() {
        try{
            $dbHost = _dbHost;
            $dbName = _dbName;
            $dbUser = _dbUser;
            $dbPassW = _dbPassW;
            $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8",$dbUser,$dbPassW);
        }
        catch(Exception $e){
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
}
