<?php

namespace Actualite\Entity;

//use php\database\Database;

/**
 * Modèle pour la table "actualite"
 */
class Actualite //extends Database
{
    private $id;

    private $titre;

    private $description;

    private $created_at;

    private $actif;

    private $statut = 0;

    

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

    /**
     * Obtenir la valeur de actif
     */ 
    public function getActif():int
    {
        return $this->actif;
    }


    /**
     * Définir la valeur de actif
     *
     * @return  self
     */ 
    public function setActif(int $actif):self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Définir la valeur du status
     *
     * @return  self
     */ 
    public function setStatut(int $statut):self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Obtenir la valeur du status
     */ 
    public function getStatut():int
    {
        return $this->statut;
    }

}