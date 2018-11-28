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
const DBNAME = ""; // votre base de données
const LOGIN = ""; // votre login
const PWD = ""; // votre mot de passe

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
