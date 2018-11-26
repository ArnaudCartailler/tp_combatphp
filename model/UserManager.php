<?php

class UserManager {
  
  private $_db; // Instance de PDO
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  public function add(User $fighter)
  {
    $q = $this->_db->prepare('INSERT INTO fighters(pseudo) VALUES(:pseudo)');
    $q->bindValue(':pseudo', $fighter->pseudo());
    $q->execute();
    
    $fighter->hydrate([
      'id' => $this->_db->lastInsertId(),
      'damage' => 0,
    ]);
  }
  
  public function count()
  {
    return $this->_db->query('SELECT COUNT(*) FROM fighters')->fetchColumn();
  }
  
  public function delete(User $fighter)
  {
    $this->_db->exec('DELETE FROM fighters WHERE id = '.$fighter->id());
  }
  
  public function exists($info)
  {
    if (is_int($info)) // On veut voir si tel User ayant pour id $info existe.
    {
      return (bool) $this->_db->query('SELECT COUNT(*) FROM fighters WHERE id = '.$info)->fetchColumn();
    }
    
    // Sinon, c'est qu'on veut vérifier que le pseudo existe ou pas.
    
    $q = $this->_db->prepare('SELECT COUNT(*) FROM fighters WHERE pseudo = :pseudo');
    $q->execute([':pseudo' => $info]);
    
    return (bool) $q->fetchColumn();
  }
  
  public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->_db->query('SELECT id, pseudo, damage FROM fighters WHERE id = '.$info);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      
      return new User($donnees);
    }
    else
    {
      $q = $this->_db->prepare('SELECT id, pseudo, damage FROM fighters WHERE pseudo = :pseudo');
      $q->execute([':pseudo' => $info]);
    
      return new User($q->fetch(PDO::FETCH_ASSOC));
    }
  }
  
  public function getList($pseudo)
  {
    $fighters = [];
    
    $q = $this->_db->prepare('SELECT id, pseudo, damage FROM fighters WHERE pseudo <> :pseudo ORDER BY pseudo');
    $q->execute([':pseudo' => $pseudo]);
    
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $fighters[] = new User($donnees);
    }
    
    return $fighters;
  }
  
  public function update(User $fighter)
  {
    $q = $this->_db->prepare('UPDATE fighters SET damage = :damage WHERE id = :id');
    
    $q->bindValue(':damage', $fighter->damage(), PDO::PARAM_INT);
    $q->bindValue(':id', $fighter->id(), PDO::PARAM_INT);
    
    $q->execute();
  }
  
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
  

// if(isset($_POST['pseudo']) AND !empty($_POST['pseudo'])){

//     $fighter = new User(['pseudo' => $_POST['pseudo']]);

// }

  ?>