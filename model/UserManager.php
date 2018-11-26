<?php

class UserManager {
  
  private $_db;

  /**
   * Constructor
   *
   * @param PDO $db
   */

  public function __construct(PDO $db) {
    $this->setDb($db);
  }

  /**
   * Set the value of _db
   *
   * @param PDO $db
   * @return  self
   */ 

  public function setDb(PDO $db) {
    $this->_db = $db;
    return $this;
  }

  /**
   * Get the value of _db
   */ 

  public function getDb() {
    return $this->_db;
  }

  
  /**
   * Get all users. It returns an array of objects $user
   *
   * @return array $arrayUsers
   */

  public function getUsers() 
  {
    $query = $this->getDb()->query('SELECT * FROM users');

    // $query = $this->_db->query('SELECT * FROM users');
    
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    // A chaque tour, on instancie un nouvel objet User qu'on stocke dans $arrayOfUsers[]

    foreach ($users as $user) {
      $arrayOfUsers[] = new User($user);
    }
    // On renvoie le tableau contenant tous nos objets User
    return $arrayOfUsers;
  }

  /**
   * Add user in DB
   *
   * @param User $user
   */
  
  public function addUser(User $user)
  {
    $query = $this->getDb()->prepare('INSERT INTO users(pseudo) VALUES(:pseudo)');

    /**
     * envoie les données.
     */

    // $query->execute([
    //   'pseudo' => $user->getPseudo()
    // ]);

    $query->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);

    $query->execute();
  }

}


 ?>
