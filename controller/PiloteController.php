<?php
    require_once "./modele/PiloteManager.php";

    class PiloteController{

    private $piloteManager;

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

    public function editPiloteForm($id) {
        $pilote = $this->piloteManager->getPiloteById($id);
        require_once "./view/edit.pilote.view.php";
    }

    public function editPiloteValidation(){
        $this->piloteManager->editPiloteDB($_POST['id_conducteur'],$_POST['nom'],$_POST['prenom']);
        header('Location:'. URL. "pilotes");
    }

    public function deletePilote($id){
        $this->piloteManager->deletePiloteBD($id);
        header("Location: ".URL. "pilotes");
    }

    
}



