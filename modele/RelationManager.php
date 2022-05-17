<?php
require_once "Manager.php";
require_once "PiloteManager.php";
require_once "CarManager.php";



class RelationManager extends Manager{

    private $relations;

    public function addRelation($relation){
        $this->relations[]= $relation;
    }

    public function getRelations(){
        return $this->relations;
    }

    public function loadRelations(){
        $req = $this->getBdd()->prepare("SELECT * FROM association_vehicule_conducteur");
        
        $req->execute();
        $myRelations = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myRelations as $relation){
            $r = new Relation($relation["id_association "], $relation["	id_vehicule "], $relation["id_conducteur"]);
            $this->addRelation($r);
        }
    }

}