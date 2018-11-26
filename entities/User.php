<?php

declare(strict_types = 1);

class User
{
    protected   $pseudo,
                $id;

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

    // Setters
    
    /**
     * Set the value of id
     *
     * @param int $id
     * @return  self
     */ 

    public function setId( $id)
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
}