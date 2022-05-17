<?php
require_once "Manager.php";


class PiloteManager extends Manager {

    private $pilotes;

    public function addPilote($pilote){
        $this->pilotes[]= $pilote;
    }

    public function getPilotes(){
        return $this->pilotes;
    }
    public function loadPilotes(){
        $req = $this->getBdd()->prepare("SELECT * FROM conducteur");
        $req->execute();
        $myPilotes = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myPilotes as $pilote){
            $p = new Pilote($pilote["id_conducteur"], $pilote["nom"], $pilote["prenom"]);
            $this->addPilote($p);
        }
    }

}