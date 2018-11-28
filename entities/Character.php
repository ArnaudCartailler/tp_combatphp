<?php

declare(strict_types = 1);

class Character
{
    protected   $id,
                $name,
                $damages = 0;

    const ITS_ME = 1;
    const HIT = 2;
    const KILL = 3;

    /**
     * constructor
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    /**
     * Hydratation
     *
     * @param array $donnees
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    /**
     * Character attacks an opponent
     *
     * @param Character $character
     */
    public function attack(Character $opponent)
    {
        // Si l'id de l'adversaire est le même que celui du personnage en cours, on indique que le personnage essaye de se frapper lui-même
        if ($this->id == $opponent->getId())
        {
            return self::ITS_ME;
        }

        // Sinon on appelle la méthode receiveDamages pour que l'adversaire reçoive des dégâts
        return $opponent->receiveDamages();
    }

    /**
     * Character who is attacked receives damages
     *
     * @return const 
     */
    public function receiveDamages()
    {
        // On augmente les dégâts du personnage attaqué
        $this->damages += 5;

        // Si les dégâts atteignent 100, il meurt
        if ($this->damages >= 100)
        {
            return self::KILL;
        }

        // Sinon il est juste touché
        return self::HIT;
    }

    /**
     * SETTERS
     */

    /**
     * Set the value of id
     *
     * @param int $id
     * @return  self
     */ 
    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0)
        {
            $this->id = $id;
        }

        return $this;
    }

    /**
     * Set the value of damages
     *
     * @param int $damages
     * @return  self
     */ 
    public function setDamages($damages)
    {
        $damages = (int) $damages;

        if ($damages >= 0 && $damages <= 100)
        {
            $this->damages = $damages;
        }

        return $this;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     * @return  self
     */ 
    public function setName(string $name)
    {
        if (is_string($name))
        {
            $this->name = $name;
        }

        return $this;
    }

    /**
     * GETTERS
     */

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of damages
     */ 
    public function getDamages()
    {
        return $this->damages;
    }

 
}

