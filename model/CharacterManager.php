<?php

declare(strict_types = 1);

class CharacterManager
{
    private $_db;


    /**
     * constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @param PDO $db
     * @return  self
     */ 

    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }

    /**
     * List all characters
     *
     * @return array $arrayOfCharacters
     */
    
    public function getCharacters()
    {
        // On déclare un tableau vide
        $arrayOfCharacters = [];

        $query = $this->getDB()->query('SELECT * FROM characters');
        $dataCharacters = $query->fetchAll(PDO::FETCH_ASSOC);

        // A chaque tour, on crée un nouvel objet Character qu'on stock dans notre tableau $arrayOfCharacters
        foreach ($dataCharacters as $dataCharacter) {
            $arrayOfCharacters[] = new Character($dataCharacter);
        }

        // On renvoie le tableau sur lequel on pourra boucler pour lister tous les personnages
        return $arrayOfCharacters;
    }

    /**
     * Get one character by id or name
     *
     * @param $info
     * @return Character 
     */

    public function getCharacter($info)
    {
        // get by name
        if (is_string($info))
        {
            $query = $this->getDB()->prepare('SELECT * FROM characters WHERE name = :name');
            $query->bindValue('name', $info, PDO::PARAM_STR);
            $query->execute();
        }
        // get by id
        elseif (is_int($info))
        {
            $query = $this->getDB()->prepare('SELECT * FROM characters WHERE id = :id');
            $query->bindValue('id', $info, PDO::PARAM_INT);
            $query->execute();
        }

        // $dataCharacter est un tableau associatif contenant les informations d'un personnage
        $dataCharacter = $query->fetch(PDO::FETCH_ASSOC);

        // On crée un nouvel objet Character grâce au tableau associatif $dataCharacter, et on le retourne
        return new Character($dataCharacter);
    }

    /**
     * Check if character exists or not
     *
     * @param string $name
     * @return boolean
     */
    public function checkIfExist(string $name)
    {
        $query = $this->getDb()->prepare('SELECT * FROM characters WHERE name = :name');
        $query->bindValue('name', $name, PDO::PARAM_STR);
        $query->execute();

        // Si il y a une entrée avec ce nom, c'est qu'il existe
        if ($query->rowCount() > 0)
        {
            return true;
        }
        
        // Sinon c'est qu'il n'existe pas
        return false;
    }

    /**
     * Add character into DB
     *
     * @param Character $character
     */
    
    public function add(Character $character)
    {
        $query = $this->getDb()->prepare('INSERT INTO characters(name, damages) VALUES (:name, :damages)');
        $query->bindValue('name', $character->getName(), PDO::PARAM_STR);
        $query->bindValue('damages', $character->getDamages(), PDO::PARAM_INT);
        $query->execute();

        // On récupère le dernier ID inséré en base de données
        $id = $this->getDb()->lastInsertId();
        // Et on hydrate notre objet pour lui ajouter son ID
        $character->hydrate([
            "id" => $id
        ]);
    }

    /**
     * Delete character from DB
     *
     * @param Character $character
     */
    public function delete(Character $character)
    {
        $query = $this->getDb()->prepare('DELETE FROM characters WHERE id = :id');
        $query->bindValue('id', $character->getId(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Update character's data 
     *
     * @param Character $character
     */
    public function update(Character $character)
    {
        $query = $this->getDb()->prepare('UPDATE characters SET damages = :damages WHERE id = :id');
        $query->bindValue('damages', $character->getDamages(), PDO::PARAM_INT);
        $query->bindValue('id', $character->getId(), PDO::PARAM_INT);
        $query->execute();
    }


}