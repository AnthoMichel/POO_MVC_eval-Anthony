<?php

class Pilote {

    private int $id_pilote;
    private string $nom;
    private string $prenom;

    public function __construct($id_pilote, $nom, $prenom){
        
        $this->id_pilote=$id_pilote;
        $this->nom=$nom;
        $this->prenom=$prenom;
    }

    /**
     * Get the value of id_pilote
     */ 
    public function getId_pilote()
    {
        return $this->id_pilote;
    }

    /**
     * Set the value of id_pilote
     *
     * @return  self
     */ 
    public function setId_pilote($id_pilote)
    {
        $this->id_pilote = $id_pilote;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
}