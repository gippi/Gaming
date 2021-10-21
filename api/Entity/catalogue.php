<?php

namespace Actualite\Entity;

//use php\database\Database;

/**
 * Modèle pour la table "catalogue"
 */
class Catalogue //extends Database
{
    private $id;

    private $titre;

    private $description;

    private $color;

    private $created_at;

    

    /**
     * Obtenir la valeur de id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Définir la valeur de id
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Obtenir la valeur de titre
     */ 
    public function getTitre():string
    {
        return $this->titre;
    }

    /**
     * Définir la valeur de titre
     *
     * @return  self
     */ 
    public function setTitre(string $titre):self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Obtenir la valeur de description
     */ 
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * Définir la valeur de description
     *
     * @return  self
     */ 
    public function setDescription(string $description):self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Obtenir la valeur de color
     */ 
    public function getColor():string
    {
        return $this->color;
    }

    /**
     * Définir la valeur de color
     *
     * @return  self
     */ 
    public function setColor(string $color):self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Obtenir la valeur de created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Définir la valeur de created_at
     *
     * @return  self
     */ 
    public function setCreatedAt($created_at):self
    {
        $this->created_at = $created_at;

        return $this;
    }

    

}