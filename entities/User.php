<?php

declare(strict_types = 1);

class User{

    protected   $id,
                $pseudo,
                $damage;


        const FIGHTER_HIT = 1;
        const FIGHTER_DEAD = 2;

    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

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

    public function Hit(){
        
    $this->damage += 5;

    if ($this->damage >=100){

        return self::FIGHTER_DEAD;

    }
        return self::FIGHTER_HIT;
    }   

    // Setters
    
    /**
     * Set the value of id
     *
     * @param int $id
     * @return  self
     */ 

    public function setId($id)
    {
        $id = (int) $id;
        $this->id = $id;
        return $this;
    }
    
    /**
     * Set the value of pseudo
     *
     * @param string $pseudo
     * @return  self
     */ 

    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     *Set the value of damage
     *
     * @param integer $damage
     * 
     */

     public function setDamage($damage)
    {
        $damage = (int) $damage;
        $this->damage = $damage;
        return $this;
    }

    // Getters

    /**
     * Get the value of id
     */ 
        
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Get the valie of the damage
     *
     */
      public function getDamage()
    {
        return $this->damage;
    }
}