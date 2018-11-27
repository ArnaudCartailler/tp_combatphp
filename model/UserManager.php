<?php


class UserManager {
  
  private $_db; // Instance de PDO
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
 public function setDb(PDO $db) {

    $this->_db = $db;
    return $this;
  }

  public function getDb() {

    return $this->_db;

  }

    public function getUsers() {

    $query = $this->getDb()->query('SELECT * FROM fighters');
    
    $fighters = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($fighters as $user) {

      $arrayOfFighters[] = new User($user);
      
    }

    return $arrayOfFighters;

  }

   public function addUser(User $user) {

    $req = $this->getDb()->prepare('INSERT INTO fighters(pseudo, damage) VALUES(:pseudo, :damage)');

    $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
    $req->bindValue(':damage', $user->getDamage(), PDO::PARAM_INT);

    $req->execute();

  }

  
  public function delete(User $user) {

    $this->_db->exec('DELETE FROM fighters WHERE id = '.$fighters->id());

  }
  
  public function update(User $user)
  {
    $q = $this->_db->prepare('UPDATE fighters SET damage = :damage WHERE id = :id');
    
    $q->bindValue(':damage', $fighters->damage(), PDO::PARAM_INT);
    $q->bindValue(':id', $fighters->id(), PDO::PARAM_INT);
    
    $q->execute();
  }
  
}

  ?>
