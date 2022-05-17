<?php
    require_once "PiloteManager.php";

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
}



