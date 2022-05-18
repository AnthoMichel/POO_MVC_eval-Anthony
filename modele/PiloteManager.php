<?php
require_once "Manager.php";
require_once "Pilote.php";


class PiloteManager extends Manager
{

    private $pilotes;

    public function addPilote($pilote)
    {
        $this->pilotes[] = $pilote;
    }

    public function getPilotes()
    {
        return $this->pilotes;
    }
    public function loadPilotes()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM conducteur");
        $req->execute();
        $myPilotes = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myPilotes as $pilote) {
            $p = new Pilote($pilote["id_conducteur"], $pilote["nom"], $pilote["prenom"]);
            $this->addPilote($p);
        }
    }

    public function newPiloteDB($nom, $prenom)
    {
        $req = "INSERT INTO conducteur (nom, prenom)
        VALUES (:nom, :prenom) WHERE id_conducteur = :id" ;
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if ($result) {
            $pilote = new Pilote($this->getBdd()->lastInsertId(), $nom, $prenom);
            $this->addPilote($pilote);
        }
    }

    public function getPiloteById($id){
        foreach ($this->pilotes as $pilote){
            if($pilote->getId_pilote() == $id) {
                return $pilote;
            }
        }
    }


    public function editPiloteDB($id, $nom, $prenom){
        $req = "UPDATE conducteur SET nom = :nom, prenom = :prenom
        WHERE id_conducteur = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result){
            $this->getPiloteById($id)->setNom($nom);
            $this->getPiloteById($id)->setPrenom($prenom);
        }

    }

    public function deletePiloteBD($id){
        $req = "DELETE FROM pilote WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if($result) {
            $pilote = $this->getPiloteById($id);
            unset($pilote);
        }
    }
}
