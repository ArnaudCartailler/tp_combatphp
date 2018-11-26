<?php

/**
 * Class to connect to the data base
 * 
 * @return PDO $db 
 */
class Database
{

// connection settings
const HOST  = "localhost";
const DBNAME = "tp_combat"; // votre base de données
const LOGIN = "root"; // votre login
const PWD = "soleil1993"; // votre mot de passe

  /**
   * Function to connect to the DB
   *
   * @return PDO $db
   */
  
  static public function DB()
  {
    $db = new PDO("mysql:host=" . self::HOST .";dbname=" . self::DBNAME , self::LOGIN, self::PWD);
    return $db;
  }

}


 ?>