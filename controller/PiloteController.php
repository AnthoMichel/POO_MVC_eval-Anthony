<?php
    require_once "./modele/PiloteManager.php";

    class PiloteController{
    private $piloteController;

    public function __construct(){
        $this->piloteManager = new PiloteManager;
        $this->piloteManager->loadPilotes();
    }

    public function displayPilotes(){
        $pilotes = $this->piloteManager->getPilotes();
        require_once "view/pilotes.view.php";
    }

    public function newPiloteForm(){
        require_once "view/new.pilote.view.php";
    }

    public function newPiloteValidation(){
        $this->piloteManager->newPiloteDB($_POST["nom"], $_POST["prenom"]);
        header('Location:'.URL."pilotes");
    }
}



